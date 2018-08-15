<?php

define('APPROOT', dirname(dirname(__FILE__)));

define('URLROOT', 'http://localhost/project/');

define('SITENAME', 'PROJECT ON PHP');

$GLOBALS['access'] = array(
    'mysql' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'project'
    ]
);

