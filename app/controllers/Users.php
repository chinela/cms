<?php

    class Users extends Controller{

        public function __construct(){
            $this->userModel = $this->model('user');
            $this->categoryModel = $this->model('category');

        }

        public function index(){
            Redirect::to('');
        }

        public function login(){
            if(Input::exists()){
                $validate = new Validate();

                $validate->check($_POST, array(
                    'email' => array(
                        'required' => true,
                        'filter' => FILTER_VALIDATE_EMAIL,
                        'not_user' => array('users', 'user_email')
                    ),
                    'password' => array(
                        'required' => true
                    )
                ));

                if($validate->passed()){

                    $login = $this->userModel->login(sanitize(Input::get('email')), sanitize(Input::get('password')));

                    if($login){
                        if($this->userModel->isAdmin()){
                            Redirect::to('admin/dashboard');
                        } else {
                            Redirect::to('');
                        }
                    } else {
                        checkAndFlash('login_err', 'Invalid email or password', 'alert alert-danger');
                        Redirect::to('users/login');
                    }

                } else {
                    $data = [
                        'email_err' => $validate->displayValidationError('email'),
                        'password_err' => $validate->displayValidationError('password')
                    ];

                    $this->view('users/login', $data);
                }
            } else {
                $data = [
                    'email_err' => '',
                    'password_err' => ''
                ];
                $this->view('users/login', $data);
            }
        }

        public function register(){
            if(Input::exists()){

                $validate = new Validate();

                $validate->check($_POST, array(
                    'name' => array(
                        'required' => true,
                        'preg' => '/^[a-zA-Z ]*$/'
                    ),
                    'email' => array(
                        'required' => true,
                        'filter' => FILTER_VALIDATE_EMAIL,
                        'unique' => array('users', 'user_email'),
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
                    
                    $create_account = $this->userModel->addUser(array(
                        'user_name' => strtolower(sanitize(Input::get('name'))),
                        'user_email' => strtolower(sanitize(Input::get('email'))),
                        'user_password' => Hash::make(sanitize(Input::get('password'))),
                        'user_key' => sanitize(Hash::unique_key()),
                    ));
                    
                    if($create_account){
                        checkAndFlash('account_created', 'Your registration was successful, login here');
                        Session::flash('reg_email', strtolower(sanitize(Input::get('email'))));
                        Redirect::to('users/login');
                    }
                } else {

                    $data = [
                        'name_err' => $validate->displayValidationError('name'),
                        'password_err' => $validate->displayValidationError('password'),
                        'email_err' => $validate->displayValidationError('email'),
                        'confirm_err' => $validate->displayValidationError('confirm'),
                    ];
                    
                    $this->view('users/register', $data);
                }

            } else {
                $data = [
                    'name_err' => '',
                    'password_err' => '',
                    'email_err' => '',
                    'confirm_err' => ''
                ];
                
                $this->view('users/register', $data);
            }
        }

        public function account(){
            
            if(!$this->userModel->isLoggedIn()){
                Redirect::to('users/login');
            } else if($this->userModel->isAdmin()){
                Redirect::to('admin/dashboard');
            }
            $fetch_categories = $this->categoryModel->getAllCategoriesByOrder();
            $fetch_user = $this->userModel->data();

            $data = [
                'categories' => $fetch_categories,
                'name_err' => '',
                'user' => $fetch_user,
                'edit' => ''
            ];
            
            $this->view('users/account', $data);
        }

        public function edit_profile($id){
            if($id !== $this->userModel->data()->user_key){
                Redirect::to('users/account');
            }
            if(Input::exists()){
                $upload = new Upload('image');
                $fetch_user = $this->userModel->data();

                if($upload->checkEmptyFileName() && empty(Input::get('password'))){
                    checkAndFlash('upload_alert', 'Error updating profile', 'alert alert-danger');
                    Redirect::to('users/edit_profile/'.($id));
                } else if ($upload->checkEmptyFileName() && !empty(Input::get('password'))){
                    $validate = new Validate();
                    $validate->check($_POST, array(
                        'password' => array(
                            'required' => true,
                            'min' => 4
                        )
                    ));

                    if($validate->passed()){
                        $edit_profile = $this->userModel->editUser($id, array(
                            'user_password' => Hash::make(Input::get('password')),
                            'user_image' => $fetch_user->user_image
                        ));

                        if($edit_profile){
                            checkAndFlash('upload_alert', 'Success...profiile changed!!!');
                            Redirect::to('users/edit_profile/'.($id));
                        }
                    } else {
                        checkAndFlash('upload_alert', $validate->displayValidationError('password'), 'alert alert-danger');
                        Redirect::to('users/edit_profile/'.($id));
                    }
                } else if(!$upload->checkEmptyFileName() and empty(Input::get('password'))){
                    $upload->startUpload();
                    $edit_profile = $this->userModel->editUser($id, array(
                        'user_password' => $fetch_user->user_password,
                        'user_image' => $upload::fileNewName()
                    ));

                    if($edit_profile){
                        checkAndFlash('upload_alert', 'Success...profiile changed!!!');
                        Redirect::to('users/edit_profile/'.($id));
                    }
                } else if(!$upload->checkEmptyFileName() and !empty(Input::get('password'))){
                    $upload->startUpload();
                    $edit_profile = $this->userModel->editUser($id, array(
                        'user_password' => Hash::make(Input::get('password')),
                        'user_image' => $upload::fileNewName()
                    ));

                    if($edit_profile){
                        checkAndFlash('upload_alert', 'Success...profiile changed!!!');
                        Redirect::to('users/edit_profile/'.($id));
                    }
                }
            } else {
                if(!$this->userModel->isLoggedIn()){
                    Redirect::to('users/login');
                } else if($this->userModel->isAdmin()){
                    Redirect::to('admin/dashboard');
                }

                $fetch_categories = $this->categoryModel->getAllCategoriesByOrder();
                $fetch_user = $this->userModel->data();

                $data = [
                    'categories' => $fetch_categories,
                    'password_err' => '',
                    'image_err' => '',
                    'user' => $fetch_user,
                    'edit' => $id
                ];
                
                $this->view('users/account', $data);
            }
        }

        public function logout(){
            Session::delete('loggedInUser');
            Redirect::to('');
        }

        
    }