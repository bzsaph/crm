<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleandPermissionController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function newrole()
    {
        return view('admin.role');
    }
    public function setting()
    {
        $role = Role::all();
        $permissions = Permission::all();

        return view('admin.setting', compact('role', 'permissions'));
    }
    public function postpermission(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:permissions', 'max:255'],
        ]);
        $category = new Permission();
        $category->name = $request->name;
        $category->save();
        Session::flash('message', "Permission created successfull");
        Alert::success('Success Title', 'Permission created successfull');
        return Redirect::back();
    }
    public function postrole(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:roles', 'max:255'],
        ]);
        $category = new Role();
        $category->name = $request->name;
        $category->save();
        Session::flash('message', "");
        Alert::success('Success Title', 'Role created successfull');
        return Redirect::back();
    }
}
