<?php

session_start();
require('../app/app_main.php');

// ensure only logged in users can see this page
verify_authentication();

$data_set = [
    'title' => 'Syliant Security',
    'heading' => 'User Profile'
];

$user_id = $_SESSION['tracker'];
$user_data = Data::get_user($user_id);

if ($user_data == false) {
    render_page('not_found');
    die();
}

render_page('members/profile', $user_data);