<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display the landing page.
     * Redirect to dashboard if user is already logged in.
     */
    public function index()
    {
        return view('index');
    }
}
