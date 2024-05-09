<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
<<<<<<< HEAD
=======
    
>>>>>>> b6c69c269a806615402c14a463030290375621fa
    public function register(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);
        
<<<<<<< HEAD
        // Redireccionar a la página principal u otra página después del registro
        return redirect('/principal');
    }

   

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect('/principal');
        } else {
            return redirect('login')->with('error', 'Credenciales inválidas');
        }
    }

    public function logout(Request $request)
    {
=======
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
        
>>>>>>> b6c69c269a806615402c14a463030290375621fa
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();

       return redirect(route('login'));
<<<<<<< HEAD
    }

    public function customLogin(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect('/principal');
    }

    return redirect('login')->withErrors([
        'email' => 'Las credenciales proporcionadas son incorrectas.',
    ]);
}

}
=======
       return view('/principal');
    }

}
>>>>>>> b6c69c269a806615402c14a463030290375621fa
