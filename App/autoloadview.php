<?php
function autoload_view($className){

    $directories=array('App/views/');

    foreach($directories as $directory){
        $filename=$directory.$className.".html";
        //echo $filename ."<br/>";

        if (file_exists($filename)) {
           //  echo "autoloaded: ".$filename."<br/>";
            require_once $filename;
            return;
        }//else echo "not loaded: ".$filename."<br/>";
    }
}
spl_autoload_register("autoload_view");

?>