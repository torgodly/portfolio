<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = \App\Models\Project::orderBy('sort', 'asc')->get();
    $testimonials = \App\Models\Testimonial::orderBy('sort', 'asc')->get();
    return view('welcome', compact('projects', 'testimonials'));
});
