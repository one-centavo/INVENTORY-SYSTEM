<?php

    namespace app\models;
    use app\models\dataBase;
    class productsModel extends dataBase{

        public function getProducts(){
            $sql = "SELECT * FROM products";
            $stmt = $this->query($sql);
            return $stmt->fetchAll();
        }

        public function addProduct($name, $price){
            $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
            $params = [
                ':name' => $name,
                ':price' => $price
            ];
            $this->query($sql, $params);
        }

    }