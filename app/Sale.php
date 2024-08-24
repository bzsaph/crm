<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = [
        'client_id',
        'invoice_number',
        'loged_in_id',
    ];

    // Define the relationship with the Client model
    public function client() {
        return $this->belongsTo(Client::class);
    }

    // Define the relationship with the SaleProduct model
    public function products() {
        return $this->hasMany(SoldProduct::class);
    }
    
    public function soldProducts()
    {
        return $this->hasMany(SoldProduct::class);
    }
   
}
