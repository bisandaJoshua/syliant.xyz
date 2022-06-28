<?php

session_start();
require('../app/app.php');

// validate logged in user
ensure_user_is_authenticated();

$data_set = [
    'title' => 'Syliant Security',
    'heading' => 'Latest Tutorials'
];

// fetch all the tutorials from the db
$tutorials = Data::get_tutorials();

// render the tutorials page with the tutorials grabbed from the db
render_page('members/index', $tutorials);