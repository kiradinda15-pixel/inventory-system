<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Transaction::with('item')->get()->map(function ($t) {
            return [
                'Barang' => $t->item->name ?? '-',
                'Type' => $t->type,
                'Qty' => $t->quantity,
                'Tanggal' => $t->date,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Barang',
            'Type',
            'Qty',
            'Tanggal',
        ];
    }
}