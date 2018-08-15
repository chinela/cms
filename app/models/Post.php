<?php
    class Post{

        private $db;

        public function __construct(){
            $this->db = DB::connect();
        }

        public function addPost($params = []){
            return $this->db->insert('posts', $params);
        }

        public function getAllPosts(){
            return $this->db->getAll('posts');
        }

        public function getOnePost($id){
            return $this->db->getOneRow('posts', '=', array('post_id' => $id));
        }

        public function getAllPostsByOrderAndLimit(){
            return $this->db->getAllByOrderAndLimit('posts', 'post_date', 'DESC', 5);
        }

        public function fetchCategoryPostsByOrder($id){
            $this->db->selectByOrder('posts', 'post_date', 'DESC', array('post_category_id' => $id));
            return $this->db->results();
        }

        public function searchPosts($params = []){
            $this->db->search('posts', 'post_date', 'DESC', $params);
            return $this->db->results();
        }

        public function viewsCount($id, $result){
            return DB::connect()->update('posts', 'post_id', $id, array(
                'post_views_count' => $result
            ));
        }

        public function getPublishedPost(){
            $this->db->selectByOrder('posts', 'post_date', 'desc', array('post_status' => 'publish'));
            return $this->db->results();
        }

        public function commentsCount($id, $result){
            return DB::connect()->update('posts', 'post_id', $id, array(
                'post_comments_count' => $result
            ));   
        }

        public function delete($id){
            return $this->db->delete('posts', '=', array('post_id' => $id));
        }

        public function draft($id){
            return $this->db->update('posts', 'post_id', $id, array('post_status' => 'draft'));
        }

        public function publish($id){
            return $this->db->update('posts', 'post_id', $id, array('post_status' => 'publish'));
        }
    }
