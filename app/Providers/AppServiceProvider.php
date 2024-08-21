<?php

namespace App\Providers;
use App\Commentonproject;
use App\Newproject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Schema\Builder; // Import Builder where defaultStringLength method is defined
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         return "hello";
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Builder::defaultStringLength(191);
        view()->composer('*', function($view)
        {

            if (Auth::check()) {
                $userName = auth()->user()->id;
                $user=$view->with('currentUser', Auth::user()->id);
                $viewproject=Newproject::where("created_by",Auth::user()->id)->orWhere('assigned_to', Auth::user()->id)->get();
              if ($viewproject != null) {
                $Permissions ="0";
                View::share('selectunreaded', $Permissions);

               foreach ( $viewproject as $key => $value) {
                    if ($value->created_by == Auth::user()->id) {
                        $Permissions = CommentonProject::where([["from",$userName],["view","0"]])->count();
                        if ( $Permissions == null) {
                            View::share('selectunreaded', $Permissions);
                        }

                        View::share('selectunreaded', $Permissions);
                    }else{

                        $Permission = CommentonProject::where([["from",$userName],["view","0"]])->count();
                        if ( $Permissions == null) {
                            $Permissions =[];

                            View::share('selectunreaded', $Permissions);
                        }
                        View::share('selectunreaded', $Permission);
                    }
               }
            }





            }else {
               $user= $view->with('currentUser', null);

            }

           // $selectunreaded=CommentonProject::where()->count();
           // $view->with(['selectunreaded' => $selectunreaded]);
        }); // Update defaultStringLength



    }
}

