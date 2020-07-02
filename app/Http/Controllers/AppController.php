<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct ()
    {
        $this->middleware('auth')->only('downloadConfig');
    }

    public function home ()
    {
        if (Auth::check()) return view('user.home');
        else return view('home');
    }

    public function downloadConfig ($type = 'sharex')
    {
        return auth()->user()->getConfig($type);
    }
}
