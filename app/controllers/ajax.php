<?php
    require_once __DIR__ ."/../../autoload.php";
    use app\controllers\categoriesController;
    use app\controllers\productsController;
    use app\controllers\userController;

    if(isset($_POST['action']) && !empty($_POST['action'])){
        $action = $_POST['action'];
        $categoriesController = new categoriesController();
        $productsController = new productsController();
        $userController = new userController();

        switch($action){
            case 'addCategory':
                $categoriesController->addCategoryController();
                break;
            case 'addProduct':
                $productsController->addProductController();
                break;
            
            case 'createUser':
                $userController->createUser();
                break;
            
            default:
                echo "Acción no válida.";
                break;
        }
    }
    