<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PonedController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
       $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('ukp_poned.index');
    }
}
