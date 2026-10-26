<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PurchaseHistoryController extends Controller
{
    public function index(): View
    {
        $orders = auth()->user()
            ->orders()
            ->with('items')
            ->latest()
            ->paginate(10);

        return view('History', [
            'orders' => $orders,
        ]);
    }
}
