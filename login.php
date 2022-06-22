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
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password = sanitize($_POST['password']); // TODO: validate this!

  // compare with data store
  if (Data::authenticate_user($email, $password)) {
    $_SESSION['email'] = $email;
    redirect('members/');
  } else {
    $view_bag['status'] = "The provided crendentials did not work";
  }
  
  if ($email == false) {
    $view_bag['status'] = 'Please enter a valid email address';
  }
}


view('login');