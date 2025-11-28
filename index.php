<?php
    const BASE_PATH = __DIR__ . "/";

    require_once "autoload.php";
    require_once BASE_PATH . "config/app.php";

    if(isset($_GET['views'])){
        $url = explode("/",$_GET['views']);
    }else{
        $url = ["login"];
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
        $insView->load($url[0]);
    ?>

    <?php include_once BASE_PATH . "app/views/inc/scripts.php"; ?>
</body>
</html>
