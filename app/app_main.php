<?php

/**
 * Application Name: Syliant Security
 * Dev: Joshua Bisaga Bisanda
 * Written in: PHP v 8
 */

 /**
  * Main Application file. This file ties all the necessary 
  * files together and runs them as one.
  */

// constants to be used throughout the application
define('APP_PATH', dirname(__FILE__) . '/../');
define('URL_ROOT', 'http://localhost/syliant.xyz');

// application files required on every page.
require('app_config.php');
require('app_functions.php');
require('data/data.class.php');
require('data/mysqldataprovider.class.php');

// initialize the Mysql Data Provider Class
Data::initialize(new MysqlDataProvider(DB_CONFIG['db']));