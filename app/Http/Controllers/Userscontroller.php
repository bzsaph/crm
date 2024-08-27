<?php

namespace App\Http\Controllers;

use App\Newproject;
use App\Comment;
use App\Company;
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
/**
     * Display form to create a new user.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
           
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->status = "active";
        $user->grade = "0";
        $user->save();

        // Assign roles to the user
        $user->assignRole($validatedData['roles']);

        Session::flash('message', "User created successfully");
        return Redirect::route('users.index');
    }

    /**
     * Display a listing of all users.
     */
    public function index()
    {
        $users = DB::table('users')
        ->leftJoin('company_users', 'users.id', '=', 'company_users.user_id')
        ->leftJoin('companies', 'companies.id', '=', 'company_users.company_id')
        ->select('users.*', 'companies.name as company_name')
        ->get();

    return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Display the form to edit an existing user.
     */
   
     public function edit($id)
     {
         // Fetch user with related companies and roles
         $user = User::with('companies', 'roles')->findOrFail($id);
         $roles = Role::all(); // Assuming you need roles
         $companies = Company::all(); // Fetch all companies

         // Convert user's companies to an array of IDs
         $userCompanyIds = $user->companies->pluck('id')->toArray();
         $userRoleIds = $user->roles->pluck('id')->toArray();
     
         return view('admin.users.edit', compact('user', 'roles', 'companies', 'userCompanyIds', 'userRoleIds'));
     }
     

     
        


    

     public function update(Request $request, $id)
     {
         // Validate the input data
         $validatedData = $request->validate([
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
             'grade' => ['required'],
             'roles' => ['required', 'array'], // Array of roles
             'roles.*' => ['exists:roles,id'], // Ensure all roles exist
             'company_id' => ['nullable', 'array'], // Allow null or array of company IDs
             'company_id.*' => ['exists:companies,id'], // Ensure all companies exist
         ]);
     
         // Find the user by ID
         $user = User::findOrFail($id);
     
         // Update user data
         $user->name = $validatedData['name'];
         $user->email = $validatedData['email'];
         $user->grade = $validatedData['grade'];
         $user->save();
     
         // Sync roles
         $user->syncRoles($validatedData['roles']);
     
         // Sync companies if provided
         if (isset($validatedData['company_id'])) {
             $user->companies()->sync($validatedData['company_id']);
         } else {
             // Detach all companies if no company IDs are provided
             $user->companies()->detach();
         }
     
         // Flash success message and redirect
         Session::flash('message', "User updated successfully");
         return Redirect::route('home');
     }
     

}





