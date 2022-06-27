<?php

session_start();
require('../app/app.php');

// validate logged in user
ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant Security',
    'heading' => 'Latest Tutorials'
];

$tutorials = Data::get_tutorials(); // fetch all the tutorials from the db

view('members/index', $tutorials);