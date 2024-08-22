<?php
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleandPermissionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Userscontroller@welcome');




Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/newrole', [RoleandPermissionController::class, 'newrole']);
    Route::get('/setting', [RoleandPermissionController::class, 'setting']);
    Route::post('/postpermission', [RoleandPermissionController::class, 'postpermission']);
    Route::post('/postrole', [RoleandPermissionController::class, 'postrole']);
    Route::post('/roleupdate/{id}', [RoleandPermissionController::class, 'roleupdate']);
    
    Route::get('/newuser', [HomeController::class, 'newuser']);
    Route::post('admin/newuser', [HomeController::class, 'storenewuser']);
    Route::get('all/user', [HomeController::class, 'alluser']);
    Route::get('/edituser/{id}', [HomeController::class, 'edituser']);
    Route::any('/admin/updateuser', [HomeController::class, 'updateuser']);
   
    // Clients
    Route::resource('clients', ClientController::class);

    // Billing
    Route::post('billing/monthly', [BillingController::class, 'createMonthlySubscription'])->name('billing.createMonthly');
    Route::post('billing/yearly', [BillingController::class, 'createYearlySubscription'])->name('billing.createYearly');

    // Reminders
    Route::post('reminders', [ReminderController::class, 'store'])->name('reminders.store');
    Route::get('reminders/send', [ReminderController::class, 'sendReminders'])->name('reminders.send');

    // Complaints
    Route::resource('complaints', ComplaintController::class);

    // Reports
    Route::resource('reports', ReportController::class);

    // Tasks
    Route::get('clients/{client}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update');

    
   
});




// Auth::routes(['register' => true]);

