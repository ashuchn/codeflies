<?php

namespace App\Http\Controllers;

use Validator;
use App\Helpers\authHelper;
use App\Helpers\flashHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "email" => "required|exists:users",
            "password" => "required",
        ]);

        if($valid->fails()) {
            flashHelper::errorResponse($valid->errors()->first());
            return back()->withErrors($valid)->withInput();
        }

        $validatedData = $valid->validated();
        $data = authHelper::login($validatedData);
        if(!$data) {
            flashHelper::errorResponse('Invalid Credentials');
            return back();
        }
        flashHelper::errorResponse('Logged in!');
        return redirect()->route('dashboard');

    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "name"  => "required",
            "email" => "required|unique:users",
            "mobile" => "required|numeric|unique:users",
            "password" => "required",
            "pfp" => "required|image|dimensions:max_width=400,max_height=400"
        ]);

        if($valid->fails()) {
            flashHelper::errorResponse($valid->errors()->first());
            return back()->withErrors($valid)->withInput();
        }

        $data = authHelper::register($valid->validated());
        if(!$data) {
            flashHelper::errorResponse('Some error occured');
            return back();
        }
        flashHelper::successResponse('Account registered!');
        return redirect()->route('login');
    }
    
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        \Session::flush();
        flashHelper::successResponse('Logged Out!');
        return redirect()->route('login');
    }

}

