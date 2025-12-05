<?php
// filepath: c:\xampp\htdocs\INVENTORY-SYSTEM\index.php
const BASE_PATH = __DIR__ . "/";

require_once "vendor/autoload.php";
require_once BASE_PATH . "config/app.php";
use app\controllers\reportController;

if(isset($_GET['views'])){
    $url = explode("/",$_GET['views']);
}else{
    $url = ["login"];
}

// Manejar PDFs antes de cualquier salida HTML
if($url[0] === "generate-pdf"){
    
    $reportController = new reportController();
    $reportController->downloadProductsPDF();
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once BASE_PATH . "app/views/inc/head.php"; ?>
</head>
<body class="h-dvh flex flex-col lg:flex-row">


    <?php
        include_once BASE_PATH . "public/icons/icons.svg";
        use app\controllers\viewController;
        $insView = new viewController();
        $insView->load($url[0], $url);
    ?>

    <?php include_once BASE_PATH . "app/views/inc/scripts.php"; ?>
</body>
</html>