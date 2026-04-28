<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'stock', 'min_stock', 'supplier_id'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }



}