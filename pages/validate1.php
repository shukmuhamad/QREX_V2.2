<?php 
	session_start();
	if(!ISSET($_SESSION['badge_id'])){
		header("location:login1.php");
	}