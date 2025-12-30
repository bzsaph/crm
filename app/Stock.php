<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = ['_token'];
   
        protected $fillable = [
            'item_name',
            'quantity',
            'remaining_stock',
            'loged_in_id',
            'itemClsCd',
            'itemCd',
            'taxCode',
            'description',
            
        ];
    
        // If you need to specify a relationship with the users table
        public function user()
        {
            return $this->belongsTo(User::class, 'loged_in_id');
        }
        public function tax()
        {
            return $this->belongsTo(TaxCode::class, 'taxCode', 'name');
        }

}
