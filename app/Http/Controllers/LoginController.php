<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function register(Request $request)
    {
        //Validar datos 
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash:make($request->password);

        $user->save();

        Auth:login($user);
        
        return redirect(route('privada'));
    }

    public function login(Request $request)
    {
        //Validar datos 
        
        $credentials = [
            "email" => $request->email,
            "password" => $request->password

        ];

        $remenber = ($request->has('remenber' ? true:false));

        if(Auth:attempt($credentials, $remenber)){

            $request->session()->regenerate();

            return redirect()->intended('privada');
        }
        else{
            return redirect('login'); 
        }

        $listas->name = $request->name;
        $listas->email = $request->email;
        $listas->password = Hash:make($request->password);

        $user->save();

        Auth:login($user);
        
        return redirect(route('privada'));
    }

}
