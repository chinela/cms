<?php

    class Comment{

        private $db;

        public function __construct(){
            $this->db = DB::connect();
        }

        public function addComment($params = []){
            return $this->db->insert('comments', $params);
        }

        public function getAllCommentsByOrder($id){
            $this->db->selectByOrder('comments', 'comment_date', 'DESC', array('comment_post_id' => $id));
            return $this->db->results();
        }

        public function likeComment($user, $id, $comment_id){
            return $this->db->insert('user_activities', array('activity_user' => $user , 'activity_post_id' => $id, 'activity_comment_id' => $comment_id));
        }

        public function fetchOneComment($id){
            return $this->db->getOne('comments', '=', array('comment_id' => $id));
        }

        public function likeCount($id, $result){
            return $this->db->update('comments', 'comment_id', $id, array('comment_likes' => $result));
        }

        public static function checkLikes($id, $username){
            $check = DB::connect()->checkIfExists('user_activities', '=', array('activity_comment_id' => $id, 'activity_user' => $username));
            if($check->count()){
                return true;
            }
        }

        public function fetchAllLikes(){
            return $this->db->getAll('user_activities');
        }

        public function dislikeComment($id, $username){
            return $this->db->delete('user_activities', '=', array('activity_comment_id' => $id, 'activity_user' => $username));
        }
    }