<?php

    class Dashboard extends Controller{

        public function __construct(){
            $this->userModel = $this->model('user');
            $this->eventModel = $this->model('event');
            if(!$this->userModel->isAdmin()){
                Redirect::to('users/account');
            }
        }

        public function index(){
            if(Input::exists()){
                
                $validate = new Validate();
                $validate->check($_POST, array(
                    'name' => array(
                        'required' => true
                    ),
                    'content' => array(
                        'required' => true
                    ),
                    'location' => array(
                        'required' => true
                    ),
                    'date' => array(
                        'required' => true
                    )
                ));

                if($validate->passed()){
                    $upload = new Upload('image');
                    $upload->startUpload();
                    if($upload->passed()){
                        
                        $create_event = $this->eventModel->createEvent( array(
                            'event_title' => strtolower(sanitize(Input::get('name'))),
                            'event_created_by'=> 'Admin',
                            'event_content' => sanitize(Input::get('content')),
                            'event_location' => sanitize(Input::get('location')),
                            'event_date' => sanitize(Input::get('date')),
                            'event_image' => $upload::fileNewName()
                        ));
                        
                        if($create_event){
                            checkAndFlash('event_created', "The event was created successfully");
                            Redirect::to('admin/dashboard');
                        }

                    } else {
                        $data = [
                            'image_err' => $upload->displayError(),
                            'name_err' => '',
                            'content_err' => '',
                            'location_err' => '',
                            'date_err' => '',
                        ];

                        $this->view('admin/index', $data);
                    }
                } else {
                    $fetch_events = $this->eventModel->getAllEvents();

                    $data = [
                        'name_err' => $validate->displayValidationError('name'),
                        'location_err' => $validate->displayValidationError('location'),
                        'date_err' => $validate->displayValidationError('date'),
                        'content_err' => $validate->displayValidationError('content'),
                        'image_err' => 'Field cannot be empty',
                        'events' => $fetch_events
                    ];

                    $this->view('admin/index', $data);
                }
            } else {

                $fetch_events = $this->eventModel->getAllEvents();

                $data = [
                    'name_err' => '',
                    'content_err' => '',
                    'location_err' => '',
                    'date_err' => '',
                    'image_err' => '',
                    'events' => $fetch_events
                ];
                $this->view('admin/index', $data);
            }
        }
    }