<?php

    namespace app\controllers;
    use app\models\categoriesModel;

    class categoriesController{

        private $model;

        public function __construct(){
            $this->model = new categoriesModel();
        }

        public function getCategoriesController(){
            return $this->model->getCategories();
        }

        public function addCategoryController(){
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);

            $params = [
                ':category_name' => $name,
                ':description' => $description
            ];

            if(!isset($name) && empty($name)){
                echo "Rellene el campo de nombre antes de agregar la categoría.";
                return;
            }
            if($this->model->addCategory($params)){
                echo "Categoría agregada con éxito.";
            }else{
                echo "Error al agregar la categoría.";
            }
            
        }

        public function deleteCategoryController($id){
            $params = [
                ':id' => $id
            ];

            if($this->model->deleteCategory($params)){
                if(headers_sent()){
                    echo "<script>window.location.href='".APP_URL."categories';</script>";
                }else{
                    header("Location: ".APP_URL."categories");
                    exit();
                }
            }else{
                echo "Error al eliminar la categoría.";
            }
        }

    
    }