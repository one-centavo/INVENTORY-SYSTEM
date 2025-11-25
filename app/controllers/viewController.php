<?php

    namespace app\controllers;
    use app\models\viewModel;

    class viewController extends viewModel{


        protected function obtainView($view){
           if($view != ""){
            $response = $this->loadView($view);
           }else{
            $response = "login";
            }

            return $response;
        }

        public function load($views){
            $view  = $this->obtainView($views);

            if($view == "404" || $view == "login" || $view == "403"){
                require_once BASE_PATH . "app/views/content/$view-view.php";
            }else{
                require_once BASE_PATH . "app/views/inc/sidebar.php";
                require_once $view;
            }
        }

    }