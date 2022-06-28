<?php

session_start();
require('../app/app_main.php');

// validate logged in user
verify_authentication();

$data_set = [
    'title' => 'Syliant Security',
    'heading' => 'Latest Tutorials'
];

// fetch all the tutorials from the db
$tutorials = Data::get_tutorials();

// render the tutorials page with the tutorials grabbed from the db
render_page('members/index', $tutorials);