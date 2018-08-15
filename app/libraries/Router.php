<?php

    class Router{

        private $currentController = 'posts',
                $currentMethod = 'index',
                $params = [];

        public  function __construct(){
            
            $url = $this->getUrl();

            if($url[0] === 'admin'){
                
                unset($url[0]);
                if(file_exists(APPROOT .'/controllers/admin/' . ucwords($url[1]) . '.php')){
                    $this->currentController = ucwords($url[1]);
                    unset($url[1]);
                }

                require_once APPROOT .'/controllers/admin/' . $this->currentController . '.php';
                $this->currentController = new $this->currentController;

                if(isset($url[2])){
                    
                    if(method_exists($this->currentController, $url[2])){
                        $this->currentMethod = $url[2];
                        unset($url[2]);
                    }
                }

                $this->params = $url ? array_values($url) : [];
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
                // dd($url);
            } else {

                if(file_exists(APPROOT .'/controllers/' . ucwords($url[0]) . '.php')){
                    $this->currentController = ucwords($url[0]);
                    unset($url[0]);
                }
                
                require_once APPROOT .'/controllers/' . $this->currentController . '.php';
                $this->currentController = new $this->currentController;

                if(isset($url[1])){
                    
                    if(method_exists($this->currentController, $url[1])){
                        $this->currentMethod = $url[1];
                        unset($url[1]);
                    }
                }

                $this->params = $url ? array_values($url) : [];
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
                // dd($url);
            }
        }

        public function getUrl(){
            $url = Input::get('url');
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return  $url;
        }
    }