<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Exports\TransactionsExport;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('item')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $items = Item::all();
        return view('transactions.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'type' => 'required',
            'quantity' => 'required|integer|min:1',
            'date' => 'required',
        ]);
    
        $item = Item::findOrFail($request->item_id);
    
        // 🔥 LOGIC UTAMA
        if ($request->type == 'IN') {
            $item->stock += $request->quantity;
        } else {
            if ($item->stock < $request->quantity) {
                return back()->with('error', 'Stok tidak cukup!');
            }
            $item->stock -= $request->quantity;
        }
    
        $item->save();
    
        Transaction::create($request->all());
    
        return redirect()->route('transactions.index')
            ->with('success', 'Transaksi berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function export()
    {
    return Excel::download(new TransactionsExport, 'transactions.xlsx');
    }
}
