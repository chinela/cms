<?php

    class Events extends Controller{

        public function __construct(){
            $this->eventModel = $this->model('event');
            $this->categoryModel = $this->model('category');
            $this->userModel = $this->model('user');
        }

        public function index(){
            $fetch_events = $this->eventModel->getAllEvents();
            $fetch_categories = $this->categoryModel->getAllCategoriesByOrder();
            $fetch_attendees = $this->eventModel->fetchAllAttendees();            

            if($this->userModel->isLoggedIn()){
                $data = [
                    'events' => $fetch_events,
                    'categories' => $fetch_categories,
                    'name_err' => '',
                    'password_err' => '',
                    'email_err' => '',
                    'attendees' => $this->userModel->data()->user_email
                ];
                $this->view('events/index', $data);
            } else {
                $data = [
                    'events' => $fetch_events,
                    'categories' => $fetch_categories,
                    'name_err' => '',
                    'password_err' => '',
                    'email_err' => '',
                    'attendees' => ''
                ];
                $this->view('events/index', $data);
            }
        }

        public function attending($id){
            $add_attendee = $this->eventModel->attendEvent(array(
                'response_email' => $this->userModel->data()->user_email,
                'response_event_id' => $id
            ));

            if($add_attendee){
                $fetch_event = $this->eventModel->fetchOneEvent($id);
                $result = $fetch_event->event_attendees + 1;
                $this->eventModel->attendeeCount($id, $result);
            }

            
            Redirect::to('events');
        }

        public function not_attending($id){
            $remove_attendee = $this->eventModel->notAttendEvent($id, $this->userModel->data()->user_email);

            if($remove_attendee){
                $fetch_event = $this->eventModel->fetchOneEvent($id);
                $result = $fetch_event->event_attendees - 1;
                $this->eventModel->attendeeCount($id, $result);
            }
            Redirect::to('events');
        }
    }