<?php

/**
 * This is the controller for the landing page. 
 * This app has been built with data abstraction in mind.
 */

require('app/app.php');

$view_bag = [
    'title' => 'Syliant Security',
    'heading' => 'Get Started With Syliant'
];

view('index');