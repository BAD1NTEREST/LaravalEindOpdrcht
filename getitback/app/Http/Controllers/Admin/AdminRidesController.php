<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Rit;
use Illuminate\Http\Request;

class AdminRidesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        $rides = Rit::all();
        return view('admin.rides.index', compact('rides'));
    }

    public function update(Request $request, Rit $ride)
    {
        $request->validate([
            'status' => 'required|in:pending,underway,completed',
        ]);

        $ride->status = $request->status;
        $ride->save();

        return back()->with('success', 'Status bijgewerkt.');
    }
}
