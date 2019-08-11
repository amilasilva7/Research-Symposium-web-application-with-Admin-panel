
<?php 
	session_start();
		$_SESSION = array();

		if(isset($_COOKIE['user_id'])){

			setcookie($_SESSION['user_id'],'',time()-86400,'/');

		}

		header("Location:index.php");
			
		
		session_destroy();
	

 ?>