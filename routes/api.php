<?php

use Illuminate\Support\Facades\Route;

Route::get('/content-data', function () {
    return response()->json([
        ['id' => 1, 'title' => 'Article A', 'description' => 'This is article A'],
        ['id' => 2, 'title' => 'Article B', 'description' => 'This is article B'],
    ]);
});