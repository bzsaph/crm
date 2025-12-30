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
        
        'company_tin','computation_type','sale_type','voucher_amount','discount_amount',
            'business_partner_name','invoice_date','client_tin','total_amount','total_vat',
            'client_tin_pin','exchange_rate','currency','discount_type','item_code','item_description',
            'item_category','batch','tax_code','tax_rate','expire_date'
      
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
