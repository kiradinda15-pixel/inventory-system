<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $monthlyData = Transaction::select(
            DB::raw("strftime('%m', date) as month"),
            DB::raw("SUM(CASE WHEN LOWER(type) = 'in' THEN quantity ELSE 0 END) as total_in"),
            DB::raw("SUM(CASE WHEN LOWER(type) = 'out' THEN quantity ELSE 0 END) as total_out")
        )
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $totalSuppliers = Supplier::count();
        $totalItems = Item::count();
        $totalTransactions = Transaction::count();

        $lowStockItems = Item::whereColumn('stock', '<=', 'min_stock')->get();

        $inCount = Transaction::whereRaw("LOWER(type) = 'in'")->count();
        $outCount = Transaction::whereRaw("LOWER(type) = 'out'")->count();

        return view('dashboard', compact(
            'totalSuppliers',
            'totalItems',
            'totalTransactions',
            'lowStockItems',
            'inCount',
            'outCount',
            'monthlyData'
        ));
    }
}