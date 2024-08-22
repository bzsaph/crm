<?php

namespace App\Http\Controllers;

use App\Newproject;
use App\Comment;
use App\User;
use App\Newstory;
use App\Productforsel;
use App\suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Userscontroller extends Controller
{
    public function welcome(){


        return view('welcome');

    }



}





