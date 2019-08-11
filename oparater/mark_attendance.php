<?php //session_start(); ?>
<?php 	require_once("../includes/redirect_admin.php") ?>
<?php 	require_once("includes/oparate_header.php"); ?>
<?php   require_once("includes/oparate_navbar.php"); ?>
<?php require_once("../includes/connection.php"); ?>

<?php 
    //SET SESSIONS LIST

  $errors = array();

  $list = '';
  $query1 = "SELECT * FROM sessions";
  $result_rew = mysqli_query($connection,$query1);

  if($result_rew){
    
    if(mysqli_num_rows($result_rew)>0){
      while($dataset = mysqli_fetch_assoc($result_rew)){

        $list .= "<option>{$dataset['session_id']}</option>";
      }
    }

  }else{
    $errors[]="Not available sessions!";
  }

 ?>
	 <?php 
	 	
	 	$user['user_id'] = "";
		$user['user_type'] = "";
		$user['first_name'] = "";
		$user['last_name'] = "";
		$user['name_initial'] = "";
	  ?>


 <?php   
$errors[] = array();

	$color='style="background-color: #5bc0de; padding: 10px;color:white"';
	$errors[0] = "Welcome";
	
//
 	if(isset($_POST['load'])){
 		
 		if($_POST['search_by']=="by_id"){

 			$query = "SELECT * FROM users WHERE user_id = '{$_POST['id']}'";
 			$result = mysqli_query($connection,$query);

 			if($result){
 				if(mysqli_num_rows($result)==1){
 					//$_SESSION['rec_id'] = $_POST['id'];
 					//$_SESSION['session'] = $_POST['session'];
 					$color='style="background-color: #5cb85c; padding: 10px;color:white"';
 					$errors[] = array();
 					$errors[0] = "User found!";

 					//get values from database to an array.
 					$user = mysqli_fetch_assoc($result);
 					$_SESSION['user_name'] = $user['name_initial'];
 					$_SESSION['rec_id'] = $user['user_id'];
 					

 				}else{
 					$color='style="background-color: red; padding: 10px;color:white"';
 					$errors[] = array();
 					$errors[0] = "Invalid user id";
 				}
 				
 			}else{
 				
 			}

 		}else{

 			$query = "SELECT * FROM users WHERE name_initial = '{$_POST['id']}'";
 			$result = mysqli_query($connection,$query);

 			if($result){
 				if(mysqli_num_rows($result)==1){
 					//$_SESSION['rec_id'] = $_POST['id'];
 					//$_SESSION['session'] = $_POST['session'];

 					$color='style="background-color: green; padding: 10px;color:white"';
 					$errors[] = array();
 					$errors[0] = "User found!";

 					//get values from database to an array.
 					$user = mysqli_fetch_assoc($result);
 					$_SESSION['rec_id'] = $user['user_id'];
 					//to keep value
 					$_SESSION['user_name'] = $user['name_initial'];


 				}else{
 					$color='style="background-color: red; padding: 10px;color:white"';
 					$errors[] = array();
 					$errors[0] = "Invalid user id";
 				}
 				
 			}else{
 				
 			}

 		}

 	}

 	if(isset($_POST['record'])){
 		
 		if($_SESSION['rec_id'] ==""){

 				$errors[] = array();
 				$errors[0]="Please select a user to record!";
 				$color='style="background-color: red; padding: 10px;color:white"';
 			
 		}else{

 			//assign session variables
 			$rec_id = $_SESSION['rec_id'];
 			//$session = $_SESSION['session'];
 			$user_name = $_SESSION['user_name'];

 			//clear session variables
 			$_SESSION['rec_id']=""; //user entered id
 			//$_SESSION['session']="";
 			$session = $_POST['session'];
 			$_SESSION['user_name']="";

 			$query = "SELECT * FROM attendance_rocord WHERE session_id='{$_POST['session']}' AND user_id='{$rec_id}'";
 			$result = mysqli_query($connection,$query);

 			if($result){

 				if(mysqli_num_rows($result)>0){

 					$att_table = mysqli_fetch_assoc($result);

 					$att_table['session_id'];
 					$att_table['user_id'];

 					$errors[] = array();
 					$color='style="background-color: red; padding: 10px;color:white"';
 					$errors[0]="Already recorded as participated!";

 				}else{
 					
 					$query = "INSERT INTO attendance_rocord(user_name,session_id,datetimes,user_id) VALUES('$user_name','$session',NOW(),'$rec_id')";
 					$result = mysqli_query($connection,$query);

 					if($result){
 						$errors[] = array();
 						$errors[0]="Successfully Inserted";
 					}
 				}
 				
 			}else{
 				$errors[] = array();
 				$errors[0]="Query Error";
 			}
 		}

 	}

   


     ?>



	
<div style="padding-top: 60px">
	
<div class="container fluid padding" style="padding: 20px">
	<div class="row" style=""> <!--START row 1-->
		
		
		<div class="col-sm-12" style="border: ridge; padding: 20px;background-color: #f9f9f9">
			<h2 class="text-center">ATTENDANCE RECORD</h2>
			
			
			<hr style="background-color: black">

			<form class="form d-inline" method="post" action="mark_attendance.php">
				<div class="row">
					

				<div class="col-sm-5">
					<label>	Search by</label>
					<select class="form-control" name="search_by">
    				<option value="by_id" selected="">Search by ID</option>
    				<option value="by_name">Serch by Name</option>
    			</select>
				</div>
				<div class="col-sm-5">
					<label for="email">Registration ID :</label>
    			<input class="form-control" type="text" name="id" placeholder="Enter id or name" required="">

				</div>
				<div class="col-sm-2"><br>
					<button name="load" type="submit" class="btn btn-primary" style="float: right;width: 100px">Search</button>
				</div>
				</div>
  			</form>

		</div>
		<div class="col-sm-12" style=" padding: 0px"></div>
		<div class="col-sm-12" style="padding-bottom: 5px;">
			<form method="post" action="mark_attendance.php" >
              	<div class="row">
              		<div class="col-sm-7">
              			<p></p>
              			<div <?php echo $color; ?> >
							<h5>
								<?php 
									if(isset($errors[0])){
										echo $errors[0];
									} 
								?>
							
							</h5>
						</div>
              		</div>
              	<div class="col-sm-3">
						
		    			Session ID :<select class="form-control" name="session">
		    				<?php echo $list; ?>
		    			</select>
					</div>
              	<div class="col-sm-2"> <br><button name="record" type="submit" class="btn btn-danger" style="float: right;width: 100px">Record</button></div>
              	</div>
              </form>
		</div>


		<div class="col-sm-12" style="border: ridge; padding: 06px;background-color: #f9f9f9">
			<h2 class="text-center" style="background-color: #428bca; color: white">Profile</h2>
			<table class="table table-striped" style="font-size: 18px;font-family: sans-serif;font-style: inherit;">
                
                <tbody>
                  
                  <tr>
                    
                    <td> PROFILE ID</td>
                    <td><?php echo $user['user_id']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>USER TYPE</td>
                    <td><?php echo $user['user_type']; ?></td>

                  </tr>
                  <tr>
                    
                    <td> FIRST NAME</td>
                    <td><?php echo $user['first_name']; ?></td>

                  </tr>
                  <tr>
                    
                    <td> LAST NAME</td>
                    <td><?php echo $user['last_name']; ?></td>

                  </tr>
                  
                  <tr>
                    
                    <td>NAME</td>
                    <td><?php echo $user['name_initial']; ?></td>

                  </tr>
                  
                </tbody>
              </table>
              
		</div>	
		
	</div><!-- END row 1-->


</div>
</div>







 <?php require_once("includes/oparate_footer.php"); ?>