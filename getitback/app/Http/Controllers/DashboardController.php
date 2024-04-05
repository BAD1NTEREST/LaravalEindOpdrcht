<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rit; // Voeg je model toe aan de top

class DashboardController extends Controller
{
    public function index()
    {
        $geplandeRitten = Rit::where('status', 'gepland')->get();
        $lopendeRitten = Rit::where('status', 'lopende')->get();
        $uitgevoerdeRitten = Rit::where('status', 'uitgevoerd')->get();
    
        return view('dashboard', compact('geplandeRitten', 'lopendeRitten', 'uitgevoerdeRitten'));
    }

}
