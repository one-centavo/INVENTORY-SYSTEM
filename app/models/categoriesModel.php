<?php
    namespace app\models;
    use app\models\dataBase;

    class categoriesModel extends dataBase{

        public function getCategories(){
            $sql = "SELECT * FROM categories";
            $stmt = $this->query($sql);
            return $stmt->fetchAll();
        }

        public function addCategory($params){
            $sql = "INSERT INTO categories (category_name, description) VALUES (:category_name, :description)";
            
            return $this->query($sql, $params);
        }

    }