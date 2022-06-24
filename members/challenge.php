<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant.xyz',
    'heading' => '',
    'status' => ''
];

$chid = '';

// get the challenge id that was passes through the GET method
if ( isset($_GET['chid']) ){
    $chid = filter_input(INPUT_GET, 'chid', FILTER_VALIDATE_INT);
} else {
    redirect('challenges.php');
}

$challenge = Data::get_challenge($chid);

if ($challenge == false) {
    view('not_found');
    die();
}

$view_bag['heading'] = $challenge->challenge_title;

view('members/challenge', $challenge);