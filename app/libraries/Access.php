<?php

    class Access{

        public static function get($path){
            $access = $GLOBALS['access'];
            $path = explode('/', $path);

            foreach ($path as $bit){
                if(isset($access[$bit])){
                    $access = $access[$bit];
                }
            }
            return $access;
        }
    }

  