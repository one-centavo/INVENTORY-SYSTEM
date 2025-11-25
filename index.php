<?php
    const BASE_PATH = __DIR__ . "/";

    require_once "autoload.php";

    if(isset($_GET['views'])){
        $url = explode("/",$_GET['views']);
    }else{
        $url = ["login"];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        use app\controllers\viewController;
        
        $insView = new viewController();
        $insView->load($url[0]);

    ?>
</body>
</html>
