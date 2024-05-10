<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Mail\BienvenidoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Envía el correo de bienvenida
        Mail::to($user->email)->send(new BienvenidoMailable);

        Auth::login($user);
<<<<<<< HEAD
        // Redireccionar a la página principal u otra página después del registro
        return redirect('/principal');
=======
        
        //return redirect()->back();
        return Redirect::route('bienvenido');
        
>>>>>>> emails
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

