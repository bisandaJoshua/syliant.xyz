<?php

session_start();
require('../app/app_main.php');

// make sure only logged in users can access this page
verify_authentication();

$data_set = [
    'title' => 'Syliant Security'
];

// instantiate the tutorial ID
$tut_id = '';

if (is_get()) {
    $tut_id = filter_input(INPUT_GET, 'tut_id', FILTER_VALIDATE_INT);

    if (empty($tut_id) || $tut_id < 1) {
        // if the tutorial id is not present, show a 404
        render_page('not_found');
        die();
    }

    $tutorial = Data::get_tutorial($tut_id); // grab the whole tutorial from the db

    if ($tutorial === false) {
        // if the tutorial does not exist in the db, show a 404
        render_page('not_found');
        die();
    }



    // render the tutorial page passing the tutorial as a variable
    render_page('members/tutorial', $tutorial);
}