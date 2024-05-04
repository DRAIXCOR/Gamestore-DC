<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function register(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);
        
        //return redirect()->back();

        
    }

    public function login(Request $request)
    {
        
        $credentials = [
            "email" => $request->email,
            "password" => $request->password

        ];

        $remenber = ($request->has('remenber') ? true:false);

        if(Auth::attempt($credentials, $remenber)){

            $request->session()->regenerate();


            return view('/principal');
        }
        else{
            return redirect('login'); 
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth:login($user);
        
        return view('/principal');
    }


    public function logout(Request $request)
    {
        
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();

       return redirect(route('login'));
       return view('/principal');
    }

}