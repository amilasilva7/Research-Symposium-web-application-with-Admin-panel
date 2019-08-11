<?php   require_once("../includes/redirect_admin.php") ?>
<?php 	require_once("includes/admin_header.php"); ?>
<?php   require_once("includes/admin_navbar.php"); ?>
<?php   require_once("../includes/connection.php") ?>

<?php 
    //SET SESSIONS LIST

  $errors = array();

  $list_session = '';
  $query1 = "SELECT * FROM sessions";
  $result_rew = mysqli_query($connection,$query1);

  if($result_rew){
    
    if(mysqli_num_rows($result_rew)>0){
      while($dataset = mysqli_fetch_assoc($result_rew)){

        $list_session .= "<option>{$dataset['session_name']}</option>";
      }
    }

  }else{
    $errors[]="Not available sessions!";
  }

 ?>

	
  <?php 
    $query = "SELECT * FROM attendance_rocord";
    $result = mysqli_query($connection,$query);
    $errors=array();
    $list = '';
    if($result){
      if(mysqli_num_rows($result)>0){
        $errors=array();
        $errors[0]= mysqli_num_rows($result)." Record(s) Found!";
        while ($user=mysqli_fetch_assoc($result)) {
          $list .= "<tr>";

          $list .= "<td>{$user['record_id']}</td>";
          $list .= "<td>{$user['user_id']}</td>";
          $list .= "<td>{$user['user_name']}</td>";
          $list .= "<td>{$user['session_id']}</td>";
          $list .= "<td>{$user['datetimes']}</td>";

          $list .= "</tr>";
        }
      }else{
        $errors=array();
        $errors[0]="Not available any records to display!";
      }
    }else{
      $errors=array();
      $errors[0]="Not Success";
    }
   ?>


   <?php 

    if(isset($_POST['search'])){

      if($_POST['session']=="all"){

          $query = "SELECT * FROM attendance_rocord";
          $result = mysqli_query($connection,$query);
          $errors=array();
          $list = '';
          if($result){
            if(mysqli_num_rows($result)>0){
              $errors=array();
              $errors[0]= mysqli_num_rows($result)." Record(s) Found!";
              while ($user=mysqli_fetch_assoc($result)) {
                $list .= "<tr>";

                $list .= "<td>{$user['record_id']}</td>";
                $list .= "<td>{$user['user_id']}</td>";
                $list .= "<td>{$user['user_name']}</td>";
                $list .= "<td>{$user['session_id']}</td>";
                $list .= "<td>{$user['datetimes']}</td>";

                $list .= "</tr>";
              }
            }else{
              $errors=array();
              $errors[0]="Not available any records to display!";
            }
          }else{
            $errors=array();
            $errors[0]="Not Success";
          }

            }else{


              $query_sess = "SELECT * FROM sessions WHERE session_name = '{$_POST['session']}'";
              $result_sess = mysqli_query($connection,$query_sess);

              if(mysqli_num_rows($result_sess)==1){
                $sess_list = mysqli_fetch_assoc($result_sess);

                $sess_id = $sess_list['session_id'];
              }





                $query = "SELECT * FROM attendance_rocord WHERE session_id = '{$sess_id}'";
                $result = mysqli_query($connection,$query);
                $errors=array();
                $list = '';
                if($result){
                  if(mysqli_num_rows($result)>0){
                    $errors=array();
                    $errors[0]= mysqli_num_rows($result)." Record(s) Found!";
                    while ($user=mysqli_fetch_assoc($result)) {
                      $list .= "<tr>";

                      $list .= "<td>{$user['record_id']}</td>";
                      $list .= "<td>{$user['user_id']}</td>";
                      $list .= "<td>{$user['user_name']}</td>";
                      $list .= "<td>{$user['session_id']}</td>";
                      $list .= "<td>{$user['datetimes']}</td>";

                      $list .= "</tr>";
                    }
                  }else{
                    $errors=array();
                    $errors[0]="Not available any records to display!";
                  }
                }else{
                  $errors=array();
                  $errors[0]="Not Success";
                }


            }
    }


    ?>


<div style="padding-top: 75px">

<div class="container fluid padding" style=" padding: 5px">
	<div class="row"> <!--START row 1-->
		
		<div class="col-sm-1"></div>
		<div class="col-sm-12" style="border: ridge; padding: 10px">
			<h2 class="text-center">ATTENDANCE SHEET</h2>
			<hr style="background-color: black">

      <div class="col-sm-6" style="background-color: green;padding: 5px;padding-left: 20px;color: white;border-radius: 5px">

        <h5>  <?php echo $errors[0]; 
                    
        ?> </h5>

      </div>

      <form class="form-inline" action="view_attendance.php" method="post" style="float: right">
            SELECT BY SESSION : &nbsp<select class="form-control" name="session" style="float: right;">
              <option value="all">All Sessions</option>
              <?php echo $list_session; ?>
              </select>&nbsp
              
              <button class="btn btn-success" type="submit" name="search">Search</button>
              

      </form> <br><br>
      
  <table class="table table-bordered" style="border: ridge;">

      <tr>
        <th>RECORD ID</th>
        <th>USER ID</th>
        <th>USER NAME</th><!--SHOULD TAKE USING REG ID-->
        <th>SESSION ID</th>
        <th>DATE & TIME</th>
         <!--SHOULD TAKE USING REG ID-->
        
      </tr>
    
    
      <?php echo $list; ?>
    
  </table>
  
		</div>	
		<div class="col-sm-1"></div>
	</div><!-- END row 1-->
</div>
</div>







 <?php require_once("includes/admin_footer.php"); ?>