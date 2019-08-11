
<?php require_once("../includes/connection.php"); ?>
<?php session_start(); ?>

<?php 


$ss = '';
$id = "";


	
if(isset($_GET['id'])){
	

	$query = "SELECT * FROM users WHERE user_id = '{$_GET['id']}'";
	$result = mysqli_query($connection,$query);

	if($result){
		//$id = $_GET['id'];
			if(mysqli_num_rows($result)>0){

				$msg = "User ID Found!";
				//valid user
				$_SESSION['id_id'] = $_GET['id'];
				$list = mysqli_fetch_assoc($result);
				$_SESSION['name_name'] = $list['name_initial'];
				
			}else{
				
				$msg = "User_id is invalid!";
			}
	}else{

		$msg = "query error!";
	}
}

 			if (isset($_POST['record'])) {
 				
 				$id = $_SESSION['id_id'];
 				$name = $_SESSION['name_name'];
 				

 				$session = $_POST['select_sess'];
 				$query = "SELECT user_name FROM attendance_rocord WHERE session_id='{$session}' AND user_id='{$id}'";
 				$result1 = mysqli_query($connection,$query);

 			if($result1 && $id>0){


 				if(mysqli_num_rows($result1)>0){

 					
 			
 						$msg = "Already recorded as participated!";
 					

 				}else{
 					
 					$query2 = "INSERT INTO attendance_rocord(user_name,session_id,datetimes,user_id) VALUES('$name','$session',NOW(),'$id')";
 					$result2 = mysqli_query($connection,$query2);

 					if($result2){
 						$msg="Successfully Inserted";
 					}else{
 						$msg = "Query Error-query2";
 					}
 				}
 				
 			}else{
 				$msg = "Query Error";
 			}
 		}
////////////////////

	




 ?>



<?php 
  
  $items = '';
  
  $query5 = "SELECT * FROM sessions";
  $result5 = mysqli_query($connection,$query5);

  if($result5){
    if(mysqli_num_rows($result5)>0){

      while ($list1 = mysqli_fetch_assoc($result5)){
          $items .= "<option>{$list1['session_id']}</option>";

      }

    }else{
      
    }
  }

 ?>


 
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>SLIATE|SYMPOSIUM 2018</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  
     
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script type="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", rel="stylesheet", integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN", crossorigin="anonymous"></script>
  
</head>
<body>
	
 
<div class="container">
	<div class="row" style="padding-top: 100px;padding-bottom: 20px">
		<div class="col-3"></div>
		<div class="col-6"><h4 style="text-align: center;color: red"><?php if(isset($msg)){ echo $msg; } ?></h4></div>
		<div class="col-3"></div>
	</div>

	<div class="row">
		<div class="col-4"></div>
		<div class="col-4">
			<form class="form d-inline" action="rec-qr.php" method="post">
				<div>User ID : <input type="text" class="form-control" name="id" disabled value=<?php 
					if(isset($_SESSION['id_id'])){
						echo $_SESSION['id_id'];
					} ?>
				></div>

				<div>Session : 
					<select class="form-control" name="select_sess">
						<?php 
							
							echo $items;
							
						
						 ?> 
					</select>
				</div>
				<div><br><button type="submit" name="record" class="form-control btn btn-success">Record</button></div>
				
			</form>
			
		</div>
		<div class="col-4"></div>
	</div>
</div>

</body>
</html>