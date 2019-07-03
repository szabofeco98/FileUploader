<?php
    function autoload($className){

        $directories=array('App/controllers/',
                            'App/');

        foreach($directories as $directory){
            $filename=$directory.$className.".php";
           // echo $filename ."<br/>";

            if (file_exists($filename)) {
               // echo "autoloaded: ".$filename."<br/>";
                require_once $filename;
                return;
            }//else echo "not loaded: ".$filename."<br/>";
        }
    }
spl_autoload_register("autoload");

?>
