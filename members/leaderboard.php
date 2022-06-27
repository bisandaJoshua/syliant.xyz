<?php

session_start();
require('../app/app.php');

// validate logged in user
ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant Security',
    'heading' => 'Student Leaderboard'
];

$students = Data::get_students_acc_points(); // fetch all the students by their points

view('members/leaderboard', $students);