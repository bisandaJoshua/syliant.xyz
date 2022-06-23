<?php

session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant.xyz',
    'heading' => 'User Profile'
];

$user_id = $_SESSION['tracker'];
$user_data = Data::get_user($user_id);

if ($user_data == false) {
    view('not_found');
    die();
}

view('members/profile', $user_data);