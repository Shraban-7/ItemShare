@extends('frontend.layouts.master')

@section('content')
    <section>
        <div class="container" style="min-height: 80vh;">
            <h2 class="text-center mb-4">Your Bookings Requests</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Image</th>
                            <th scope="col">Start Date</th>

                            <th scope="col">Time Remaining</th>
                            <th scope="col">Status</th>
                            <th scope="col">View</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->product->name }}</td>
                                <td class="text-center align-middle">
                                    <img src="{{ asset('storage/products/' . $booking->product->image) }}"
                                        alt="{{ $booking->product->name }}"
                                        style="width: 50px; height: 50px; border-radius: 50%;">
                                </td>
                                <td class="text-center align-middle">{{ $booking->start_date }}</td>
                                @if ($booking->status === 0)
                                    <td>-</td>
                                @elseif($booking->status === 1)
                                    <td class="text-center align-middle timeRemaining" data-end="{{ $booking->end_date }}">
                                    </td>
                                @else
                                    <td>-</td>
                                @endif

                                <td>
                                    @if ($booking->status == 0)
                                        <span class="badge bg-primary">pending</span>
                                    @elseif ($booking->status == 1)
                                        <span class="badge bg-success">Approve</span>
                                    @else
                                        <span class="badge bg-danger">Cancel</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Function to update time remaining for each booking
        function updateTimeRemaining() {
            const timeRemainingElements = document.querySelectorAll('.timeRemaining');
            timeRemainingElements.forEach(element => {
                const endDate = new Date(element.getAttribute('data-end'));
                const currentDate = new Date();
                const timeDiff = endDate - currentDate;
                if (timeDiff > 0) {
                    const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);
                    element.textContent = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
                } else {
                    element.textContent = "Expired";
                }
            });
        }

        // Attach onchange event listener to all select elements
        document.querySelectorAll('.statusSelect').forEach(item => {
            item.addEventListener('change', function() {
                const bookingId = this.getAttribute('data-id');
                const newStatus = this.value;
                const statusBadge = this.parentElement.parentElement.querySelector('.badge');
                const startDateCell = this.parentElement.parentElement.querySelector('.start-date');
                const endDateCell = this.parentElement.parentElement.querySelector('.end-date');

                // Send an AJAX request to update the status and dates
                fetch(`/bookings/change-status/${bookingId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            booking_id: bookingId,
                            status: newStatus
                        })
                    })
                    .then(response => {
                        if (response.ok) {
                            // Reload the page after successful status update
                            location.reload();
                        }
                        throw new Error('Network response was not ok.');
                    })
                    .catch(error => {
                        // Handle error
                        console.error('There was a problem with the fetch operation:', error);
                    });
            });
        });

        // Update time remaining initially and then every second
        updateTimeRemaining();
        setInterval(updateTimeRemaining, 1000);
    </script>
@endsection
