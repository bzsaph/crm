<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldProduct extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = [
        'sale_id',
        'stock_id',
        'quantity',
        'total_price',
        'invoice_number', // Optional, depending on your requirements
    ];

    // Define the relationship with the Sale model
    public function sale() {
        return $this->belongsTo(Sale::class);
    }

    // Define the relationship with the Stock model
    public function stock() {
        return $this->belongsTo(Stock::class);
    }
}
