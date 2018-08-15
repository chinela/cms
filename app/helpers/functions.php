<?php

function dd($value){
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}


function sanitize($string){
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

define('w', 'WORKING');
define('f', 'FAILED');
define('vp', 'VALIDATE PASSED');
define('vf', 'VALIDATE FAILED');