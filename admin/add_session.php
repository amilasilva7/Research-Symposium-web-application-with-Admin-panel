<?php   require_once("../includes/redirect_admin.php") ?>
<?php 	require_once("includes/admin_header.php"); ?>
<?php   require_once("includes/admin_navbar.php"); ?>
<?php   require_once("../includes/connection.php") ?>


<?php 

  
  

  $style=' style="background-color: green; color: white;padding:10px"';
  $style2 = 'style="padding: 10px;background-color: white;color: white"';
  $errors=array();
  $errors[0]="Welcome!";

  if(isset($_POST['save'])){

    $query = "SELECT session_name FROM sessions WHERE session_name='{$_POST['name']}'";
    $result = mysqli_query($connection,$query);

    if($result){
       
       if(mysqli_num_rows($result)){

        $style=' style="background-color: red; color: white;padding:10px"';
        $style2 = 'style="padding: 10px;background-color: #dd2c00;color: white"';
        $errors=array();
        $errors[0]="This session name is already exist!";

          $name = $_POST['name'];
          $venue = $_POST['venue'];
          $category = $_POST['category'];
          $date = $_POST['date'];
          $begintime = $_POST['begintime'];
          $endtime = $_POST['endtime'];


        }else{
          $style2 = 'style="padding: 10px;background-color:#007E33;color: white"';
          $name = $_POST['name'];
          $venue = $_POST['venue'];
          $category = $_POST['category'];
          $date = $_POST['date'];
          $begintime = $_POST['begintime'];
          $endtime = $_POST['endtime'];

          if($date>date("Y-m-d")){
            if($endtime>$begintime){

              $query = "INSERT INTO sessions(session_name,
                session_date,
                venue,
                category,
                begin_time,
                end_time) 
                VALUES('$name',
                        '$date',
                        '$venue',
                        '$category',
                        '$begintime',
                        '$endtime')";

              $result = mysqli_query($connection,$query);
              if($result){
                $errors[0]="New Session Successfully added!";
              }


            }else{
              $style=' style="background-color: red; color: white;padding:10px"';
              $errors[0]="You select a invalid time";
              $style2 = 'style="padding: 10px;background-color: green;color: white"';


              $name = $_POST['name'];
              $venue = $_POST['venue'];
              $category = $_POST['category'];
              $date = $_POST['date'];
              $begintime = $_POST['begintime'];
              $endtime = $_POST['endtime'];
            }

          }else{
            $style=' style="background-color: red; color: white;padding:10px"';
             $style2 = 'style="padding: 10px;background-color: #dd2c00;color: white"';

            $errors[0]="You select a invalid date";

              $name = $_POST['name'];
          $venue = $_POST['venue'];
          $category = $_POST['category'];
          $date = $_POST['date'];
          $begintime = $_POST['begintime'];
          $endtime = $_POST['endtime'];
          }


        
        }
     }else{

       $errors=array();
       $errors[0]="Query error. [table not available]";

     }
  }else{
  $name = 'Name';
  $venue = 'Venue';
  $category = '';
  $date = date("Y-m-d");
  $begintime = date("12:00");
  $endtime = date("12:00");
  }


 ?>

	
<div style="padding-top: 85px">
	
<div class="container fluid padding" style=" padding: 5px">
	<div class="row"> <!--START row 1-->
		
		<div class="col-sm-2"></div>
		<div class="col-sm-8" style="border: ridge; padding: 30px;">
			<h2 class="text-center">ADD SESSIONS <span><a href="session.php"><button class="btn btn-primary" style="float: right">View Sessions</button></a></span></h2>
			<hr style="background-color: black">
      <div <?php echo $style; ?>>
        <h5><?php echo $errors[0];

         ?></h5>
         
         
      </div>
      <div <?php echo $style2; ?>>
          <?php 
              if(isset($_POST['save'])){
                echo "Session Name     : ".$name.'<br>';
                echo "Session Venue    : ".$venue.'<br>';
                echo "Session Category : ".$category.'<br>';
                echo "Session date     : ".$date.'<br>';
                echo "Session Venue    : ".$begintime.'<br>'; 
                echo "Session Venue    : ".$endtime.'<br>'; 
              }
          ?>
      </div>
				
				<form action="add_session.php" method="post" style="padding-bottom: 60px">
               
    				<div class="form-group">
    					<label>NEW SESSION NAME: </label>
      					<input type="text" autofocus="" value=<?php echo $name; ?> name="name" required="" class="form-control" id="usr" placeholder="New Session Name" style="border-color: black">
    				</div>

    				<div class="form-group">
    					<label>SESSION VENUE: </label>
      					<input type="text" name="venue" required="" class="form-control" value=<?php echo $venue.""; ?> id="usr" placeholder="Session Venue"style="border-col black">
    				</div>

             	<div>
              	 <label>SELECT CATEGORY ID: </label>
              	 <select class="form-control" id="sel1" name="category" required="">
                   <option value="Information Technology">Information Technology</option>";
                   <option value="Hospitality Management">Hospitality Management</option>";
                   <option value="Management">Management</option>";
                   <option value="Accountancy">Accountancy</option>";
                </select>
              </div>

              <div class="form-group">
                 <label>BEGIN DATE: </label>
                  <input class="form-control" name="date" value=<?php echo $date; ?> type="Date" required="">

                  <label>BEGIN TIME :</label>
                  <input class="form-control" type="time" value=<?php echo $begintime; ?>  name="begintime" required="">

                  <label>END TIME:</label>
                  <input class="form-control"  type="time" value=<?php echo $endtime; ?> name="endtime" required="">
              </div>    

              <div>
                  <button class="btn btn-success" type="submit" name="save" style="float: right;color: white;">SAVE SESSION</button>
              </div>

  			</form>

		</div>
		<div class="col-sm-2"></div>	
		
	</div><!-- END row 1-->
</div>
</div>



 <?php require_once("includes/admin_footer.php"); ?>