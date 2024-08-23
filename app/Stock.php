<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = ['_token'];
    protected $fillable = ['item_name', 'quantity', 'price', 'status']; // Add only your fields here
}
