<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        $kilometerPriceOption = Option::where('key', 'kilometer_price')->first();
        $kilometerPrice = $kilometerPriceOption ? $kilometerPriceOption->value : '0.00';

        return view('admin.options.index', compact('kilometerPrice'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kilometer_price' => 'required|numeric|min:0',
        ]);

        Option::updateOrCreate(
            ['key' => 'kilometer_price'],
            ['value' => $request->kilometer_price]
        );

        return back()->with('success', 'Kilometerprijs bijgewerkt.');
    }
}
