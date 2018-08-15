<?php

    class Comments extends Controller{

        public function __construct(){
            $this->commentModel = $this->model('comment');
            $this->userModel = $this->model('user');
            $this->eventModel = $this->model('event');
            if(!$this->userModel->isAdmin()){
                Redirect::to('users/account');
            }
        }

        public function index(){
            if(Input::exists()){

            }  else {
                $data = [
                    'comments' => ''
                ];

                $this->view('admin/comments', $data);
            }
        }

    }