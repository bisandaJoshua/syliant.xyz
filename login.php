<?php
session_start();
require('app/app.php');

// ensure logged in members cant access this page.
if (is_user_authenticated()) {
    redirect('members/'); //redirect them to the members section.
}

$view_bag = [
    'title' => 'Syliant.xyz',
    'heading' => 'Syliant Login',
    'status' => ''
];


if (is_post()) {
  // when the form is submitted, grab the credentials sent.
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password = sha1(sanitize($_POST['password']));

  // use the authenticate_user method to log the user in.
  if (Data::authenticate_user($email, $password)) {
    $results = Data::authenticate_user($email, $password);
    $account_type = $results->user_account_type;
    $_SESSION['logged_in_user'] = sha1($email);
    $_SESSION['account_type'] = $account_type;
    redirect('members/index.php');
  } else {
    $view_bag['status'] = "The provided crendentials did not work.";
  }
  
  if ($email == false) {
    $view_bag['status'] = 'Please enter a valid email address.';
  }
}


view('login');