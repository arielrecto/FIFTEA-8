<?php

namespace App\Http\Controllers;

use App\Models\StockLimit;
use Illuminate\Http\Request;

class StockLimitController extends Controller
{
    public function index()
    {
        $limit = StockLimit::first();
        if (!$limit) {
            return view('stock-limit.index');
        }
        return view('stock-limit.index', compact('limit'));
    }

    public function update(Request $request, $limitId)
    {
        // dd($request->all());
        $limit = StockLimit::find($limitId);

        if (!$limit) {
            return back()->with('error', 'Stock limit could not be updated');
        }

        $request->validate([
            'low' => 'required|numeric',
            'high' => 'required|numeric',
        ]);

        $limit->update([
            'low' => $request->low,
            'high' => $request->high,
        ]);

        if (!$limit) {
            return back()->with('error', 'Stock limit could not be updated');
        }
        return back()->with('success', 'Stock limit updated successfully');
    }
}
