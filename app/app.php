<?php


define('APP_PATH', dirname(__FILE__) . '/../');
define('URL_ROOT', 'http://localhost/syliant.xyz');

require('config.php');
require('functions.php');
require('data/data.class.php');
require('data/mysqldataprovider.class.php');


Data::initialize(new MysqlDataProvider(CONFIG['db']));