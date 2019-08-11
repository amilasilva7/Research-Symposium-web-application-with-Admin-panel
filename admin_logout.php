
<?php 
	session_start();
		$_SESSION = array();

		if(isset($_COOKIE[session_name()])){

			setcookie(session_name,'',time()-86400,'/');

		}else{

		}

		
		header("Location:ad_login.php");
		session_destroy();
	

 ?>