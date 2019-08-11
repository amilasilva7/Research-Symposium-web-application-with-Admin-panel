<?php   require_once("../includes/redirect_admin.php") ?>
<?php 	require_once("includes/admin_header.php"); ?>
<?php   require_once("includes/admin_navbar.php"); ?>
<?php   require_once("../includes/connection.php"); ?>

<?php 
  
  $items = '';
  $table = '';
  $style = 'style="background-color: green;color: white;padding: 10px;"';
  
  $errors=array();
  $query = "SELECT * FROM sessions";
  $result = mysqli_query($connection,$query);


  if($result){
    if(mysqli_num_rows($result)){
      $errors[0]="found";


      while ($list = mysqli_fetch_assoc($result)){
          $items .= "<option>{$list['session_name']}</option>";

          $table .="<tr>";
        $table .= "<td>{$list['category']}</td>";
        $table .= "<td>{$list['session_name']}</td>";
        $table .= "<td>{$list['venue']}</td>";
        $table .= "<td>{$list['session_date']}</td>";
        $table .= "<td>{$list['begin_time']}</td>";
        $table .= "<td>{$list['end_time']}</td>";
         $table .="</tr>";
      }

      
        
      


    }else{
      $errors=array();
      $errors[0]="Sessions not available!";
      $style = 'style="background-color: red;color: white;padding: 10px;"';
    }
  }

 ?>



 <?php 

  if(isset($_POST['delete'])){
     $query = "SELECT * FROM sessions";
      $result = mysqli_query($connection,$query);


      if($result){
        if(mysqli_num_rows($result)){

          $query_delete = "DELETE FROM sessions WHERE session_name='{$_POST['selected_name']}'";
          $result_delete = mysqli_query($connection,$query_delete);
            if($query_delete){
               $errors=array();
              $errors[0]= "Deleted!";
            }else{
               $errors=array();
              $errors[0]= " Not Deleted!";
            }

            //Load again the list!//
            $items ='';
            while ($list = mysqli_fetch_assoc($result)){
              $items .= "<option>{$list['session_name']}</option>";
            }

        }else{
          $errors=array();
          $errors[0]="Sessions not available!";
          $style = 'style="background-color: red;color: white;padding: 10px;"';
        }
      }
  }

  ?>



	
<div style="padding-top: 75px">

<div class="container fluid padding" style=" padding: 5px">
	<div class="row"> <!--START row 1-->
		
		<!--<div class="col-sm-1"></div>-->
		<div class="col-sm-12" style="border: ridge; padding: 10px">
			<h2 class="text-center">SESSIONS</h2>

			<a href="add_session.php"><button class="btn btn-primary" >ADD NEW SESSION</button></a>
      <a href="session.php"><button class="btn btn-success" style="float: right;">REFRESH</button></a>

<hr style="background-color: black">

        <div class="row">

          <div class="col-sm-7">
            <div <?php echo $style; ?>>
            <h5><?php echo $errors[0]; ?></h5>
              
            </div>
            
          </div>

        <div class="col-sm-5" style="padding: 10px;">
          <form class="form-inline" method="post" action="session.php">

            <label>SELECT SECTION ID : </label>
            <select class="form-control" name="selected_name" id="sel1" style="width: 150px">
              <?php echo $items; ?>
            </select> &nbsp;

            <button class="btn btn-danger" name="delete" type="submit" style="float: right;width: 150px">DELETE</button>

          </form>
          
        </div>
        </div>

  			  <div class="table-responsive">
  			  	<table class="table table-bordered">
        			<thead>
          				<tr>
                  <th>CATEGORY</th>
            			<th>SESSION NAME</th>
            			<th>SESSION VENUE</th>
                  <th>SESSION DATE</th>
            			<th>BEGIN TIME</th>
            			<th>END TIME</th>
          				</tr>
        			</thead>
        			<tbody>
          				<?php echo $table; ?>
        			</tbody>
  			  </table>

  			  </div>
		</div>	
		<!--<div class="col-sm-1"></div>-->
	</div><!-- END row 1-->
</div>
</div>







 <?php require_once("includes/admin_footer.php"); ?>