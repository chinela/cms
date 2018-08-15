<?php

    class Hash{

        private static $random;
        public static function make($string){
            return password_hash($string, PASSWORD_BCRYPT, array('cost'=>12));
        }

        public static function unique_key(){
            self::$random = mt_rand(0, 9);
            for ($i = 0; $i < 10; $i++){
                self::$random .= mt_rand(0,9);
                self::$random .= mt_rand(0,7);
                self::$random .= mt_rand(1,9);
                self::$random .= mt_rand(0,8);
            }
            return self::$random;
        }
    }

