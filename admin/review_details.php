<!--after cording oparater's review detail page coppy to this page-->
<?php 	require_once("../includes/redirect_admin.php") ?>
<?php 	require_once("includes/admin_header.php"); ?>
<?php   require_once("includes/admin_navbar.php"); ?>
<?php   require_once("../includes/connection.php") ?>



<?php 
 //Table Load
$errors=array();
 $list3 = '';
 if(!isset($_POST['status'])){

    $query5 = "SELECT * FROM review_details";
     $result_rev_dtl = mysqli_query($connection,$query5);


     if($result_rev_dtl){
             $errors=array();
             $errors[0] = "Available results.";
        if(mysqli_num_rows($result_rev_dtl)>0){
              $errors=array();
              $errors[0] = mysqli_num_rows($result_rev_dtl)."Available results.";

            while ($dataset3 = mysqli_fetch_assoc($result_rev_dtl)){
                $list3 .= "<tr>";
                $list3 .= "<td>{$dataset3['review_id']}</td>";
                $list3 .= "<td>{$dataset3['added_date']}</td>";
                $list3 .= "<td>{$dataset3['reviewer_name']}</td>";
                $list3 .= "<td>{$dataset3['paper_id']}</td>";
                $list3 .= "<td>{$dataset3['status']}</td>";
                $list3 .= "<td>{$dataset3['notes']}</td>";
                $list3 .= "</tr>";

            }

        }else{
          $errors=array();
          $errors[0]="There is not available results!";
        }

     }else{
      $errors=array();
       $errors[0] = "Query Error";
     }


 }



  ?>


  <?php   

    if(isset($_POST['sort'])){

      
        if($_POST['status']=="accepted"){
            
          
          $st = "Accepted";
          $query5 = "SELECT * FROM review_details WHERE status = '{$st}'";
          $result_rev_dtl = mysqli_query($connection,$query5);

       if($result_rev_dtl){

          if(mysqli_num_rows($result_rev_dtl)>0){
              $errors=array();
              $errors[0] = mysqli_num_rows($result_rev_dtl)." Available results.";

              while ($dataset3 = mysqli_fetch_assoc($result_rev_dtl)){
                  $list3 .= "<tr>";
                  $list3 .= "<td>{$dataset3['review_id']}</td>";
                  $list3 .= "<td>{$dataset3['added_date']}</td>";
                  $list3 .= "<td>{$dataset3['reviewer_name']}</td>";
                  $list3 .= "<td>{$dataset3['paper_id']}</td>";
                  $list3 .= "<td>{$dataset3['status']}</td>";
                  $list3 .= "<td>{$dataset3['notes']}</td>";
                  $list3 .= "</tr>";

              }

          }else{
            $errors=array();
            $errors[0]="There is not available results!";
          }

       }else{
        $errors=array();
         $errors[0] = "Query Error";
       }

        }elseif($_POST['status']=="pending"){
            $errors=array();
         $errors[0] = "Available results.";
          
          $st = "Pending";
          $query5 = "SELECT * FROM review_details WHERE status = '{$st}'";
       $result_rev_dtl = mysqli_query($connection,$query5);

       if($result_rev_dtl){

          if(mysqli_num_rows($result_rev_dtl)>0){
              $errors=array();
              $errors[0] = mysqli_num_rows($result_rev_dtl)." Available results.";

              while ($dataset3 = mysqli_fetch_assoc($result_rev_dtl)){
                  $list3 .= "<tr>";
                  $list3 .= "<td>{$dataset3['review_id']}</td>";
                  $list3 .= "<td>{$dataset3['added_date']}</td>";
                  $list3 .= "<td>{$dataset3['reviewer_name']}</td>";
                  $list3 .= "<td>{$dataset3['paper_id']}</td>";
                  $list3 .= "<td>{$dataset3['status']}</td>";
                  $list3 .= "<td>{$dataset3['notes']}</td>";
                  $list3 .= "</tr>";

              }

          }else{
            $errors=array();
            $errors[0]="There is not available results!";
          }

       }else{
        $errors=array();
         $errors[0] = "Query Error";
       }

        }else{
          $errors=array();
           $list3 = '';
           

              $query5 = "SELECT * FROM review_details";
               $result_rev_dtl = mysqli_query($connection,$query5);


               if($result_rev_dtl){
                       $errors=array();
                       $errors[0] = "Available results.";
                  if(mysqli_num_rows($result_rev_dtl)>0){
                        $errors=array();
                        $errors[0] = mysqli_num_rows($result_rev_dtl)." Available results.";

                      while ($dataset3 = mysqli_fetch_assoc($result_rev_dtl)){
                          $list3 .= "<tr>";
                          $list3 .= "<td>{$dataset3['review_id']}</td>";
                          $list3 .= "<td>{$dataset3['added_date']}</td>";
                          $list3 .= "<td>{$dataset3['reviewer_name']}</td>";
                          $list3 .= "<td>{$dataset3['paper_id']}</td>";
                          $list3 .= "<td>{$dataset3['status']}</td>";
                          $list3 .= "<td>{$dataset3['notes']}</td>";
                          $list3 .= "</tr>";

                      }

                  }else{
                    $errors=array();
                    $errors[0]="There is not available results!";
                  }

               }else{
                $errors=array();
                 $errors[0] = "Query Error";
               }


 
        }

      }

   ?>




	
<div style="padding-top: 75px">

<div class="container fluid padding" style=" padding: 5px">
	<div class="row"> <!--START row 1-->
		
		<div class="col-sm-1"></div>
		<div class="col-sm-12" style="border: ridge; padding: 10px">
			<h2 class="text-center">REVIEW DETAIL TABLE</h2>
			<hr style="background-color: black">


			<div class="row">
       		 	<div class="col-sm-1"></div>
          		<div class="col-sm-10" id="divtab">


                  
                      <div class="row">
                        <div class="col-sm-8">
                          <h4 style="color: white;background-color: green; padding: 5px;border-radius: 4px"><?php  echo $errors[0];?></h4>
                        </div>
                        <div class="col-sm-4">
                          <form class="form-inline" method="post" action="review_details.php" style="float: right;">

                            <select class="form-control" name="status" id="sel1" style="min-width: 150px; max-width: 300px;">
                              <option value="all_papers">All Papers</option>
                              <option value="accepted">Accepted</option>
                              <option value="pending">Pending</option>
                            </select>&nbsp

                            <button class="btn btn-primary" type="submit" name="sort" style="width: 70px">Sort</button>
                          
                          </form>
                        </div>
                      </div>

                    	<div class="row">

                        

                        
                        
                      </div>

                      <br><br>
             <div class="table-responsive">
               <table class="table table-bordered">
               
                    <tr>
                    <th>REVIEW ID</th>
                    <th>ADDED DATE/TIME</th>
                    <th>REVIEWER NAME</th>
                    <th>PAPER ID</th>
                    <th>STATUS</th>
                    <th>NOTES</th>
                  </tr>
                
                <?php echo $list3; ?>
              </table>
             </div>
  						
						

          		</div>

        		<div class="col-sm-1"></div>
      		</div>

		</div>	
		<div class="col-sm-1"></div>
	</div><!-- END row 1-->
</div>
</div>

 <?php require_once("includes/admin_footer.php"); ?>