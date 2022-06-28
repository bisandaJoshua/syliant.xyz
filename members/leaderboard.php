<?php

session_start();
require('../app/app_main.php');

// ensure that only logged in users can see this page
verify_authentication();

// instatiate the dataset
$data_set = [
    'title' => 'Syliant Security',
    'heading' => 'Student Leaderboard'
];

$students = Data::get_students_acc_points(); // fetch all the students by their points

render_page('members/leaderboard', $students);