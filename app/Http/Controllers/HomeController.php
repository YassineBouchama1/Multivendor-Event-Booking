<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('guest.home');
    }

    public function registerUser()
    {
        return view('guest.registerUser');
    }
}
