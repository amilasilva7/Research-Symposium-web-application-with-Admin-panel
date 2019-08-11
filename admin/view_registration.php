<?php 	require_once("../includes/redirect_admin.php") ?>
<?php 	require_once("includes/admin_header.php"); ?>
<?php   require_once("includes/admin_navbar.php"); ?>
<?php   require_once("../includes/connection.php"); ?>


<?php 
	
	$query = "SELECT * FROM users WHERE user_type = 'Researcher'";
	$result = mysqli_query($connection,$query);
	if($result){
		$researcher = mysqli_num_rows($result);
	}

	$query = "SELECT * FROM users WHERE user_type = 'Participant'";
	$result = mysqli_query($connection,$query);
	if($result){
		$participant = mysqli_num_rows($result);
	}

	$query = "SELECT * FROM users WHERE food_type = 'Vegetarian'";
	$result = mysqli_query($connection,$query);
	if($result){
		$Vegetarian = mysqli_num_rows($result);
	}

	$query = "SELECT * FROM users WHERE food_type = 'Dairy free'";
	$result = mysqli_query($connection,$query);
	if($result){
		$dairy_free = mysqli_num_rows($result);
	}

	$query = "SELECT * FROM users WHERE food_type = 'Gluten free'";
	$result = mysqli_query($connection,$query);
	if($result){
		$gluten_free = mysqli_num_rows($result);
	}

	$query = "SELECT * FROM users WHERE food_type = 'Halal'";
	$result = mysqli_query($connection,$query);
	if($result){
		$halal = mysqli_num_rows($result);
	}

 ?>

	
<div style="padding-top: 75px"> </dir>

<div class="container fluid padding" style=" padding: 5px">
	<div class="row"> <!--START row 1-->
		
		<div class="col-sm-1"></div>

		<div class="col-sm-12" style="border: ridge; padding: 10px">
			<h2 class="text-center">USER SUMMARY</h2>
			<hr style="background-color: black">
    		
    			<div class="row">

       		 	<div class="col-sm-1"></div>

          		<div class="col-sm-10" id="divtab" style="padding-bottom: 100px;padding-top: 30px">
					<button class="btn btn-danger" id="sumBtn" onclick="showSum()" style="display: none">Show Summary</button>

          			<div id="sumDiv" class="row" style="background-color: #FAFAD2; border: ridge; padding: 40px;">
          				<div class="col-sm-5" style="padding: 10px">
          					<form>
          						<h4>REGISTERED PEOPLE</h4>
          						<hr style="background-color: red">
	          					<label><h6>NUMBER OF RESEARCHERS : </h6></label> <label style="float: right"><h6><?php echo $researcher; ?></h6></label>
	          					<label><h6>NUMBER OF PARTICIPANTS : </h6></label> <label style="float: right"><h6><?php echo $participant; ?></h6></label>
	          					<hr style="background-color: red">
	          					<label><h6>TOTAL REGISTERED PEOPLE : </h6></label> <label style="float: right"><h6><?php echo $researcher+$participant; ?></h6></label>
	          					<hr style="background-color: red">
	          					<hr style="background-color: red">

          					</form>
	          			</div>

	          			<div class="col-sm-2"></div>

	          			<div class="col-sm-5" style="padding: 10px;">
          					
          						<h4>DIETARY SUMMARY</h4>
          						<hr style="background-color: red">
	          					<label><h6>NUMBER OF DAIRY FREE &nbsp &nbsp &nbsp  : &nbsp  </h6></label>

	          					<label style="float: right;"><h6><?php echo $dairy_free; ?></h6></label>&nbsp &nbsp

	          					<label><h6>NUMBER OF VEGITARIANS &nbsp : &nbsp  </h6></label>

	          					<label style="float: right;"><h6><?php echo $Vegetarian; ?></h6></label>&nbsp &nbsp

	          					<label><h6>NUMBER OF HALAL &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp  : &nbsp </h6></label>

	          					<label style="float: right;"><h6><?php echo $halal; ?></h6></label>&nbsp&nbsp

	          					<label><h6>NUMBER OF GLUTEN FREE &nbsp : &nbsp  </h6></label>

	          					<label style="float: right;"><h6><?php echo $gluten_free; ?></h6></label>&nbsp 
	          					&nbsp
	          					<hr style="background-color: red"><hr style="background-color: red">
          					
          				</div>
          				
          				
          			</div>

                    

          		</div>

        		<div class="col-sm-1"></div>
      		</div>
  
		
		<div class="col-sm-1"></div>
	</div><!-- END row 1-->
</div>
</div>


<script>
	function showSum(){
		var div = document.getElementById("sumDiv");
		var sumbtn = document.getElementById("sumBtn");

		div.style.display = "block";
		sumbtn.style.display = "none";
	}
</script>

<script>
	function hideSum(){
		var div = document.getElementById("sumDiv");
		var sumbtn = document.getElementById("sumBtn");

		div.style.display = "none";
		sumbtn.style.display = "block";
	}
</script>




 <?php require_once("includes/admin_footer.php"); ?>