<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        //dd($request);
        $username = $request->email;
        $password = $request->password;

        if($username === "admin@gmail.com" && $password === "admin@123"){
            return redirect("dashboard");
        }else{
            return redirect('/')->with("warning", "Sorry! Your login failed. Kindly try again later");
        }
    }
}
