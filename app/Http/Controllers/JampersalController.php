<?php

namespace App\Http\Controllers;

use App\SasaranJampersal;
use Illuminate\Http\Request;

class JampersalController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
       $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $jampersal = SasaranJampersal::all();
        //dd($jampersal);
        return view('ukp_poned.jampersal', compact('jampersal'));
    }
}
