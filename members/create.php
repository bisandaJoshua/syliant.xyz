<?php

session_start();
require('../app/app_main.php');

// ensure that only logged in users can see this page
verify_authentication();

// instantiate the dataset
$data_set = [
    'title' => 'Syliant Security',
    'heading' => 'Creation Hub',
    'status' => ''
];

// get the logged in user's full name to be used as the owner
$user_id = $_SESSION['tracker'];
$user_data = Data::get_user($user_id);



// create the user's full name
$fn = $user_data->user_fn;
$ln = $user_data->user_ln;
$user_full_name = $fn . ' ' . $ln; // this is the user's full name

// listen for the create_challenge form
if ( isset( $_POST['post_challenge'] ) ){
    // the challenge has been submitted, collect data
    $challenge_title = filter_input(INPUT_POST, 'challenge_title', FILTER_SANITIZE_SPECIAL_CHARS);
    $challenge_category = filter_input(INPUT_POST, 'challenge_category', FILTER_SANITIZE_SPECIAL_CHARS);
    $challenge_description = trim($_POST['challenge_description']);
    $challenge_points = filter_input(INPUT_POST, 'challenge_points', FILTER_VALIDATE_INT);
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

    // ensure the fields in the form are not empty
    if (!empty($challenge_title) && !empty($challenge_category) && !empty($challenge_description) && !empty($challenge_points) && !empty($challenge_soln) && !empty($challenge_hint)){
        // attempt to create the challenge and upload the challenge file.
        try {
            Data::add_challenge($challenge_title, $challenge_category, $challenge_description, $challenge_points, $challenge_soln, $challenge_date, $challenge_resource_url, $challenge_hint, $challenge_owner);
            move_uploaded_file($tempname, $folder);
            $data_set['status'] = "Challenge created successfully.";
        } catch (PDOException $e){
            $data_set['status'] = $e;
        }
    } else {
        $data_set['status'] = 'Kindly ensure you have filled out all the fields.';
    }
}

// listen for the create_tutorial form
if ( isset( $_POST['publish_tutorial'] ) ){
    $tutorial_title = filter_input(INPUT_POST, 'tutorial_title', FILTER_SANITIZE_SPECIAL_CHARS);
    $tutorial_category = filter_input(INPUT_POST, 'tutorial_category', FILTER_SANITIZE_SPECIAL_CHARS);
    $tutorial_description = trim($_POST['tutorial_description']);
    $tutorial_owner = $user_full_name;
    $tutorial_resource_url = '';
    $tutorial_date = date("Y/m/d");

    // handle the file upload and save the resource url
    $filename = $_FILES["tutorial_resource_url"]["name"];
    $tempname = $_FILES["tutorial_resource_url"]["tmp_name"];
    $folder = "./_uploads/" . $filename;
    $tutorial_resource_url = $filename;

    if ( !empty( $tutorial_title ) && !empty($tutorial_category) && !empty($tutorial_description) ){
        // add the tutorial and upload the PDF
        try {
            Data::add_tutorial($tutorial_title, $tutorial_category, $tutorial_description, $tutorial_owner, $tutorial_resource_url, $tutorial_date);
            move_uploaded_file($tempname, $folder);
            $data_set['status'] = "Tutorial created successfully.";
        } catch (PDOException $e){
            $data_set['status'] = $e;
        }
    }
}

render_page('members/create');