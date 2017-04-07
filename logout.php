<?php
	session_start();
    include_once 'dbconnect.php' ;
	if(!isset($_SESSION['user'])){
		header("Location: index.php");
    }
	else if(isset($_SESSION['user'])!=""){
        session_destroy();
        unset($_SESSION['user']);
		header("Location: index.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['user']);
		header("Location: index.php");
	}
?>