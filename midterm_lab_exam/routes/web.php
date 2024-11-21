<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('movies')->group(function () {
    Route::get('/', [MovieController::class, 'index']);

    Route::post('/get-details', [MovieController::class, 'get_details']);
    Route::post('/refetch', [MovieController::class, 'refetch']);
    Route::post('/search', [MovieController::class, 'search']);

    Route::post('/add', [MovieController::class, 'add']);
    Route::post('/edit', [MovieController::class, 'edit']);

    Route::post('/create', [MovieController::class, 'create']);
    Route::post('/update', [MovieController::class, 'update']);
    Route::post('/delete', [MovieController::class, 'delete']);
});
