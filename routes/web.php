<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = \App\Models\Project::orderBy('sort', 'asc')->get();
    return view('welcome', compact('projects', ));
});


Route::get('/test', function () {
    return view('main');
});
