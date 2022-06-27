<?php
session_start();
require('app/app.php');

// ensure logged in members cant access this page.
if (is_user_authenticated()) {
    redirect('members/'); //redirect them to the members section.
}

$view_bag = [
    'title' => 'Syliant Security',
    'heading' => 'Member Registration',
    'status' => ''
];


if (is_post()) {
    $fn = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
    $ln = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_SPECIAL_CHARS);
    $acc_type = "student";
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $school = filter_input(INPUT_POST, 'school', FILTER_SANITIZE_SPECIAL_CHARS);
    $points = 0;
    $password = sha1(sanitize($_POST['password'])); // TODO: validate this!
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);

  // register
    if (!empty($fn) && !empty($ln) && !empty($bio) && !empty($school) && !empty($password) && !empty($country)){
        Data::register_user($fn, $ln, $bio, $email, $acc_type, $school, $points, $password, $country);
        redirect('login.php');
        $view_bag['status'] = "Registration Successful";
    } else {
        $view_bag['status'] = 'Kindly ensure you have filled out all the fields.';
    }
  
    if ($email == false) {
        $view_bag['status'] = 'Please enter a valid email address.';
    }
}


view('register');