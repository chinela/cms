<?php

    class Event{

        protected $db;

        public function __construct(){
            $this->db = DB::connect();
        }

        public function createEvent($params = []){
            return $this->db->insert('events', $params);
        }

        public function getAllEvents(){
            return $this->db->getAllByOrderAndLimit('events', 'event_date', 'ASC', 6);
        }

        public function fetchOneEvent($id){
            return $this->db->getOne('events', '=', array('event_id' => $id));
        }

        public function deleteEvent($id){
            return $this->db->delete('events', '=', array('event_id' => $id));
        }

        public function attendEvent($params = []){
            return $this->db->insert('event_response', $params);
        }

        public function notAttendEvent($id, $email){
            return $this->db->delete('event_response', '=', array('response_event_id' => $id, 'response_email' => $email));
        }

        public function attendeeCount($id, $result){
            return $this->db->update('events', 'event_id', $id, array('event_attendees' => $result));
        }

        public static function checkUserAttending($id, $email){
            $check = DB::connect()->checkIfExists('event_response', '=', array('response_event_id' => $id, 'response_email' => $email));
            if($check->count()){
                return true;
            }
        }

        public function fetchAllAttendees(){
            return $this->db->getAll('event_response');
        }
    }