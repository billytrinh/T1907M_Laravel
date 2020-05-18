<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function demoRouting(){
        return view("demo");
    }

    public function login(){
        return view("login");
    }

    public function register(){
        return view("register");
    }

    public function index(){
        return view("home");
    }
}
