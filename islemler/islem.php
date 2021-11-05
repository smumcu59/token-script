<?php
ob_start();
session_start();


if(isset($_POST['dil-secimi'])){
    $secim = $_POST['dil-secimi'];
	if($secim == "1"){
        
        $_SESSION['dil'] = 1;
	}
	else if($secim == "2"){
		$_SESSION['dil'] = 2;
	}
	else{
		$_SESSION['dil'] = 3;
	}
	header("location:../index");
	exit;
}





?>