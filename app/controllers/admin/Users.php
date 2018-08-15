<?php

    class Users extends Controller{

        public function __construct(){
            $this->userModel = $this->model('user');
            $this->userModel = $this->model('user');
            $this->eventModel = $this->model('event');
            if(!$this->userModel->isAdmin()){
                Redirect::to('users/account');
            }
        }

        public function index(){
            $fetch_users = $this->userModel->getAllUsersByOrder();

            $data = [
                'users' => $fetch_users
            ];
            $this->view('admin/users', $data);
        }

        public function add(){
            if(Input::exists()){

                $validate = new Validate();
                $validate->check($_POST, array(
                    'name' => array(
                        'required' => true,
                        'preg' => '/^[a-zA-Z ]*$/'
                    ),
                    'email' => array(
                        'required' => true,
                        'unique' => array('users', 'user_email'),
                        'filter' => FILTER_VALIDATE_EMAIL
                    ),
                    'password' => array(
                        'required' => true,
                        'min' => 4
                    ),
                    'confirm' => array(
                        'required' => true,
                        'matches' => 'password'
                    )
                ));

                if($validate->passed()){
                    $upload = new Upload('image');
                    $upload->startUpload();

                    if($upload->checkEmptyFileName()){
                        // insert into database without the image column
                        $create_account = $this->userModel->addUser(array(
                            'user_name' => strtolower(sanitize(Input::get('name'))),
                            'user_email' => strtolower(sanitize(Input::get('email'))),
                            'user_password' => Hash::make(sanitize(Input::get('password'))),
                            'user_key' => sanitize(Hash::unique_key()),
                            'user_role' => sanitize(Input::get('role'))
                        ));
                        
                        if($create_account){
                            checkAndFlash('user_added', 'A new user has been added');
                            Redirect::to('admin/users/add');
                        }
                    } else {
                        if($upload->passed()){

                            $create_account = $this->userModel->createAccount(array(
                                'user_name' => strtolower(sanitize(Input::get('name'))),
                                'user_email' => strtolower(sanitize(Input::get('email'))),
                                'user_password' => Hash::make(sanitize(Input::get('password'))),
                                'user_key' => sanitize(Hash::unique_key()),
                                'user_role' => sanitize(Input::get('role')),
                                'user_image' => sanitize(Upload::fileNewName())
                            ));

                            if($create_account){
                                checkAndFlash('user_added', 'A new user has been added');
                                Redirect::to('admin/users/add');
                            }
                        } else {
                            $data = [
                                'name_err' => '',
                                'email_err' => '',
                                'confirm_err' => '',
                                'password_err' => '',
                                'image_err' => $upload->displayError()
                            ];
        
                            $this->view('admin/users_add', $data);
                        }
                    }

                } else {
                    $data = [
                        'name_err' => $validate->displayValidationError('name'),
                        'email_err' => $validate->displayValidationError('email'),
                        'confirm_err' => $validate->displayValidationError('confirm'),
                        'password_err' => $validate->displayValidationError('password'),
                        'image_err' => ''
                    ];

                    $this->view('admin/users_add', $data);
                }
            } else {
                $data = [
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_err' => '',
                    'image_err' => ''
                ];
                $this->view('admin/users_add', $data);
            }
        }

        public function delete($id){
            $this->userModel->delete($id);
            Redirect::to('admin/users');
        }

        public function ban($id){
            $this->userModel->ban($id);
            Redirect::to('admin/users');
        }

        public function activate($id){
            $this->userModel->activate($id);
            Redirect::to('admin/users');
        }
    }