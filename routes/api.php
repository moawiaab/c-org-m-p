<?php

use App\Http\Controllers\Api\V1\Admin\BankAmountApiController;
use App\Http\Controllers\Api\V1\Admin\BankApiController;
use App\Http\Controllers\Api\V1\Admin\BranchApiController;
use App\Http\Controllers\Api\V1\Admin\BudgetApiController;
use App\Http\Controllers\Api\V1\Admin\BudgetNameApiController;
use App\Http\Controllers\Api\V1\Admin\CountryApiController;
use App\Http\Controllers\Api\V1\Admin\CtiyApiController;
use App\Http\Controllers\Api\V1\Admin\DonorApiController;
use App\Http\Controllers\Api\V1\Admin\ExpenseApiController;
use App\Http\Controllers\Api\V1\Admin\ProjectApiController;
use App\Http\Controllers\Api\V1\Admin\ProjectBranchApiController;
use App\Http\Controllers\Api\V1\Admin\ProjectDepartmentApiController;
use App\Http\Controllers\Api\V1\Admin\ProjectStageApiController;
use App\Http\Controllers\Api\V1\Admin\ShekApiController;
use App\Http\Controllers\Api\V1\Admin\StageDetailApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::post('users/media', [UserApiController::class, 'storeMedia'])->name('users.store_media');
    Route::apiResource('users', UserApiController::class);

    // Branch
    Route::post('branches/media', [BranchApiController::class, 'storeMedia'])->name('branches.store_media');
    Route::apiResource('branches', BranchApiController::class);

    // Donor
    Route::apiResource('donors', DonorApiController::class);

    // Budget Name
    Route::apiResource('budget-names', BudgetNameApiController::class);

    // Budget
    Route::apiResource('budgets', BudgetApiController::class);

    // Bank
    Route::apiResource('banks', BankApiController::class);

    // Bank Amount
    Route::apiResource('bank-amounts', BankAmountApiController::class);

    // Expense
    Route::post('expenses/media', [ExpenseApiController::class, 'storeMedia'])->name('expenses.store_media');
    Route::apiResource('expenses', ExpenseApiController::class);

    // Country
    Route::apiResource('countries', CountryApiController::class);

    // Ctiy
    Route::apiResource('ctiys', CtiyApiController::class);

    // Project Department
    Route::apiResource('project-departments', ProjectDepartmentApiController::class);

    // Project Branch
    Route::apiResource('project-branches', ProjectBranchApiController::class);

    // Project
    Route::apiResource('projects', ProjectApiController::class);

    // Project Stage
    Route::apiResource('project-stages', ProjectStageApiController::class);

    // Stage Details
    Route::post('stage-details/media', [StageDetailApiController::class, 'storeMedia'])->name('stage_details.store_media');
    Route::apiResource('stage-details', StageDetailApiController::class);

    // Shek
    Route::apiResource('sheks', ShekApiController::class);
});
