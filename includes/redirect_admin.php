<?php 
session_start();

	if(!isset($_SESSION['user_id'])){
		header("location:../ad_login.php");
			
		}else{
			if(!$_SESSION['usertype']=="Admin"){
				header("location:../admin/admin.php");
			}else{
				
			}
		}
	

 ?>

 