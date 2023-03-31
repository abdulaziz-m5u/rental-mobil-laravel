<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $teams = Team::get();

        return view('frontend.about', compact('teams'));
    }
}
