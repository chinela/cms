<?php 

session_start();

spl_autoload_register(function($classes){
    require_once 'libraries/' . $classes . '.php';
});

require_once 'config/config.php';

require_once 'helpers/session_helpers.php';

require_once 'helpers/functions.php';