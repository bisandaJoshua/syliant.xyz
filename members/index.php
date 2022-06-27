<?php

session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant Security',
    'heading' => 'Latest Tutorials'
];

$tutorials = Data::get_tutorials();

view('members/index', $tutorials);