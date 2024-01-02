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
    $trail->push('View Student');
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

// Grades
Breadcrumbs::for('grades', function ($trail) {
    $trail->parent('home');
    $trail->push('All Grades', route('grades'));
});
Breadcrumbs::for('addgrade', function ($trail) {
    $trail->parent('home');
    $trail->push('Add Grade', route('addgrade'));
});

// Classes
Breadcrumbs::for('classes', function ($trail) {
    $trail->parent('home');
    $trail->push('All Classes', route('classes'));
});
Breadcrumbs::for('addclass', function ($trail) {
    $trail->parent('home');
    $trail->push('Add Class', route('addclass'));
});

// Extracurriculars
Breadcrumbs::for('extracurriculars', function ($trail) {
    $trail->parent('home');
    $trail->push('All Extracurriculars', route('extracurriculars'));
});
Breadcrumbs::for('addextracurricular', function ($trail) {
    $trail->parent('home');
    $trail->push('Add Extracurricular', route('addextracurricular'));
});

// YearGradeClass
Breadcrumbs::for('year_grade_class', function ($trail) {
    $trail->parent('home');
    $trail->push('All Relationships', route('year_grade_class'));
});
Breadcrumbs::for('add_year_grade_class', function ($trail) {
    $trail->parent('home');
    $trail->push('Add Relationships', route('add_year_grade_class'));
});
