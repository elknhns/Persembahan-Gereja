<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offering;

class OfferingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('offerings.index');
    }
}
