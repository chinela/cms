<?php

    class User{

        private $db,
                $data,
                $isLoggedIn = false;

        public function __construct($user = null){
            $this->db = DB::connect();

            if(!$user){

                if(Session::exists('loggedInUser')){
                    $user = Session::get('loggedInUser');

                    if($this->find($user)){
                        $this->isLoggedIn = true;
                    }
                }
            } else {
                $this->find($user);
            }
        }

        public function addUser($params = []){
            return $this->db->insert('users', $params);
        }

        public function createAccount($params = []){
            return $this->db->insert('users', $params);
        }

        public function editUser($id, $params = []){
            return $this->db->update('users', 'user_key', $id, $params);
        }

        public function getAllUsersByOrder(){
            return $this->db->getAllByOrder('users', 'user_role', 'asc');
        }

        public function find($user){
            $check = (is_numeric($user)) ? 'user_key' : 'user_email';
            $check = $this->db->checkIfExists('users', '=', array($check => $user));

            if($check->count()){
                $this->data = $check->singleResult();
                return $this;
            }
        }

        public function login($user, $password){
            if($this->find($user)){
                if(password_verify($password, $this->data()->user_password)){
                    Session::store('loggedInUser', $this->data()->user_key);
                    return $this;
                }
            }
        }

        public function isAdmin(){
            if(Session::exists('loggedInUser')){
                $check = $this->db->getOne('users', '=', array('user_key' => Session::get('loggedInUser')));

                if($check->user_role === 'administrator'){
                    return true;
                }
            }
        }
        
        public function data(){
            return $this->data;
        }
        
        public function isLoggedIn(){
            return $this->isLoggedIn;
        }

        public function delete($id){
            return $this->db->delete('users', '=', array('user_id' => $id));
        }

        public function ban($id){
            return $this->db->update('users', 'user_id', $id, array('user_active' => 'not active'));
        }

        public function activate($id){
            return $this->db->update('users', 'user_id', $id, array('user_active' => 'Active'));
        }
    }