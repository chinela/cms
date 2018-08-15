<?php

    class Category{

        private $db;

        public function __construct(){
            $this->db = DB::Connect();
        }

        public function addCategory($params = []){
            return $this->db->insert('categories', $params);
        }

        public function getAllCategoriesByOrder(){
            return $this->db->getAllByOrder('categories', 'cat_title', 'ASC');
        }

        public function getOneCategory($id){
            return $this->db->getOne('categories', '=', array('cat_id' => $id));
        }

        public function editCategory($id, $params = []){
            return $this->db->update('categories', 'cat_id', $id, $params);
        }

        public function deleteCategory($id){
            return $this->db->delete('categories', '=', array('cat_id' => $id));
        }
    }