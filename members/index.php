<?php

session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant.xyz',
    'heading' => 'Syliant Dashboard'
];

view('members/index', Data::get_posts());