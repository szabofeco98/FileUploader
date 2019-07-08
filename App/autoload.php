<?php
    function autoload($className){

        $directories=array('App/controllers/',
                           'App/',
                           'App/models/',
                           'App/views/' );

        foreach($directories as $directory){
            $filename=$directory.$className.".php";
           // echo $filename ."<br/>";

            if (file_exists($filename)) {
               // echo "autoloaded: ".$filename."<br/>";
                require_once $filename;
                return;
            }else {
                $filename=$directory.$className.".html";
                if (file_exists($filename)) {
                    // echo "autoloaded: ".$filename."<br/>";
                    require_once $filename;
                    return;
                }
            }
        }
    }
spl_autoload_register("autoload");

?>
