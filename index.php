<?php

/**
 * This is the controller for the landing page. 
 * This app has been built with data abstraction in mind.
 */

require('app/app_main.php');

$data_set = [
    'title' => 'Syliant Security',
    'heading' => 'Get Started With Syliant'
];

// render the index view 
render_page('index');