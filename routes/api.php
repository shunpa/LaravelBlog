<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/categories', 'CategoryApiController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
