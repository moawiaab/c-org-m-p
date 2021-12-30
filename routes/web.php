<?php

use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\BankAmountController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BudgetController;
use App\Http\Controllers\Admin\BudgetNameController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CtiyController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\FiscalYearController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProjectBranchController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectDepartmentController;
use App\Http\Controllers\Admin\ProjectStageController;
use App\Http\Controllers\Admin\RatificationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ShekController;
use App\Http\Controllers\Admin\StageDetailController;
use App\Http\Controllers\Admin\TreasuryController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::post('users/media', [UserController::class, 'storeMedia'])->name('users.storeMedia');
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Branch
    Route::post('branches/media', [BranchController::class, 'storeMedia'])->name('branches.storeMedia');
    Route::resource('branches', BranchController::class, ['except' => ['store', 'update', 'destroy']]);

    // User Alert
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);

    // Donor
    Route::resource('donors', DonorController::class, ['except' => ['store', 'update', 'destroy']]);

    // Fiscal Year
    Route::resource('fiscal-years', FiscalYearController::class, ['except' => ['store', 'update', 'destroy']]);

    // Budget Name
    Route::resource('budget-names', BudgetNameController::class, ['except' => ['store', 'update', 'destroy']]);

    // Budget
    Route::post('budgets/csv', [BudgetController::class, 'csvStore'])->name('budgets.csv.store');
    Route::put('budgets/csv', [BudgetController::class, 'csvUpdate'])->name('budgets.csv.update');
    Route::resource('budgets', BudgetController::class, ['except' => ['store', 'update', 'destroy']]);

    // Bank
    Route::resource('banks', BankController::class, ['except' => ['store', 'update', 'destroy']]);

    // Bank Amount
    Route::post('bank-amounts/csv', [BankAmountController::class, 'csvStore'])->name('bank-amounts.csv.store');
    Route::put('bank-amounts/csv', [BankAmountController::class, 'csvUpdate'])->name('bank-amounts.csv.update');
    Route::resource('bank-amounts', BankAmountController::class, ['except' => ['store', 'update', 'destroy']]);

    // Expense
    Route::get('expenses/print/{expense}', [ExpenseController::class, 'print'])->name('expenses.print');
    Route::post('expenses/media', [ExpenseController::class, 'storeMedia'])->name('expenses.storeMedia');
    Route::post('expenses/csv', [ExpenseController::class, 'csvStore'])->name('expenses.csv.store');
    Route::put('expenses/csv', [ExpenseController::class, 'csvUpdate'])->name('expenses.csv.update');
    Route::resource('expenses', ExpenseController::class, ['except' => ['store', 'update', 'destroy']]);

    // Country
    Route::post('countries/csv', [CountryController::class, 'csvStore'])->name('countries.csv.store');
    Route::put('countries/csv', [CountryController::class, 'csvUpdate'])->name('countries.csv.update');
    Route::resource('countries', CountryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Ctiy
    Route::post('ctiys/csv', [CtiyController::class, 'csvStore'])->name('ctiys.csv.store');
    Route::put('ctiys/csv', [CtiyController::class, 'csvUpdate'])->name('ctiys.csv.update');
    Route::resource('ctiys', CtiyController::class, ['except' => ['store', 'update', 'destroy']]);

    // Area
    Route::resource('areas', AreaController::class, ['except' => ['store', 'update', 'destroy']]);

    // Project Department
    Route::post('project-departments/csv', [ProjectDepartmentController::class, 'csvStore'])->name('project-departments.csv.store');
    Route::put('project-departments/csv', [ProjectDepartmentController::class, 'csvUpdate'])->name('project-departments.csv.update');
    Route::resource('project-departments', ProjectDepartmentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Project Branch
    Route::resource('project-branches', ProjectBranchController::class, ['except' => ['store', 'update', 'destroy']]);

    // Project
    Route::post('projects/csv', [ProjectController::class, 'csvStore'])->name('projects.csv.store');
    Route::put('projects/csv', [ProjectController::class, 'csvUpdate'])->name('projects.csv.update');
    Route::resource('projects', ProjectController::class, ['except' => ['store', 'update', 'destroy']]);

    // Project Stage
    Route::post('project-stages/csv', [ProjectStageController::class, 'csvStore'])->name('project-stages.csv.store');
    Route::put('project-stages/csv', [ProjectStageController::class, 'csvUpdate'])->name('project-stages.csv.update');
    Route::resource('project-stages', ProjectStageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Stage Details
    Route::post('stage-details/media', [StageDetailController::class, 'storeMedia'])->name('stage-details.storeMedia');
    Route::post('stage-details/csv', [StageDetailController::class, 'csvStore'])->name('stage-details.csv.store');
    Route::put('stage-details/csv', [StageDetailController::class, 'csvUpdate'])->name('stage-details.csv.update');
    Route::resource('stage-details', StageDetailController::class, ['except' => ['store', 'update', 'destroy']]);

    // Ratification
    Route::post('ratifications/media', [RatificationController::class, 'storeMedia'])->name('ratifications.storeMedia');
    Route::resource('ratifications', RatificationController::class, ['except' => ['store', 'update', 'destroy']]);

    // Treasury
    Route::resource('treasuries', TreasuryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Shek
    Route::post('sheks/csv', [ShekController::class, 'csvStore'])->name('sheks.csv.store');
    Route::put('sheks/csv', [ShekController::class, 'csvUpdate'])->name('sheks.csv.update');
    Route::resource('sheks', ShekController::class, ['except' => ['store', 'update', 'destroy']]);

    // Messages
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('messages/inbox', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('messages/outbox', [MessageController::class, 'outbox'])->name('messages.outbox');
    Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::get('messages/{conversation}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{conversation}', [MessageController::class, 'update'])->name('messages.update');
    Route::post('messages/{conversation}/destroy', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
