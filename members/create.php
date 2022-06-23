<?php

session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant.xyz',
    'heading' => 'Creation Hub',
    'status' => ''
];

// get the logged in user's full name to be used as the owner
$user_id = $_SESSION['tracker'];
$user_data = Data::get_user($user_id);

if ($user_data == false) {
    view('not_found');
    die();
}

$fn = $user_data->user_fn;
$ln = $user_data->user_ln;
$user_full_name = $fn . ' ' . $ln; // this is the user's full name

// listen for the create_challenge form
if ( isset( $_POST['post_challenge'] ) ){
    // the challenge has been submitted, collect data
    $challenge_title = filter_input(INPUT_POST, 'challenge_title', FILTER_SANITIZE_SPECIAL_CHARS);
    $challenge_category = filter_input(INPUT_POST, 'challenge_category', FILTER_SANITIZE_SPECIAL_CHARS);
    $challenge_description = trim($_POST['challenge_description']);
    $challenge_points = filter_input(INPUT_POST, 'challenge_points', FILTER_VALIDATE_INT);;
    $challenge_soln = trim($_POST['challenge_solution']);
    $challenge_date = date("Y/m/d");
    $challenge_resource_url = '';
    $challenge_hint = filter_input(INPUT_POST, 'challenge_hint', FILTER_SANITIZE_SPECIAL_CHARS);
    $challenge_owner = $user_full_name;

    // handle the file upload and save the resource url
    $filename = $_FILES["challenge_resource"]["name"];
    $tempname = $_FILES["challenge_resource"]["tmp_name"];
    $folder = "./_uploads/" . $filename;
    $challenge_resource_url = $filename;

    if (!empty($challenge_title) && !empty($challenge_title) && !empty($challenge_description) && !empty($challenge_points) && !empty($challenge_soln) && !empty($challenge_hint)){
        try {
            Data::add_challenge($challenge_title, $challenge_category, $challenge_description, $challenge_points, $challenge_soln, $challenge_date, $challenge_resource_url, $challenge_hint, $challenge_owner);
            move_uploaded_file($tempname, $folder);
            $view_bag['status'] = "Challenge created successfully.";
        } catch (PDOException $e){
            $view_bag['status'] = $e;
        }
    } else {
        $view_bag['status'] = 'Kindly ensure you have filled out all the fields.';
    }
}

view('members/create');