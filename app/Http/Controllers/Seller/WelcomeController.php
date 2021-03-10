<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
