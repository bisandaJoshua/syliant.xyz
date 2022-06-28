<?php


define('APP_PATH', dirname(__FILE__) . '/../');
define('URL_ROOT', 'http://localhost/syliant.xyz');

require('app_config.php');
require('app_functions.php');
require('data/data.class.php');
require('data/mysqldataprovider.class.php');


Data::initialize(new MysqlDataProvider(DB_CONFIG['db']));