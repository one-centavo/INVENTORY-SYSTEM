<?php
    require_once __DIR__ ."/../../autoload.php";
    use app\controllers\categoriesController;
    use app\controllers\productsController;

    if(isset($_POST['action']) && !empty($_POST['action'])){
        $action = $_POST['action'];
        $categoriesController = new categoriesController();
        $productsController = new productsController();

        switch($action){
            case 'addCategory':
                $categoriesController->addCategoryController();
                break;
            case 'addProduct':
                $productsController->addProductController();
                break;
            default:
                echo "Acción no válida.";
                break;
        }
    }
    