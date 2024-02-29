<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Fetch the product based on the provided product_id
        $product = Product::findOrFail($validatedData['product_id']);

        // Use the current date as the start date
        $startDate = Carbon::now();

        // Calculate the end date based on start date and rental duration
        $endDate = $startDate->copy()->addDays($product->rental_duration);

        // Create the booking record
        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            'product_id' => $validatedData['product_id'],
            'start_date' => $startDate,
            'end_date' => $endDate,
            'is_payed'=>$request->is_payed
        ]);

        Toastr::success('booking item request placed successfully');

        // Return success response or handle errors accordingly
        return redirect()->route('bookings.index')->with('success', 'product book successfully');
    }

    public function index()
    {
        // Fetch all bookings for the authenticated user
        $bookings = Booking::where('user_id', auth()->id())->get();

        // Pass the bookings data to the view for rendering
        return view('frontend.pages.bookings.index', compact('bookings'));
    }

    public function booking_renter()
    {
        $bookings = Booking::with('product')
            ->whereHas('product', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->get();


        foreach($bookings as $booking)
        {
            if ($booking->status=='1') {
                $booking->update(['is_payed'=>1]);
            }
        }

        // return $bookings;

        // Pass the bookings data to the view for rendering
        return view('frontend.pages.bookings.renter', compact('bookings'));
    }

    public function admin_bookings()
    {
        // Fetch all bookings for the authenticated user
        $bookings = Booking::where('status', 1)->get();

        // Pass the bookings data to the view for rendering
        return view('backend.pages.booking_list', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        // Fetch the booking details
        $booking = Booking::findOrFail($booking->id);

        // Check if the booking belongs to the authenticated user
        if ($booking->user_id !== auth()->id()) {
            return redirect()->route('bookings.index')->with('error', 'Unauthorized access');
        }

        // Return the booking details view
        return view('frontend.pages.bookings.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        // Fetch the booking
        $booking = Booking::findOrFail($booking->id);

        // Check if the booking belongs to the authenticated user
        if ($booking->user_id !== auth()->id()) {
            return redirect()->route('bookings.index')->with('error', 'Unauthorized access');
        }

        // Delete the booking
        $booking->delete();

        // Redirect back with success message
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully');
    }

    public function processPaymentView(Product $product)
    {
        // Dummy logic for processing payment
        // You can validate inputs, simulate payment processing, and redirect accordingly
        return view('frontend.pages.payment', compact('product'));
    }

    public function changeStatus(Request $request, $bookingId)
    {
        // Retrieve the booking by ID
        $booking = Booking::findOrFail($bookingId);

        // Update the status based on the request
        $newStatus = $request->input('status');
        $booking->status = $newStatus;

        // If status is "Approved", update start_date to current timestamp
        if ($newStatus == 1) {
            $booking->start_date = now();
            $booking->end_date=$booking->start_date->copy()->addDays($booking->product->rental_duration); // or use Carbon\Carbon if not already imported
        }

        // Save the changes
        $booking->save();

        // Return a response (optional)
        return response()->json(['message' => 'Status updated successfully', 'status' => $booking->status]);
    }

}
