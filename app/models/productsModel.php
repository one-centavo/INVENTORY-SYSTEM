<?php

    namespace app\models;
    use app\models\dataBase;
    class productsModel extends dataBase{

        public function getProducts(){
            $sql = "SELECT 
                        products.*, 
                        categories.category_name 
                    FROM products 
                    INNER JOIN categories 
                        ON products.id_category = categories.id_category
            ";
            $stmt = $this->query($sql);
            return $stmt->fetchAll();
        }

        public function addProduct($params){
            $sql = "INSERT INTO products (name_product,stock,price,id_category) VALUES (:name_product,:stock, :price, :id_category)";
            return $this->query($sql,$params);
        }

    }