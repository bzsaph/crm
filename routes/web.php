<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleandPermissionController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\Userscontroller;
use App\Http\Controllers\CompanyController;

Auth::routes();
Route::get('/', 'Userscontroller@welcome');

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

    // Grouping the routes for better organization

    
    // Billing
    Route::any('billing/monthly', [BillingController::class, 'createMonthlySubscription'])->name('billing.createMonthly');
    Route::any('billing/yearly', [BillingController::class, 'createYearlySubscription'])->name('billing.createYearly');

    // Reminders
    Route::post('reminders', [ReminderController::class, 'store'])->name('reminders.store');
    Route::get('reminders/send', [ReminderController::class, 'sendReminders'])->name('reminders.send');


    
   

    // Clients (Manual Routes)
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('clients/{client}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::get('/clients/search', [ClientController::class, 'search'])->name('clients.search');


    // Reports (Manual Routes)
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('reports', [ReportController::class, 'store'])->name('reports.store');
    Route::get('reports/{report}', [ReportController::class, 'show'])->name('reports.show');
    Route::get('reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
    Route::put('reports/{report}', [ReportController::class, 'update'])->name('reports.update');
   
   

    // Tasks
    Route::get('clients/{client}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('clients/{client}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update');

// Billing Routes
Route::prefix('billing')->name('billing.')->group(function () {
    Route::get('/', [BillingController::class, 'index'])->name('index');
    Route::get('/{client}/details', [BillingController::class, 'show'])->name('details');
    Route::get('/{client}/remind', [BillingController::class, 'remind'])->name('remind');
});

// Stock Routes
Route::prefix('stock')->name('stock.')->group(function () {
    Route::get('/', [StockController::class, 'index'])->name('index');
    Route::get('/create', [StockController::class, 'create'])->name('create');
    Route::post('/', [StockController::class, 'store'])->name('store');
    Route::get('/{stock}/edit', [StockController::class, 'edit'])->name('edit');
    Route::put('/{stock}', [StockController::class, 'update'])->name('update');
    Route::get('/sold', [StockController::class, 'sold'])->name('sold');
});
Route::prefix('complaints')->name('complaints.')->group(function () {
    // Route to display all complaints for a specific client
    Route::get('/', [ComplaintController::class, 'index'])->name('index');
    // Route to show the form for creating a new complaint
    Route::get('/create', [ComplaintController::class, 'create'])->name('create');
    // Route to store a new complaint
    Route::post('/', [ComplaintController::class, 'store'])->name('store');
    // Route to display a specific complaint
    Route::get('/{complaint}', [ComplaintController::class, 'show'])->name('show');
    // Route to show the form for editing a specific complaint
    Route::get('/{complaint}/edit', [ComplaintController::class, 'edit'])->name('edit');
    // Route to update a specific complaint
    Route::put('/{complaint}', [ComplaintController::class, 'update'])->name('update');
    // Route to delete a specific complaint
    Route::delete('/{complaint}', [ComplaintController::class, 'destroy'])->name('destroy');
});
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index'); // View all companies
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create'); // Create new company
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store'); // Store new company
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit'); // Edit company
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update'); // Update company
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show'); // Show company
    Route::put('/companies/{company}/status', [CompanyController::class, 'updateStatus'])->name('companies.updateStatus'); // Update company status
});





Route::prefix('sales')->name('sales.')->group(function () {
    Route::get('/', [SaleController::class, 'index'])->name('index');
    Route::get('create', [SaleController::class, 'create'])->name('create');
    Route::post('/', [SaleController::class, 'store'])->name('store');
    Route::get('{id}', [SaleController::class, 'show'])->name('show');
    Route::get('{id}/edit', [SaleController::class, 'edit'])->name('edit');
    Route::put('{id}', [SaleController::class, 'update'])->name('update');
    Route::delete('{id}', [SaleController::class, 'destroy'])->name('destroy');
    Route::get('{id}/invoice', [SaleController::class, 'generateInvoice'])->name('invoice');
    Route::get('{id}/perform', [SaleController::class, 'generateperform'])->name('perform');
});
Route::prefix('admin')->middleware('auth')->group(function () {
    // Route to display the form to create a new user
    Route::get('/users/create', [Userscontroller::class, 'create'])->name('users.create');
    // Route to store a new user
    Route::post('/users', [Userscontroller::class, 'store'])->name('users.store');
    // Route to list all users
    Route::get('/users', [Userscontroller::class, 'index'])->name('users.index');
    // Route to display the form to edit a user
    Route::get('/users/{id}/edit', [Userscontroller::class, 'edit'])->name('users.edit');
    // Route to update a user's information
    Route::put('/users/{id}', [Userscontroller::class, 'update'])->name('users.update');
});
});