<?php

    namespace app\controllers;
    use app\models\productsModel;

    class productsController{
        private $model;

        public function __construct(){
            $this->model = new productsModel();
        }

        public function getProductsController(){
            return $this->model->getProducts();
        }

        public function addProductController(){
            $name = trim($_POST['nameProduct']);
            $price = trim($_POST['price']);
            $stock = trim($_POST['stock']);
            $categoryId = trim($_POST['categoryId']);

            if(!isset($_POST['nameProduct'], $_POST['stock'], $_POST['price'], $_POST['categoryId'])  || empty($_POST['nameProduct']) || empty($_POST['stock']) || empty($_POST['price']) || empty($_POST['categoryId'])){
                echo "Rellene todos los campos antes de agregar el producto.";
                return;
            }

            $params = [
                ':name_product' => $name,
                ':stock' => $stock,
                ':price' => $price,
                ':id_category' => $categoryId
            ];

            if(!isset($name) && empty($name)){
                echo "Rellene el campo de nombre antes de agregar el producto.";
                return;
            }
            if($this->model->addProduct($params)){
                echo "Producto agregado con éxito.";
            }else{
                echo "Error al agregar el producto.";
            }
            
        }    
    }