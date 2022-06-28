<?php
/*
* This file renders the registration form and handles user registration.
* In other words, it adds new users to our database.
*/

// always run session_start to start sessions, this allows us to check for existing
// sessions and ensure logged in and non-logged in users access the right pages.
session_start();

// grab the app.php file as it is the heart of the application and has the necessary calls
// to all the needed functions in the application.
require('app/app.php');

// ensure logged in members cant access this page.
if (is_user_authenticated()) {
    redirect_user('members/'); //redirect them to the members section.
}

// prepare the view_bag array as it carries variables you would want to display on the
// page that can't be pulled in from the database.
$data_set = [
    'title' => 'Syliant Security',
    'heading' => 'Member Registration',
    'status' => ''
];

// listen for a post request, then add the new user to the database. 
// TODO: we need to add functionality to check that existing users do not register again.
if (is_post()) {
    $fn = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
    $ln = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_SPECIAL_CHARS);
    $acc_type = "student"; // default account type for all users. 
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $school = filter_input(INPUT_POST, 'school', FILTER_SANITIZE_SPECIAL_CHARS);
    $points = 0;
    // TODO: improve encryption algo being used.
    // temporarily using sha1. It is at least better than md5.
    $password = sha1(sanitize($_POST['password']));
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);

  // register
  // make sure the necessary fields in the form are not empty. 
    if (!empty($fn) && !empty($ln) && !empty($bio) && !empty($school) && !empty($password) && !empty($country)){
        // regiter the user
        Data::register_user($fn, $ln, $bio, $email, $acc_type, $school, $points, $password, $country);
        // redirect the user back to the login page.
        redirect_user('login.php?reg=1');
    } else {
        // show this error message if the user leaves some fields empty.
        $data_set['status'] = 'Kindly ensure you have filled out all the fields.';
    }
  
    // ensure the user enters a valid email
    if ($email == false) {
        $data_set['status'] = 'Please enter a valid email address.';
    }
}

// render the register page with the help of the view function from functions.php
render_page('register');