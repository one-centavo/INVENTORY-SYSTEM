<?php
    require_once __DIR__ ."/../../autoload.php";
    use app\controllers\categoriesController;

    if(isset($_POST['action']) && !empty($_POST['action'])){
        $action = $_POST['action'];
        $categoriesController = new categoriesController();

        switch($action){
            case 'addCategory':
                $categoriesController->addCategoryController();
                break;
            default:
                echo "Acción no válida.";
                break;
        }
    }
    