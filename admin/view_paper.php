<?php 	require_once("../includes/redirect_admin.php") ?>
<?php 	require_once("includes/admin_header.php"); ?>
<?php   require_once("includes/admin_navbar.php"); ?>
<?php   require_once("../includes/connection.php") ?>

<?php 
 //Table Load
 $list3 = '';
 $msgg="";
if(!isset($_POST['search'])){


 $query5 = "SELECT * FROM full_papers";
 $result_rev_dtl = mysqli_query($connection,$query5);

 if($result_rev_dtl){
    if(mysqli_num_rows($result_rev_dtl)>0){
        while ($dataset3 = mysqli_fetch_assoc($result_rev_dtl)){
            $list3 .= "<tr>";
            $list3 .= "<td>{$dataset3['paper_id']}</td>";
            $list3 .= "<td>{$dataset3['category_name']}</td>";
            $list3 .= "<td>{$dataset3['user_id']}</td>";
            $list3 .= "<td>{$dataset3['title']}</td>";
            $list3 .= "<td>{$dataset3['subject_area']}</td>";
            $list3 .= "<td>{$dataset3['reviewer_name']}</td>";
            $list3 .= "<td>{$dataset3['result']}</td>";
            $list3 .= "<td>{$dataset3['submit_date']}</td>";
            $list3 .= "<td>{$dataset3['pdf_name']}</td>";
            $list3 .= "</tr>";

        }

    }else{
      $errors[]="There is not available results!";
    }

 }else{
   $errors[] = "Query Error";
 }

}


  ?>








<?php 

	if(isset($_POST['search'])){
		
		$inp_id = $_POST['input_id'];

		$query_search = "SELECT * FROM full_papers WHERE user_id LIKE '{$inp_id}'";
		$result_search = mysqli_query($connection,$query_search);

		if($result_search){
			
			if(mysqli_num_rows($result_search)>0){

				$msg = mysqli_num_rows($result_search)." Results available!";

				while ($dataset4 = mysqli_fetch_assoc($result_search)){
		            $list3 .= "<tr>";
		            $list3 .= "<td>{$dataset4['paper_id']}</td>";
		            $list3 .= "<td>{$dataset4['category_name']}</td>";
		            $list3 .= "<td>{$dataset4['user_id']}</td>";
		            $list3 .= "<td>{$dataset4['title']}</td>";
		            $list3 .= "<td>{$dataset4['subject_area']}</td>";
		            $list3 .= "<td>{$dataset4['reviewer_name']}</td>";
		            $list3 .= "<td>{$dataset4['result']}</td>";
		            $list3 .= "<td>{$dataset4['submit_date']}</td>";
		            $list3 .= "<td>{$dataset4['pdf_name']}</td>";
		            $list3 .= "</tr>";

		        }

			}else{
				$msg = "0 Results available!";
			}
		}
	}

	if(isset($search2)){

		if($result_rev_dtl){
    if(mysqli_num_rows($result_rev_dtl)>0){
        while ($dataset3 = mysqli_fetch_assoc($result_rev_dtl)){
            $list3 .= "<tr>";
            $list3 .= "<td>{$dataset3['paper_id']}</td>";
            $list3 .= "<td>{$dataset3['category_name']}</td>";
            $list3 .= "<td>{$dataset3['user_id']}</td>";
            $list3 .= "<td>{$dataset3['title']}</td>";
            $list3 .= "<td>{$dataset3['subject_area']}</td>";
            $list3 .= "<td>{$dataset3['reviewer_name']}</td>";
            $list3 .= "<td>{$dataset3['result']}</td>";
            $list3 .= "<td>{$dataset3['submit_date']}</td>";
            $list3 .= "<td>{$dataset3['pdf_name']}</td>";
            $list3 .= "</tr>";

        }

    }else{
      $errors[]="There is not available results!";
    }

 }else{
   $errors[] = "Query Error";
 }

	}

 ?>





	
<div style="padding-top: 75px">

<div class="container fluid padding" style=" padding: 5px">

	<div class="row"> <!--START row 1-->
		
		
		<div class="col-sm-12" style="border: ridge; padding: 20px">
			<h2 class="text-center">FULL PAPERS</h2>
			<hr style="background-color: black">

			      

			      	<div class="row" style="padding-left: 16px">
				      	<div class="col-sm-5" style="background-color: green; color: white; border-radius: 4px;padding: 5px;padding-left: 20px">

	                    <h5>Message : <?php if(isset($_POST['search'])){echo $msg; echo $msgg;}  ?></h5>  

	                    </div>
	                    
	                    <div class=" form-inline col-sm-1">
	                    	
	                    </div>
	               		<div class="col-sm-4 " >

<!------------------------------------------------FORM START---------------------------------------------------------->

	               			<form class="form-inline" action="view_paper.php" method="post">

		               			<input class="form-control" type="text" required="" name="input_id" placeholder="Search by user id here">

		               			&nbsp&nbsp&nbsp&nbsp<button class="btn btn-success" style="width: 100px" name="search" type="submit">Search</button>
		               		</form>
		               	</div>

		               	<div class="col-sm-2">
		               		<form action="view_paper.php" method="post">
		               			&nbsp&nbsp&nbsp&nbsp&nbsp<button class="btn btn-danger" style="width: 120px" name="search2" type="submit">View all</button>
		               		</form>
                        </div>
<!------------------------------------------------FORM END---------------------------------------------------------->

	               		
			      	</div>
                   <br>
      
				  <table class="table table-bordered" style="border: ridge;">
				    
				      <tr>
				        <th>PAPER ID</th>
				        <th>CATEGORY</th>
				        <th>USER ID</th> <!--SHOULD TAKE USING REG ID-->
				        <th>TITLE</th><!--SHOULD TAKE USING REG ID-->
				        <th>SUBJECT AREA</th>
				        <th>REVIEWER NAME</th>
				        <th>RESULT STATUS</th>
				        <th>DATE AND TIME</th>
				        <th>FILE NAME</th>
				      </tr>

				      <?php echo $list3; ?>
				   
				  </table>
				  
				</div>
				  
		</div>	
		
	</div><!-- END row 1-->

</div>








 <?php require_once("includes/admin_footer.php"); ?>