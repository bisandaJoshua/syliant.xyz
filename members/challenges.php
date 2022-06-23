<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant.xyz',
    'heading' => 'Cyber Security Challenges',
    'status' => ''
];

$challenges = Data::get_challenges();

if ($challenges == false) {
    view('not_found');
    die();
}

view('members/challenges', $challenges);