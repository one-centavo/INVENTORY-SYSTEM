<?php

    namespace app\controllers;
    use app\models\userModel;

    class userController {
        
        private $model;

        public function __construct() {
            $this->model = new userModel();
        }
    
        public function createUser() {
            
            $name = trim($_POST['user_name']);
            $lastName = trim($_POST['user_last_name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $params = [
                ':user_name' => $name,
                ':user_last_name' => $lastName,
                ':email' => $email,
                ':password' => $password
            ];

            if($this->model->addUser($params)){
                echo "Usuario agregado con éxito.";

            }else{
                echo "Error al agregar el usuario.";
            }
        }

        public function getUsersController() {
            return $this->model->getAllUsers();
        }
    }