<?php

session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant Security'
];

$tut_id = '';

if (is_get()) {
    $tut_id = filter_input(INPUT_GET, 'tut_id', FILTER_VALIDATE_INT);

    if (empty($tut_id) || $tut_id < 1) {
        // if the challenge id is not present, show a 404
        view('not_found');
        die();
    }

    $tutorial = Data::get_tutorial($tut_id); // grab the whole challenge from the db

    if ($tutorial === false) {
        // if the challenge does not exist in the db, show a 404
        view('not_found');
        die();
    }

    // TODO: run some checks to make sure someone cant just type the url for a challenge
    // and earn extra points

    view('members/tutorial', $tutorial);
}