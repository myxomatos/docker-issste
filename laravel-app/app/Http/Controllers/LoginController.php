<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function register(Request $request){
       $user = new User();
       $user->name = $request->name;
       $user->apellido = $request->apellido;
       $user->email = $request->email;
       $user->rol = $request->rol;
       $user->hospital_id = $request->hospital_id;
       $user->password = Hash::make($request->password);

       $user->save();
       Auth::login($user);

       return redirect(route('homeIndexPanel'));
   }

   public function login(Request $request){
       $credentials = [
           "email" => $request->email,
           "password" => $request->password,
       ];

       $remember = ($request->has('remember') ? true : false);

       if (Auth::attempt($credentials,$remember)){

           $request->session()->regenerate();

           if (Auth::user()->rol == 'general'){
               return redirect()->intended(route('indexGeneral'));
           }else{
               return redirect()->intended(route('homeIndexPanel'));
           }


       }else{
           return redirect('login');
       }

   }


   public function logout(Request $request){
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();

       return redirect(route('login'));
   }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        $request->user()->last_login = now();
        $request->user()->save();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function authenticated(Request $request,$user){
       $user->last_login = now();
       $user->save();

    }
}
