<?php

    namespace app\models;
    use app\models\dataBase;

    class userModel extends dataBase{
        public function addUser($params){
            $sql = "INSERT INTO users (user_name,user_last_name,email,password) VALUES (:user_name, :user_last_name, :email, :password)";
            return $this->query($sql, $params);
        }

        public function getAllUsers(){
            $sql = "SELECT id_user, user_name, user_last_name, email FROM users";
            $stmt =  $this->query($sql);
            return $stmt->fetchAll();
        }

        public function deleteUser($params){
            $sql = "DELETE FROM users WHERE id_user = :id_user";
            return $this->query($sql, $params);
        }


    }