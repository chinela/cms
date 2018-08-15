<?php

    class Events extends Controller{

        public function __construct(){
            $this->eventModel = $this->model('event');
            $this->userModel = $this->model('user');
            $this->eventModel = $this->model('event');
            if(!$this->userModel->isAdmin()){
                Redirect::to('users/account');
            }
        }

        public function index(){
            Redirect::to('admin/dashboard');
        }

        public function delete($id){
            $this->eventModel->deleteEvent($id);
            checkAndFlash('event_deleted', "The event was deleted", "alert alert-danger");
            Redirect::to('admin/dashboard');
        }

        public function show($id){
            
        }
    }