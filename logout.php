<?php
/**
 * This file is responsible for logging people out. 
 * It unsets all session variables and destroys them then redirects users to login.php
 */

session_start();
session_unset();
session_destroy();

// this file is required in order to run the application.
require('app/app.php');

// send people back to the login page after clearing the sessions.
redirect_user('login.php');