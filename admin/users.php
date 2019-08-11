<?php 	require_once("../includes/redirect_admin.php") ?>
<?php 	require_once("includes/admin_header.php"); ?>
<?php   require_once("includes/admin_navbar.php"); ?>
<?php   require_once("../includes/connection.php") ?>

<?php 
	
	$errors=array();
	$errors[0]="WELCOME!";
	$style =  'style="background-color: green;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';
	$table='';
	
	if(!isset($_POST['load_users']) && !isset($_POST['select_user'])){
		$query = "SELECT * FROM users";
		$result = mysqli_query($connection,$query);

		if($result){

			if(mysqli_num_rows($result)>0){

					$errors=array();
					$errors[0]=mysqli_num_rows($result)." record(s) availbale.";
					$style =  'style="background-color: green;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';

				while ($list = mysqli_fetch_assoc($result)) {
					$table .= "<tr>";
					$table .= "<td>{$list['user_id']}</td>";
					$table .= "<td>{$list['user_type']}</td>";
					$table .= "<td>{$list['salutation']}</td>";
					$table .= "<td>{$list['name_initial']}</td>";
					$table .= "<td>{$list['institute']}</td>";
					$table .= "<td>{$list['phone_no']}</td>";
					$table .= "<td>{$list['email']}</td>";
					$table .= "<td>{$list['add_line1']}</td>";
					$table .= "<td>{$list['add_line2']}</td>";
					$table .= "<td>{$list['add_line3']}</td>";
					$table .= "<td>{$list['accommodation']}</td>";
					$table .= "<td>{$list['food_type']}</td>";
					
					$table .= "</tr>";
				}

				

			}else{

				$errors=array();
				$errors[0]="Users are not available!";
				$style =  'style="background-color: red;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';
			}
		}else{
			$errors=array();
			$errors[0]="Query error! Thable is not available.";
			$style =  'style="background-color: red;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';
		}
	}

 ?>

 <?php 

 	if(isset($_POST['load_users'])){

 		//$query = "SELECT * FROM users WHERE "
 		if($_POST['select_by']=="all"){
 			$query = "SELECT * FROM users";
			$result = mysqli_query($connection,$query);

			if($result){

				if(mysqli_num_rows($result)>0){

					$errors=array();
					$errors[0]=mysqli_num_rows($result)." record(s) availbale.";
					$style =  'style="background-color: green;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';

					while ($list = mysqli_fetch_assoc($result)) {
						$table .= "<tr>";
						$table .= "<td>{$list['user_id']}</td>";
						$table .= "<td>{$list['user_type']}</td>";
						$table .= "<td>{$list['salutation']}</td>";
						$table .= "<td>{$list['name_initial']}</td>";
						$table .= "<td>{$list['institute']}</td>";
						$table .= "<td>{$list['phone_no']}</td>";
						$table .= "<td>{$list['email']}</td>";
						$table .= "<td>{$list['add_line1']}</td>";
						$table .= "<td>{$list['add_line2']}</td>";
						$table .= "<td>{$list['add_line3']}</td>";
						$table .= "<td>{$list['accommodation']}</td>";
						$table .= "<td>{$list['food_type']}</td>";
						
						$table .= "</tr>";
					}

					

				}else{

					$errors=array();
					$errors[0]="Users are not available!";
					$style =  'style="background-color: red;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';
				}
			}else{
				$errors=array();
				$errors[0]="Query error! Thable is not available.";
				$style =  'style="background-color: red;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';
			}
 		}else if($_POST['select_by']=="participants"){
 			$type="Participant";

 			$query = "SELECT * FROM users WHERE user_type='{$type}'";
			$result = mysqli_query($connection,$query);

			if($result){

				if(mysqli_num_rows($result)>0){

					$errors=array();
					$errors[0]=mysqli_num_rows($result)." record(s) availbale.";
					$style =  'style="background-color: green;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';

					while ($list = mysqli_fetch_assoc($result)) {
						$table .= "<tr>";
						$table .= "<td>{$list['user_id']}</td>";
						$table .= "<td>{$list['user_type']}</td>";
						$table .= "<td>{$list['salutation']}</td>";
						$table .= "<td>{$list['name_initial']}</td>";
						$table .= "<td>{$list['institute']}</td>";
						$table .= "<td>{$list['phone_no']}</td>";
						$table .= "<td>{$list['email']}</td>";
						$table .= "<td>{$list['add_line1']}</td>";
						$table .= "<td>{$list['add_line2']}</td>";
						$table .= "<td>{$list['add_line3']}</td>";
						$table .= "<td>{$list['accommodation']}</td>";
						$table .= "<td>{$list['food_type']}</td>";
						
						$table .= "</tr>";
					}

					

				}else{

					$errors=array();
					$errors[0]="Users are not available!";
					$style =  'style="background-color: red;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';
				}
			}else{
				$errors=array();
				$errors[0]="Query error! Thable is not available.";
				$style =  'style="background-color: red;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';
			}

 		}elseif ($_POST['select_by']=="researchers") {
 			$type="Researcher";

 			$query = "SELECT * FROM users WHERE user_type='{$type}'";
			$result = mysqli_query($connection,$query);

			if($result){

				if(mysqli_num_rows($result)>0){
					$errors=array();
					$errors[0]=mysqli_num_rows($result)." record(s) availbale.";
					$style =  'style="background-color: green;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';

					while ($list = mysqli_fetch_assoc($result)) {
						$table .= "<tr>";
						$table .= "<td>{$list['user_id']}</td>";
						$table .= "<td>{$list['user_type']}</td>";
						$table .= "<td>{$list['salutation']}</td>";
						$table .= "<td>{$list['name_initial']}</td>";
						$table .= "<td>{$list['institute']}</td>";
						$table .= "<td>{$list['phone_no']}</td>";
						$table .= "<td>{$list['email']}</td>";
						$table .= "<td>{$list['add_line1']}</td>";
						$table .= "<td>{$list['add_line2']}</td>";
						$table .= "<td>{$list['add_line3']}</td>";
						$table .= "<td>{$list['accommodation']}</td>";
						$table .= "<td>{$list['food_type']}</td>";
						
						$table .= "</tr>";
					}

					

				}else{

					$errors=array();
					$errors[0]="Users are not available!";
					$style =  'style="background-color: red;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';
				}
			}else{
				$errors=array();
				$errors[0]="Query error! Thable is not available.";
				$style =  'style="background-color: red;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';
			}
 		}

 	}

  ?>


  <?php 

  	if(isset($_POST['select_user'])){
  		$search = $_POST['text_search'];
  		$search .="_%_%"; 
  		$query = "SELECT * FROM users WHERE name_initial LIKE '{$search}'";
			$result = mysqli_query($connection,$query);

			if($result){

				if(mysqli_num_rows($result)>0){
					$errors=array();
					$errors[0]=mysqli_num_rows($result)." record(s) availbale.";
					$style =  'style="background-color: green;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';

					while ($list = mysqli_fetch_assoc($result)) {
						$table .= "<tr>";
						$table .= "<td>{$list['user_id']}</td>";
						$table .= "<td>{$list['user_type']}</td>";
						$table .= "<td>{$list['salutation']}</td>";
						$table .= "<td>{$list['name_initial']}</td>";
						$table .= "<td>{$list['institute']}</td>";
						$table .= "<td>{$list['phone_no']}</td>";
						$table .= "<td>{$list['email']}</td>";
						$table .= "<td>{$list['add_line1']}</td>";
						$table .= "<td>{$list['add_line2']}</td>";
						$table .= "<td>{$list['add_line3']}</td>";
						$table .= "<td>{$list['accommodation']}</td>";
						$table .= "<td>{$list['food_type']}</td>";
						
						$table .= "</tr>";
					}

					

				}else{

					$errors=array();
					$errors[0]="Users are not available!";
					$style =  'style="background-color: red;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';
				}
			}else{
				$errors=array();
				$errors[0]="Query error! Thable is not available.";
				$style =  'style="background-color: red;padding: 5px; color: white;padding-left: 20px;border-radius: 4px"';
			}

  	}

   ?>



	
<div style="padding-top: 75px">

<div class="jumbotron" style=" padding: 20px;background-color: white">
	<div class="row"> <!--START row 1-->
		
		
		<div class="col-sm-12" style="border: ridge; padding: 20px">
			<h2 class="text-center">USER DETAILS</h2>
			<hr style="background-color: black">


						<div class="row">
       		 	
          		<div class="col-sm-12" >

<a href=""></a>
                  

                    	<div style="padding-bottom: 5px">
                    		<form class="form-inline" method="post" action="users.php">

                    			<div class="col-sm-4" <?php echo $style; ?>">
                    				<h5>Message : <?php echo $errors[0]; ?></h5>
                    			</div>

	                    		<div class="col-sm-4">
	                    			SELECT : &nbsp<select name="select_by" class="form-control">
					              <option value="all">ALL USERS</option>
					              <option value="researchers">ALL RESEARCHERS</option>
					              <option value="participants">ALL PARTICIPANTS</option>
				            	</select>&nbsp
				            	<button type="submit" name="load_users" class="btn btn-primary" style="width: 70px">Sort</button>&nbsp&nbsp
	                    		</div>

               					<div class="col-sm-4" style="float: right">
	               					<button type="submit" name="select_user" class="btn btn-primary" style="width: 70px;float: right;width: 100px">Search</button>&nbsp&nbsp
	                      			<input class="form-control mr-sm-2" name="text_search" type="text" placeholder="search name here" style="max-width:300px; float: right;">
	                    		</div>
               					
                    		</form>
                    	</div>

                    	</div>
                    	
                    	<div style="padding: 5px"></div>
                    	<div class="table-responsive">
                    		<table class="table table-bordered">
  						  <thead>
  						    <tr>
  						      <th>USER ID</th>
  						      <th>USER TYPE</th>
  						      <th>DESIGNATION</th>
  						      <th>FULL NAME</th>
  						      <th>ORAGANIZATION</th>
  						      <th>PHONE NO</th>
  						      <th>EMAIL</th>
  						      <th>ADDRESS LINE 1</th>
  						      <th>ADDRESS LINE 2</th>
  						      <th>ADDRESS LINE 3</th>
  						      <th>ACCOMMODATION</th>
  						      <th>FOOD TYPE</th>



						      </tr>
						    </thead>
						    <tbody>
						      <?php echo $table; ?>
						    </tbody>
						  </table>
                    	</div>
             
  						
						

          		</div>

        		
      		</div>


  
		</div>	
		
	</div><!-- END row 1-->
</div>
</div>







 <?php require_once("includes/admin_footer.php"); ?>