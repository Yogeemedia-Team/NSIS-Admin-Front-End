<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;


// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > All Students
Breadcrumbs::for('students', function ($trail) {
    $trail->parent('home');
    $trail->push('All Students', route('students'));
});

// Home > All Students > Add Student
Breadcrumbs::for('formpage', function ($trail) {
    $trail->parent('home');
    $trail->push('All Students', route('students'));
    $trail->push('Add Student', route('formpage'));
});

// Home > All Students > View Student
Breadcrumbs::for('single-student', function ($trail) {
    
    $trail->parent('home');
    $trail->push('All Students', route('students'));
    $trail->push('View students');
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});