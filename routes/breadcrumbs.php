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
    $trail->push('Add Grade', route('add_grade'));
});

// Classes
Breadcrumbs::for('classes', function ($trail) {
    $trail->parent('home');
    $trail->push('All Classes', route('classes'));
});
Breadcrumbs::for('addclass', function ($trail) {
    $trail->parent('home');
    $trail->push('Add Class', route('add_class'));
});

// Extracurriculars
Breadcrumbs::for('extracurriculars', function ($trail) {
    $trail->parent('home');
    $trail->push('All Extracurriculars', route('extracurriculars'));
});
Breadcrumbs::for('addextracurricular', function ($trail) {
    $trail->parent('home');
    $trail->push('Add Extracurricular', route('add_extracurricular'));
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

// User sections
// User Accounts
Breadcrumbs::for('user_accounts', function ($trail) {
    $trail->parent('home');
    $trail->push('User Accounts', route('user_accounts'));
});

Breadcrumbs::for('add_user_account', function ($trail) {
    $trail->parent('user_accounts');
    $trail->push('Add User Account', route('add_user_account'));
});

// User Activities
Breadcrumbs::for('user_activities', function ($trail) {
    $trail->parent('home');
    $trail->push('User Activities', route('user_activities'));
});

Breadcrumbs::for('add_user_activity', function ($trail) {
    $trail->parent('user_activities');
    $trail->push('Add User Activity', route('add_user_activity'));
});

// User Assigning
Breadcrumbs::for('user_assigning', function ($trail) {
    $trail->parent('home');
    $trail->push('User Assigning', route('user_assigning'));
});

Breadcrumbs::for('add_user_assigning', function ($trail) {
    $trail->parent('user_assigning');
    $trail->push('Add User Assigning', route('add_user_assigning'));
});

// User Levels
Breadcrumbs::for('user_levels', function ($trail) {
    $trail->parent('home');
    $trail->push('User Levels', route('user_levels'));
});

Breadcrumbs::for('add_user_level', function ($trail) {
    $trail->parent('user_levels');
    $trail->push('Add User Level', route('add_user_level'));
});

// User Roles
Breadcrumbs::for('user_roles', function ($trail) {
    $trail->parent('home');
    $trail->push('User Roles', route('user_roles'));
});

Breadcrumbs::for('add_user_role', function ($trail) {
    $trail->parent('user_roles');
    $trail->push('Add User Role', route('add_user_role'));
});
