<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant.xyz',
    'heading' => 'Congratulations!',
    'status' => 'You solved the challenge!'
];

view('members/congrats');