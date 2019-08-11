<?php 	require_once("../includes/redirect_admin.php") ?>
<?php 	require_once("includes/oparate_header.php"); ?>
<?php   require_once("includes/oparate_navbar.php"); ?>
<?php   require_once("../includes/connection.php") ?>


<?php 
	
	$msg = "";

	if(isset($_POST['publish'])){
		$title = $_POST['title'];
		$heading = $_POST['heading'];
		$description = $_POST['description'];
		$description2 = $_POST['description2'];


		$query = "INSERT INTO news(title,heading,discrip,descrip_2,date_time) VALUES('$title','$heading','$description','$description2',NOW())";
		$result = mysqli_query($connection,$query);

		if($result){
			$msg = "News published successfully!";
		}else{
			$msg = "News Not published!";
		}

	}

 ?>

	
<div style="padding-top: 75px">
	<hr style="background-color: black">
<div class="container fluid padding" style=" padding: 5px">
	<div class="row"> <!--START row 1-->
		
		
		<div class="col-sm-12" style="border: ridge; padding: 20px">
			<h2 class="text-center">UPDATE NEWS</h2>
			
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8" style="background-color: green; color: white;padding: 5px;border-radius: 5px">
					<h6><?php echo "$msg"; ?></h6>
				</div>
				<div class="col-sm-2"></div>
			</div>
			<br>

			<div class="row">
				<div class="col-sm-2"></div>

				<div class="col-sm-8">
					
					<form action="update_news.php" method="post" style="padding-bottom: 60px">
               
		    				<div class="form-group">
		    					<label>TITLE: </label>
		      					<input type="text" autofocus="" value="" name="title" maxlength="50" required="" class="form-control" id="usr" placeholder="New Session Name">
		    				</div>

		    				<div class="form-group">
		    					<label>HEADING: </label>
		      					<textarea name="heading" required="" rows="2" class="form-control" minlength="25" maxlength="100" placeholder="type news heading here" style="border-col black"></textarea>
		      					<label style="color: red">* length 25-100 </label>
		    				</div>


			                 <div class="form-group">
				                  <label for="comment">Description Line 01</label>
				                  <textarea class="form-control" placeholder="Type news here" rows="3" maxlength="500" minlength="100" name="description" required=""></textarea>
				                  <label style="color: red">* length 100-500 </label>
				             </div>

				             <div class="form-group">
				                  <label for="comment">Description Line 02</label>
				                  <textarea class="form-control" placeholder="Type news here" rows="3" maxlength="500" minlength="100" name="description2" required=""></textarea>
				                  <label style="color: red">* length 100-500 </label>
				             </div>
		                
				              <div>
				                  <button class="btn btn-success" type="submit" name="publish" style="float: right;color: white;">PUBLISH NEWS</button>
				              </div>

		  			</form>

				</div>

				<div class="col-sm-2"></div>
				
			</div>


  
		</div>	
		
	</div><!-- END row 1-->
</div>
</div>







 <?php require_once("includes/oparate_footer.php"); ?>