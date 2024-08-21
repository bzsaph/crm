<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentonproject extends Model
{
    use HasFactory;
    public function toname()
    {
        return $this->belongsTo(User::class,'to');
    //    return $this->$this->hasOne('worksinstutions','user_id');
    }

    public function fromcoment()
    {
        return $this->belongsTo(User::class,'from');
    //    return $this->$this->hasOne('worksinstutions','user_id');
    }
}
