<?php
/**
 * This file renders the congrats page and appears only after a challenge 
 * has been solved.
 */

 // as usual, the session start is required on all pages. 
 // there has to be a better way to do this...
session_start();
require('../app/app_main.php');

// ensure that only logged in users can access this page.
verify_authentication();

// prepare the data_set to be used to display changing info
$data_set = [
    'title' => 'Syliant Security',
    'heading' => 'Congratulations!',
    'status' => 'You solved the challenge!'
];

// render the congrats page.
render_page('members/congrats');