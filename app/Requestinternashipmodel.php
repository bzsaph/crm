<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestinternashipmodel extends Model
{
    use HasFactory;
    public function assigninternership()
    {
        return $this->belongsTo(User::class,'company_id');
    //    return $this->$this->hasOne('worksinstutions','user_id');
    }
    public function company()
    {
        return $this->belongsTo(Companysofferintership::class,'company_id');
    //    return $this->$this->hasOne('worksinstutions','user_id');
    }
}
