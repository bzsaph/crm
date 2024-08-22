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
    public function newprojectinsert()
    {
        $category = User::where('grade', '1')->get();
        return view('admin.Createstory', compact('category'));
    }
    public function storeproject(Request $request)
    {
        $validatedData = $request->validate([
            'assignedto' => ['required', 'string', 'max:255'],
            'projectname' => ['required', 'string', 'max:255', 'unique:newprojects'],
            'link' => ['required', 'string'],
        ]);
        if (Auth::user()->id == $request->assignedto) {
            Session::flash('message', "You can't assigne project to you on your self");
            return Redirect::back();
        } else {
            $submitestory = new Newproject();
            $submitestory->created_by = Auth::user()->id;
            $submitestory->projectname = $request->projectname;
            $submitestory->assigned_to = $request->assignedto;
            $submitestory->link = $request->link;
            $submitestory->save();
            Session::flash('message', " successfull");
            return Redirect::back();
        }
    }

    
    public function viewstory()
    {
        $story = Newstory::all();
        return view('admin.viewsalltory', compact('story'));
    }
    public function newuser()
    {
        $roles = Role::all();

        return view('admin.createnewuser', compact('roles'));
    }
    public function alluser()
    {
        $user = User::all();
        return view('admin.user', compact('user'));
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

    public function viewprojectsented()
    {
        $Newproject = Newproject::where([['created_by', auth::user()->id], ['status', 'active']])->orWhere([['assigned_to', auth::user()->id], ['status', 'active']])->get();
        return view('admin.category', compact('Newproject'));
    }

    public function commentonproject($id)
    {
        $viewproject = Newproject::findorfail($id);
        $viewcomment = Commentonproject::where('newprojects_id', $viewproject->id)->get();
        foreach ($viewcomment as $key => $value) {
            if (Auth::user()->id == $value->from) {
                $output = Commentonproject::where([['from', $value->from], ["newprojects_id", $viewproject->id]])
                    ->update(['view' => "1"]);
                Commentonproject::where([['to', $value->from], ["newprojects_id", $viewproject->id]])
                    ->update(['view' => "0"]);
            } else {

            }
        }
        return view('admin.commentonproject', compact('viewproject', 'viewcomment'));
    }

    public function comentontheproject(Request $request)
    {
        $findidassignedto = Newproject::findorfail($request->projectid);
        if ($findidassignedto->created_by == Auth::user()->id) {
            $comment = new Commentonproject();
            $comment->from = Auth::user()->id;
            $comment->comment = $request->comment;
            $comment->to = $findidassignedto->assigned_to;
            $comment->newprojects_id = $findidassignedto->id;
            $comment->view = 0;
            $comment->save();
            Session::flash('message', " successfull");
            return Redirect::back();
        } else {
            $comment = new Commentonproject();
            $comment->from = Auth::user()->id;
            $comment->comment = $request->comment;
            $comment->to = $findidassignedto->created_by;
            $comment->newprojects_id = $findidassignedto->id;
            $comment->view = 0;
            $comment->save();
            Session::flash('message', " successfull");
            return Redirect::back();
        }

    }
    public function newcompany()
    {
        return view('admin.internaship.choosencompany');
    }

    public function insertnewcompany(Request $request)
    {
        $validatedData = $request->validate([
            'contactperson' => ['required', 'string', 'max:255'],
            'phonenumber' => ['required', 'string', 'max:255'],
            'companyname' => ['required', 'string', 'max:255', 'unique:companysofferinterships'],
            'website' => ['required', 'string', 'max:255', 'unique:companysofferinterships'],
        ]);

        $company = new Companysofferintership();
        $company->contactperson = $request->contactperson;
        $company->phonenumber = $request->phonenumber;
        $company->companyname = $request->companyname;
        $company->website = $request->website;
        $company->star = "0";
        $company->status = "active";
        $company->user_id = Auth::user()->id;
        $company->save();
        Session::flash('message', " successfull");
        return Redirect::back();
    }
    public function indexcreatecompany()
    {
        $category = User::where('grade', '1')->get();
        $company = Companysofferintership::where('status', 'active')->get();
        $checkifhasesubmited = Requestinternashipmodel::where('user_id', Auth::user()->id)->first();
        if ($checkifhasesubmited != null) {
            $checkif = Requestinternashipmodel::where('user_id', Auth::user()->id)->first();
            return view('admin.internaship.viewinternashipdetails', compact('checkif'));
        }
        return view('admin.internaship.indexcreatecompany', compact('category', 'company'));
    }
    public function storeinternaship(Request $request)
    {
        $validatedData = $request->validate([
            'assignedto' => ['required'],
            'startingdate' => ['required'],
            'spname' => ['required'],
            'spphone' => ['required'],
        ]);

        $company = new Requestinternashipmodel();
        $company->assignedto = $request->assignedto;
        $company->startingdate = $request->startingdate;
        $company->endingdate = $request->endingdate;
        $company->spname = $request->spname;
        $company->spphone = $request->spphone;
        $company->code = Str::random(3) . rand(0, 99);
        $company->decision = "no";
        $company->status = "active";
        $company->company_id = $request->companyid;
        $company->user_id = Auth::user()->id;
        $company->save();
        Session::flash('message', " successfull");
        return Redirect::back();
    }
    public function addreportoftheweek($id)
    {
        $reportoftheweek = Requestinternashipmodel::find($id);
        if ($reportoftheweek != null) {
            $Reportinternship = Reportinternship::where('project_id', $id)->get();
            return view('admin.internaship.weekreport', compact('Reportinternship', 'reportoftheweek'));
        } else {
            Session::flash('message', " you have to be serios this you will be blocked three times");
            return redirect('/home');
        }
    }
    public function postweekreport(Request $request)
    {
        $validatedData = $request->validate([
            'week' => ['required'],
            'comment' => ['required'],
            'interneshipid' => ['required'],
        ]);
        $company = new Reportinternship();
        $company->week = $request->week;
        $company->information = $request->comment;
        $company->project_id = $request->interneshipid;
        $company->assigned_to = $request->assignedto;
        $company->user_id = Auth::user()->id;
        $company->code = "0";
        $company->save();
        Session::flash('message', " successfull");
        return Redirect::back();

    }
    public function allcompany(Type $var = null)
    {
        $company = Companysofferintership::where('status', 'active')->get();
        return view('admin.allcompanyofferinternship', compact('company'));
    }

}
