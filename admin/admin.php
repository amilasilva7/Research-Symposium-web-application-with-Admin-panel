<?php 	require_once("../includes/redirect_admin.php") ?>
<?php require_once("../includes/connection.php") ?>
<?php require_once("includes/admin_header.php"); ?>
<?php require_once("includes/admin_navbar.php"); ?>

<!----------------------------------------------------------------->
<?php 

	$user_list = '';
	$query_recods = "SELECT * FROM log_records";
	

	$errors = array();

	$result = mysqli_query($connection,$query_recods);
	

	if(mysqli_num_rows($result)>0){
		while ($user = mysqli_fetch_assoc($result)) {

			$user_list .= "<tr>";

			$user_list .= "<td>{$user['record_id']}</td>";
			$user_list .= "<td>{$user['user_id']}</td>";
			$user_list .= "<td>{$user['name_initial']}</td>";
			$user_list .= "<td>{$user['in_date']}</td>";
			$user_list .= "<td>{$user['in_time']}</td>";

			$user_list .= "</tr>";
		}

	}else{
		$errors[] = "Not availbe record!";
	}
 ?>
<!----------------------------------------------------------------->
	



<div style="padding-top: 75px">

<div class="container fluid padding" style=" padding: 5px">

	<div class="row">
			
	</div>

	<div class="row"> <!--START row 1-->
		
		
		<div class="col-sm-12" style="border: ridge; padding: 20px">
			<h2 class="text-center">lOG RECORDS</h2>
			<hr style="background-color: black">

				<div class="table-responsive">
					<table class="table table-striped">
					<tr>
						<th>Record ID</th>
						<th>User ID</th>
						<th>User Description</th>
						<th>Logged Date</th>
						<th>Logged Time</th>
					</tr>

					<?php echo $user_list; ?>
				</table>	
				</div>
				
  
		</div>	
		
	</div><!-- END row 1-->
</div>
</div>







 <?php require_once("includes/admin_footer.php"); ?>