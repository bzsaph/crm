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
        'unit_price',
        'sold_from',
        'total_price',
        'invoice_number', 
        'loged_in_id',
        
      
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
