<?php

session_start();
require('../app/app.php');

ensure_user_is_authenticated();

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