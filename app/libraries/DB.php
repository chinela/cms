<?php

    class DB{

        private static $connect = null;

        private $pdo,
                $query,
                $results,
                $error = false,
                $count = 0;

        private function __construct(){

            $dsn = 'mysql:host=' . Access::get('mysql/host') . ';dbname=' . Access::get('mysql/dbname');

            try{

                $this->pdo = new PDO($dsn, Access::get('mysql/username'), Access::get('mysql/password'));
            } catch (PDOException $e){

                $this->message = "could not connect to database";
                die($this->message);
            }
        }

        public function connect(){
            if(!isset(self::$connect)){
                self::$connect = new DB;
            }
            return self::$connect;
        }

        public function query($sql, $params = []){
            $this->error = false;
            $this->query = $this->pdo->prepare($sql);

            if($this->query){
                $x = 1;

                foreach($params as $param){
                    $this->query->bindValue($x, $param);
                    $x++;
                }

                if($this->query->execute()){
                    $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
                    $this->count = $this->query->rowCount();
                } else {
                    $this->error = true;
                }
            }
            return $this;
        }

        public function insert($table, $params = []){

            $set = '';
            $x = 1;
            $keys = array_keys($params);

            foreach ($params as $param){
                $set .= '?';
                if($x < count($params)){
                    $set .= ', ';
                }
                $x++;
            }
            // die($set);

            $stmt = "INSERT INTO $table ";
            $stmt .= "(`" . implode('`,`', $keys) . "`) ";
            $stmt .= "VALUES ({$set})" ;

            return $this->query($stmt, $params);
        }

        public function update($table, $column, $id, $params = []){
            $set = '';
            $x = 1;

            foreach($params as $key => $value){
                $set .= "{$key} = ?";

                if($x < count($params)){
                    $set .= ', ';
                }
                $x++;
            }
            $stmt = "UPDATE $table SET {$set} WHERE $column = $id";
            // die($stmt);
            return ($this->query($stmt, $params));
        }

        public function action ($action, $table, $operation, $params = []){

            $set = '';
            $x = 1;

            foreach($params as $key => $value){
                $set .= "{$key} {$operation} ?";
                if($x < count($params)){
                    $set .= ' and ';
                }
                $x++;
            }

            $stmt = "$action FROM $table WHERE {$set}";
            // die($stmt);
            return $this->query($stmt, $params);
        }

        public function selectByOrder($table, $order, $direction, $params = []){
            $set = '';
            $x = 1;

            foreach($params as $key => $value){
                $set .= "{$key} = ?";
                if($x < count($params)){
                    $set .= ' and ';
                }
                $x++;
            }

            $stmt = "SELECT * FROM $table WHERE {$set} ORDER BY $order $direction";
            // die($stmt);
            return $this->query($stmt, $params);
        }


        public function search($table, $order, $direction, $params = []){
            $set = '';
            $x = 1;

            foreach($params as $key => $value){
                $set .= "{$key} like ?";
                if($x < count($params)){
                    $set .= ' or ';
                }
                $x++;
            }

            $stmt = "SELECT * FROM $table WHERE {$set} ORDER BY $order $direction";
            // die($stmt);
            return $this->query($stmt, $params);
        }
        public function selectByOrderAndLimit($table, $order, $direction, $limit, $params = []){
            $set = '';
            $x = 1;

            foreach($params as $key => $value){
                $set .= "{$key} = ?";
                if($x < count($params)){
                    $set .= ' and ';
                }
                $x++;
            }

            $stmt = "SELECT * FROM $table WHERE {$set} ORDER BY $order $direction LIMIT $limit";
            // die($stmt);
            $this->query($stmt, $params);
            return $this->results();
        }

        public function delete($table, $operation, $params = []){
            return $this->action('DELETE', $table, $operation, $params);
        }

        public function checkIfExists($table, $operation, $params = []){
            return $this->action('SELECT *', $table, $operation, $params);
        }

        public function getOne($table, $operation, $params = []){
            $this->action('SELECT *', $table, $operation, $params);
            return $this->singleResult();
        }

        public function getOneRow($table, $operation, $params = []){
            $this->action('SELECT *', $table, $operation, $params);
            return $this->results();
        }

        public function getAll($table){
            $stmt = "SELECT * FROM $table";
            $this->query($stmt);
            return $this->results();
        }

        public function getAllByOrder($table, $order, $direction){
            $stmt = "SELECT * FROM $table ORDER BY $order $direction";
            $this->query($stmt);
            return $this->results();
        }

        public function getAllByLimit($table, $limit){
            $stmt = "SELECT * FROM $table LIMIT $limit";
            $this->query($stmt);
            return $this->results();
        }

        public function getAllByOrderAndLimit($table, $order, $direction, $limit){
            $stmt = "SELECT * FROM $table ORDER BY $order $direction LIMIT $limit";
            $this->query($stmt);
            return $this->results();
        }

        public function results(){
            return $this->results;
        }

        public function singleResult(){
            return $this->results()[0];
        }

        public function count(){
            return $this->count;
        }
    }
