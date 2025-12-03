<?php

    namespace app\models;
    use PDO;
    use PDOException;
    if(file_exists(__DIR__ . '/../../config/server.php')){
        require_once __DIR__ . '/../../config/server.php';
    }

    class dataBase{
    
        private $host = DB_SERVER;
        private $dbName = DB_NAME;
        private $user = DB_USER;
        private $pass = DB_PASS;

        protected function connection(){
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $dsn = "mysql:host=$this->host;dbname=$this->dbName;charset=utf8";
            try {
                $pdo = new PDO($dsn, $this->user, $this->pass, $options);
                return $pdo;
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
                echo "Error de conexión a la base de datos: " . $e->getMessage();
            }
            
        }
        

        protected function query($sql, $params = []){
            $stmt = $this->connection()->prepare($sql);
            try {
                $stmt->execute($params);
                return $stmt;
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        }

        protected function validatePattern($pattern, $string){
            if(preg_match("/^".$pattern."$/", $string)){
                return false;
            }
            return true;
        }

        
    }