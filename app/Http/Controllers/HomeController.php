<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function __construct() {
        
    }

    public function index() { return view('home.index'); }
    public function features() { return view('home.features'); }
    public function plans() { return view('home.plans'); }
    public function download() { return view('home.download'); }

    public function profile() { return view('user.profile'); }
}
