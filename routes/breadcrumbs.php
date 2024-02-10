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

// Home > All Students > edit Student
Breadcrumbs::for('student_edit', function ($trail) {

    $trail->parent('home');
    $trail->push('All Students', route('students'));
    $trail->push('Edit Student');
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
    $trail->parent('grades');
    $trail->push('Add Grade', route('add_grade'));
});

// Classes
Breadcrumbs::for('classes', function ($trail) {
    $trail->parent('home');
    $trail->push('All Classes', route('classes'));
});
Breadcrumbs::for('addclass', function ($trail) {
    $trail->parent('classes');
    $trail->push('Add Class', route('add_class'));
});

// Extracurriculars
Breadcrumbs::for('extracurriculars', function ($trail) {
    $trail->parent('home');
    $trail->push('All Extracurriculars', route('extracurriculars'));
});
Breadcrumbs::for('addextracurricular', function ($trail) {
    $trail->parent('extracurriculars');
    $trail->push('Add Extracurricular', route('add_extracurricular'));
});

// YearGradeClass
Breadcrumbs::for('year_grade_class', function ($trail) {
    $trail->parent('home');
    $trail->push('All Relationships', route('year_grade_class'));
});
Breadcrumbs::for('add_year_grade_class', function ($trail) {
    $trail->parent('year_grade_class');
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

// Enrollments
Breadcrumbs::for('enrollments', function ($trail) {
    $trail->parent('home');
    $trail->push('Enrollments', route('enrollments'));
});

Breadcrumbs::for('add_enrollment', function ($trail) {
    $trail->parent('enrollments');
    $trail->push('Add Enrollment', route('add_enrollment'));
});

Breadcrumbs::for('single_enrollment', function ($trail) {
    $trail->parent('enrollments');
    $trail->push('Single Enrollment', route('single_enrollment'));
});

// Admission Fee Routs
Breadcrumbs::for('admission_fee', function ($trail) {
    $trail->parent('home');
    $trail->push('Admission Fee', route('admission_fee'));
});

Breadcrumbs::for('add_admission_fee', function ($trail) {
    $trail->parent('admission_fee');
    $trail->push('Add Admission Fee', route('add_admission_fee'));
});

// Monthly Fee Routs
Breadcrumbs::for('monthly_fee', function ($trail) {
    $trail->parent('home');
    $trail->push('Monthly Fee', route('monthly_fee'));
});

Breadcrumbs::for('add_monthly_fee', function ($trail) {
    $trail->parent('monthly_fee');
    $trail->push('Add Monthly Fee', route('add_monthly_fee'));
});

// Surcharge Formula
Breadcrumbs::for('surcharge_formula', function ($trail) {
    $trail->parent('home');
    $trail->push('Surcharge Formula', route('surcharge_formula'));
});

Breadcrumbs::for('add_surcharge_formula', function ($trail) {
    $trail->parent('surcharge_formula');
    $trail->push('Add Surcharge Formula', route('add_surcharge_formula'));
});
// Student Transactions 
Breadcrumbs::for('student_payments', function ($trail) {
    $trail->parent('home');
    $trail->push('Student Transactions', route('student_payments'));
});

Breadcrumbs::for('add_student_payment_get_invoices', function ($trail) {
    $trail->parent('student_payments');
    $trail->push('Add Student Transaction', route('add_student_payment'));
});
Breadcrumbs::for('student_payments_submit_invoices', function ($trail) {
    $trail->parent('student_payments');
    $trail->push('Add Student Transaction', route('add_student_payment'));
});
Breadcrumbs::for('add_student_payment', function ($trail) {
    $trail->parent('student_payments');
    $trail->push('Add Student Transaction', route('add_student_payment'));
});

Breadcrumbs::for('student_payments_search', function ($trail) {
    $trail->parent('student_payments');
    $trail->push('Add Student Transaction', route('add_student_payment'));
});

// Student Transactions 
Breadcrumbs::for('account_payable', function ($trail) {
    $trail->parent('home');
    $trail->push('Account Payable', route('account_payable'));
});
Breadcrumbs::for('account_payable_search', function ($trail) {
    $trail->parent('home');
    $trail->push('Account Payable', route('account_payable'));
});

Breadcrumbs::for('invoices', function ($trail) {
    $trail->parent('home');
    $trail->push('Invoices', route('invoices'));
});

Breadcrumbs::for('invoices_search', function ($trail) {
    $trail->parent('home');
    $trail->push('Invoices', route('invoices'));
});

Breadcrumbs::for('invoices_view', function ($trail, $invoiceId) {
    $trail->parent('home');
    $trail->push('Invoices', route('invoices'));
    $trail->push('Invoices View', route('invoices_view', $invoiceId));
});
