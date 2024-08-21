<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newproject extends Model
{
    use HasFactory;
    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    //    return $this->$this->hasOne('worksinstutions','user_id');
    }
    public function assignedto()
    {
        return $this->belongsTo(User::class,'assigned_to');
    //    return $this->$this->hasOne('worksinstutions','user_id');
    }
}
