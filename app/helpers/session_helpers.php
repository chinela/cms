<?php

function checkAndFlash($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name)){
        if(!empty($message) && empty(Session::get($name))){
            if((Session::exists($name))){
                Session::delete($name);
            }

            if(Session::exists($name.'_class')){
                Session::delete($name.'_class');
            }

            Session::store($name, $message);
            Session::store($name. '_class', $class);
            
        } elseif(empty($message) && Session::exists($name)){
            $class = Session::exists($name,'_class') ? Session::get($name.'_class') : '';
            echo '<div class="'.$class.'" id="msg-flash">'.Session::get($name).'</div>';
            Session::delete($name);
            Session::delete($name.'_class');
        }
    }
}
?>
