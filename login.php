<?php
/**
 * This is the login file, resposible for doing user verification and authentication.
 */

 // always start a a session to ensure logged in users cant see this page.
session_start();
require('app/app.php');

// ensure logged in members cant access this page.
if (is_user_authenticated()) {
    redirect_user('members/'); //redirect them to the members section.
}

$data_set = [
    'title' => 'Syliant Security',
    'heading' => 'Syliant Login',
    'status' => '',
	'reg' => ''
];

// listen for incoming get requests that are specific to registration
if (isset($_GET['reg'])){
	// make sure the reg parameter is set, is not empty, and is 1. 
	// if it is empty or unset, a user might be playing with it in the url.
	if (!empty($_GET['reg']) && $_GET['reg'] == 1){
		$data_set['reg'] = 'Registration successful. You may now login.'; 
	} else {
		render_page('not_found');
		die();
	}
}

if (is_post()) {
  // when the form is submitted, grab the credentials sent.
  // make sure the email is a valid email address
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  // use sha1 to encrypt the password given (for now)
  $password = sha1(sanitize($_POST['password']));

  // use the authenticate_user method to log the user in.
  if (Data::authenticate_user($email, $password)) {
    $results = Data::authenticate_user($email, $password);
    $account_type = $results->user_account_type;
    $user_id = $results->user_id;
    $_SESSION['logged_in_user'] = sha1($email);
    $_SESSION['account_type'] = $account_type;
    $_SESSION['tracker'] = $user_id; //this will be used to track the user across the site
    redirect_user('members/index.php');
  } else {
    $data_set['status'] = "Invalid user email or password, try again.";
  }
  
  if ($email == false) {
    $data_set['status'] = 'Please enter a valid email address.';
  }
}

// render the login view page.
render_page('login');