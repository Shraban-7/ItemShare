<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function toggleRole()
    {
        $user = User::where('id',auth()->id())->first();
        $newRole = $user->role === 'user' ? 'renter' : 'user';

        $user->update(['role' => $newRole]);

        return redirect()->back()->with('success', 'Your role has been changed.');
    }
}
