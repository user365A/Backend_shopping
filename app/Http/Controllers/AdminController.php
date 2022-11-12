<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin(){
        if(Auth::check()){
            return redirect()->to('home');
        }
        return view('login');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
    public function postloginAdmin(Request $req){
        $remember=$req->has('remember_me') ? true :false;
        if(Auth::attempt([
            'email'=>$req->email,
            'password'=>$req->password
        ],$remember)){
            return redirect('/home');
        }
        else{
            echo 'error';
        }
    }
}
