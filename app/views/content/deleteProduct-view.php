<?php
    use app\controllers\productsController;
    $insProduct= new productsController();
    $delete = $insProduct->deleteProductController($url[1]);
?>