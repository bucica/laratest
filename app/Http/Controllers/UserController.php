<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(Request $request, int $userId)
    {
        $user = User::where('id', $userId)->first();

        if (!$user) {
            return redirect()
                ->route('users.index')
                ->with('error', __('User not found'));
        }

        return view('users.show', [
            'user' => $user,
        ]);
    }
}
