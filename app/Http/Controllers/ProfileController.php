<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the profile page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.profile.index');
    }
}
