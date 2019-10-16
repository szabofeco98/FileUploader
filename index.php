<?php
    require_once "App/autoload.php";

    $route=new Route();


?>
    $myfile=fopen("valami.txt", "r") or die("unable to open");
	$readed=fread($myfile, filesize("valami.txt"));

    $db = new PDO('mysql:host=localhost;dbname=test;',"root","");
	$stmt=$db->prepare("SELECT valami from test where username=:userName");
	$stmt->execute(["userName"=>$_POST['username']]);
	$select=$stmt->fetch(PDO::FETCH_ASSOC);
