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
    }