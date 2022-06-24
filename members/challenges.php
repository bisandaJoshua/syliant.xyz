<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant Security',
    'heading' => 'Challenge Catalogue',
    'user_mail' => '',
    'status' => ''
];

$challenges = Data::get_challenges();
$user_id = $_SESSION['tracker'];
$user = Data::get_user($user_id);
$view_bag['user_mail'] = $user->user_email;

if ($challenges == false) {
    view('not_found');
    die();
}

view('members/challenges', $challenges);