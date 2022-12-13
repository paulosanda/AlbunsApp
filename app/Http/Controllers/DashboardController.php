<?php

namespace App\Http\Controllers;

use App\Actions\GetArtists;
use Illuminate\Http\Request;


class DashboardController extends Controller
{

    public function index()
    {
        $artists = app(GetArtists::class)->handle();

        return view('dashboard', compact('artists'));
    }
}
