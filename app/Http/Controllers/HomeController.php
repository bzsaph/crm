<?php

namespace App\Http\Controllers;

use App\Commentonproject;
use App\Companysofferintership;
use App\Newproject;

use App\Reportinternship;
use App\Requestinternashipmodel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $post = Newproject::select(DB::raw('count(*) as project, category_id'))
        // ->groupBy('category_id')
        // ->get();
        $today = Carbon::now();
        $today->month; // retrieve the month
        $today->year;
        $post = [];
             

        $countactive = [];
        $countinactive =[];
        $companys = [];
        return view('admin.dashboard', compact('countactive', 'countinactive','companys','post'));
    }

    public function newuser()
    {
        $roles = Role::all();

        return view('admin.createnewuser', compact('roles'));
    }
    public function alluser()
    {
        $user = User::all();
        return view('admin.users.user', compact('user'));
    }
    public function storenewuser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $usersave = new User();
        $usersave->name = $request->name;
        $usersave->email = $request->email;
        $usersave->password = Hash::make($request->password);
        $usersave->status = "active";
        $usersave->grade = "0";
        $usersave->save();
        Session::flash('message', "User created successfull");
        return Redirect::back();
    }
    public function edituser($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        $roless = $user->roles;
        return view('admin.form.edituser', compact('roles', 'user', 'roless'));
    }
    public function updateuser(Request $request)
    {
        $user = User::find($request->id);
        $resurt = $user->hasAnyRole(Role::all());
        if ($resurt == true) {
            $user->syncRoles([]);
            $user->assignRole($request->roles);
            User::where('id', $request->id)
                ->update(['grade' => $request->grade]);
            Session::flash('message', "User created successfull");
            return Redirect::back();
        } else {
            User::where('id', $request->id)
                ->update(['grade' => $request->grade]);
            $user->assignRole($request->roles);
            Session::flash('message', "User created successfull");
            return Redirect::back();
        }

    }
    public function roleupdate(Request $request, $id)
    {
        $role = Role::findById($id);
        $resurt = $role->hasPermissionTo($role);
        if ($resurt == true) {
            $role->syncPermissions($role);
            $role->givePermissionTo([$request->permissions]);
            Session::flash('message', "User created successfull");
            return Redirect::back();
        } else {
            $role->syncPermissions($role);
            $role->givePermissionTo([$request->permissions]);
            Session::flash('message', "User created successfull");
            return Redirect::back();
        }
    }
    public function newproduct()
    {
        return view('admin.product.newproduct');
    }


    

  
   

}
