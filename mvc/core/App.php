<?php
    class App{
        
        protected $controller = "Home";
        protected $action = "SayHi";
        protected $params = [];
        function __construct()
        {
          $arr = $this->urlProcess();
        //  print_r($arr);

        // XU LY FILE CONTROLLER
        if(file_exists("./mvc/controllers/".$arr[0].".php")){
           $this->controller = $arr[0];
           unset($arr[0]);
        }
        require_once "./mvc/controllers/".$this->controller.".php";

        //Xu ly action
        if(isset($arr[1])){
            if(method_exists($this->controller,"$arr[1]")){
                $this->action = $arr[1];
                unset($arr[1]);
            }
        }
        echo $this ->action;


        // xu ly param
        $this ->params = $arr?array_values($arr):[];
        echo "<br>";
        print_r($this->params);
        
        }
        function urlProcess(){
            if(isset($_GET["url"])){

               return explode("/",filter_var(trim($_GET["url"], "/")));
               

            }
            
        }
    }
?> 