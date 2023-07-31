<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function profileUpdate($id)
    {
        $user = User::findOrFail($id);
        return view('updateProfile', compact('user'));
    }

    public function profileSave(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
            'mobile' => [
                'required',
                'numeric',
                'digits:10',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput();
        }

        // Update user details in the database
        $user = User::find($id);
        if (!$user) {
            return back()->withErrors(['User not found.']);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');
        $user->save();

        return redirect()->route('profile')->with('success', 'User details updated successfully.');
    }
}
