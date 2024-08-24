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
    
    // Billing
    Route::any('billing/monthly', [BillingController::class, 'createMonthlySubscription'])->name('billing.createMonthly');
    Route::any('billing/yearly', [BillingController::class, 'createYearlySubscription'])->name('billing.createYearly');

    // Reminders
    Route::post('reminders', [ReminderController::class, 'store'])->name('reminders.store');
    Route::get('reminders/send', [ReminderController::class, 'sendReminders'])->name('reminders.send');

    // Complaints (Manual Routes)
    Route::get('clients/{client}/complaints', [ComplaintController::class, 'index'])->name('complaints.index');
    Route::get('clients/{client}/complaints/create', [ComplaintController::class, 'create'])->name('complaints.create');
    Route::post('complaints', [ComplaintController::class, 'store'])->name('complaints.store');
    Route::get('complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show');
    Route::get('complaints/{complaint}/edit', [ComplaintController::class, 'edit'])->name('complaints.edit');
    Route::put('complaints/{complaint}', [ComplaintController::class, 'update'])->name('complaints.update');
    Route::delete('complaints/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');

    // Clients (Manual Routes)
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('clients/{client}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // Reports (Manual Routes)
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('reports', [ReportController::class, 'store'])->name('reports.store');
    Route::get('reports/{report}', [ReportController::class, 'show'])->name('reports.show');
    Route::get('reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
    Route::put('reports/{report}', [ReportController::class, 'update'])->name('reports.update');
    Route::delete('reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');

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


Route::prefix('sales')->name('sales.')->group(function () {
    Route::get('/', [SaleController::class, 'index'])->name('index');
    Route::get('create', [SaleController::class, 'create'])->name('create');
    Route::post('/', [SaleController::class, 'store'])->name('store');
    Route::get('{id}', [SaleController::class, 'show'])->name('show');
    Route::get('{id}/edit', [SaleController::class, 'edit'])->name('edit');
    Route::put('{id}', [SaleController::class, 'update'])->name('update');
    Route::delete('{id}', [SaleController::class, 'destroy'])->name('destroy');
    Route::get('{id}/invoice', [SaleController::class, 'generateInvoice'])->name('invoice');
});

});