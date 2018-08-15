<?php

    class Redirect{

        public static function to($location){
            if(is_numeric($location)){
                switch($location){
                    case '404':
                        header('HTTP:/1.0 404 Not Found');
                        include APPROOT . '/views/error.php';
                        exit();
                    break;
                }
            } else {
                header('location: ' . URLROOT .$location);
            }
        }
    };