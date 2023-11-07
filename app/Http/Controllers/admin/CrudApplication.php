<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrudApplication extends Controller
{
    public function index(){

        return view("admin/login");

    }
    public function submit (Request $request){
        $email = $request->input("email");
        $password = $request->input("pswd");

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            $request->session()->put('user', auth()->user());
            return redirect('/dashboard');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Login failed.']);
        }
    }
    public function dashboard(){
        echo "dashboard";
    }
}
