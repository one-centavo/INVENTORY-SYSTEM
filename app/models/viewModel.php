<?php

    namespace app\models;
    use RecursiveDirectoryIterator;
    use RecursiveIteratorIterator;

    class viewModel{
        public function loadView($view){
            if($view == "login" || $view == "index"){
                return "login";
            }

            $viewFiles = [];
            $directory = new RecursiveDirectoryIterator(BASE_PATH . "app/views/content");
            $iterator = new RecursiveIteratorIterator($directory);

            foreach($iterator as $file){
                if($file->isFile() && pathinfo($file,PATHINFO_EXTENSION) === "php"){
                    if (str_ends_with($file->getFilename(), '-view.php')) {
                        $viewName = basename($file->getFilename(),"-view.php");
                        $viewFiles[$viewName] = $file->getPathname();
                    }
                }
            }

            if(array_key_exists($view,$viewFiles)){
                $content = $viewFiles[$view];
            }else{
                $content = "404";
            }

            return $content;
        }
    }