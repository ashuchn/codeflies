<?php 

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class authHelper {

    public static function login($data): bool
    {
        return Auth::attempt(['email' => $data['email'], 'password' => $data['password'] ]);
    }

    public static function register($data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->mobile = $data['mobile'];
        $user->password = bcrypt($data['password']);
        
        $image = $data['pfp'];
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/pfps', $imageName);
        $path = "pfps/".$imageName;
        $user->profile_picture = $path;
        
        if($user->save()) {
            return true;
        } else {
            return false;
        }
    }
    
}