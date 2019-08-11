<!-----
<?php 
session_start();
	
		
	if(isset($_POST['submit'])){
		$errors = array();

		if(isset($_SESSION['user_id'])){
			$email = mysqli_real_escape_string($connection,$_POST['email']);
			$password = mysqli_real_escape_string($connection,$_POST['password']);
			$hash_password=sha1($password);

			$query = "SELECT * from users where email='{$email}' AND password='{$password}' LIMIT 1";
			$result_set= mysqli_query($connection,$query);
			$errors = array();

			if($result_set){

				if(mysqli_num_rows($result_set)==1){

					//$errors[1] = 1; //valid inputs
					header('Location:profile.php');
					$users= mysqli_fetch_assoc($result_set);
					$_SESSION['user_id']=$users['user_id'];
					$_SESSION['email']=$users['email'];

				}else{
					//$errors[0]=2;
					 //Invalid inputs
						$errors[]=2;

				}
			}else{
				$errors[]=2;
			}
			

		}else{
			header("Location:profile.php");
			echo "aaaaaaaaaaaaaaa";
		}


	}else{

	}

 ?>

<html>
 <head>
 	<title></title>
 </head>
 <body>
 



 </body>
 </html>

-->