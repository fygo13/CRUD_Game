<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\DeveloperController;

Route::resource('games', GameController::class);
Route::resource('developers', DeveloperController::class);