<!----------
<?php 
session_start();
	 require_once("connection.php");
	
	$users = $_SESSION['user_id'];
	$query = "SELECT image FROM users WHERE id='{$user}'";

	$result = mysqli_query($connection,$query);

	if($result){

		$log_user = mysqli_fetch_assoc($result);

		$pro_pic = $log_user['image'];
		echo $pro_pic;
	}


 ?>
--->