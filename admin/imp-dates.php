<?php   require_once("../includes/redirect_admin.php") ?>
<?php 	require_once("includes/admin_header.php"); ?>
<?php   require_once("includes/admin_navbar.php"); ?>
<?php   require_once("../includes/connection.php"); ?>


<?php 
  $errors=array();
  $style='style="background-color: #5cb85c;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
  $errors[0]="Messages : ";

  $query = "SELECT * FROM dates WHERE id='1'";
  $result = mysqli_query($connection,$query);
  if($result){
    if(mysqli_num_rows($result)==1){

      $list = mysqli_fetch_assoc($result);
      $d1 = $list['date_1'];
      $d2 = $list['date_2'];
      $d3 = $list['date_3'];
      $d4 = $list['date_4'];
      $d5 = $list['date_5'];
      $d6 = $list['date_6'];
      $d7 = $list['date_7'];
      
    }
  }

 ?>



<?php
  
  


    if(isset($_POST['btn_1'])){
      
      if($_POST['date_1']>date("Y-m-d")){
        
        $query = "UPDATE dates SET date_1='{$_POST['date_1']}' WHERE id='1'";
        $result = mysqli_query($connection,$query);
        if($result){
          $errors=array();
          $errors[0]="Messages : Successfully Published!";

        }else{
          $errors=array();
          $errors[0]="Messages : query error";
          $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
        }

      }else{
        $errors=array();
        $errors[0]="Messages : Inserted date is not valid!";
        $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
      }


    }else if(isset($_POST['btn_2'])){
      
      if($_POST['date_2']>date("Y-m-d") && $_POST['date_2']>=$_POST['date_1']){
        
        $query = "UPDATE dates SET date_2='{$_POST['date_2']}' WHERE id='1'";
        $result = mysqli_query($connection,$query);
        if($result){
          $errors=array();
          $errors[0]="Messages : Successfully Published!";

        }else{
          $errors=array();
          $errors[0]="Messages : query error";
          $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
        }

      }else{
        $errors=array();
        $errors[0]="Messages : Inserted date is not valid. check your date again!";
        $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
      }


    }else if(isset($_POST['btn_3'])){
      
      if($_POST['date_3']>date("Y-m-d") && $_POST['date_3']>=$_POST['date_2']){
        
        $query = "UPDATE dates SET date_3='{$_POST['date_3']}' WHERE id='1'";
        $result = mysqli_query($connection,$query);
        if($result){
          $errors=array();
          $errors[0]="Messages : Successfully Published!";

        }else{
          $errors=array();
          $errors[0]="Messages : query error";
          $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
        }

      }else{
        $errors=array();
        $errors[0]="Messages : Inserted date is not valid!";
        $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
      }


    }else if(isset($_POST['btn_4'])){
      
      if($_POST['date_4']>date("Y-m-d") && $_POST['date_4']>=$_POST['date_3']){
        
        $query = "UPDATE dates SET date_4='{$_POST['date_4']}' WHERE id='1'";
        $result = mysqli_query($connection,$query);
        if($result){
          $errors=array();
          $errors[0]="Messages : Successfully Published!";

        }else{
          $errors=array();
          $errors[0]="Messages : query error";
          $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
        }

      }else{
        $errors=array();
        $errors[0]="Messages : Inserted date is not valid!";
        $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
      }


    }else if(isset($_POST['btn_5'])){
      
      if($_POST['date_5']>date("Y-m-d") && $_POST['date_5']>=$_POST['date_4']){
        
        $query = "UPDATE dates SET date_5='{$_POST['date_5']}' WHERE id='1'";
        $result = mysqli_query($connection,$query);
        if($result){
          $errors=array();
          $errors[0]="Messages : Successfully Published!";

        }else{
          $errors=array();
          $errors[0]="Messages : query error";
          $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
        }

      }else{
        $errors=array();
        $errors[0]="Messages : Inserted date is not valid!";
        $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
      }


    }else if(isset($_POST['btn_6'])){
      
      if($_POST['date_6']>date("Y-m-d") && $_POST['date_6']>=$_POST['date_5']){
        
        $query = "UPDATE dates SET date_6='{$_POST['date_6']}' WHERE id='1'";
        $result = mysqli_query($connection,$query);
        if($result){
          $errors=array();
          $errors[0]="Messages : Successfully Published!";

        }else{
          $errors=array();
          $errors[0]="Messages : query error";
          $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
        }

      }else{
        $errors=array();
        $errors[0]="Messages : Inserted date is not valid!";
        $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
      }


    }else if(isset($_POST['btn_7'])){
      
      if($_POST['date_7']>date("Y-m-d") && $_POST['date_7']>=$_POST['date_6']){
        
        $query = "UPDATE dates SET date_7='{$_POST['date_7']}' WHERE id='1'";
        $result = mysqli_query($connection,$query);
        if($result){
          $errors=array();
          $errors[0]="Messages : Successfully Published!";

        }else{
          $errors=array();
          $errors[0]="Messages : query error";
          $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
        }

      }else{
        $errors=array();
        $errors[0]="Messages : Inserted date is not valid!";
        $style='style="background-color: red;border-radius: 3px;padding: 10px;padding-right: 10px;padding-left: 10px;color:white"';
      }


    }

     $query = "SELECT * FROM dates WHERE id='1'";
  $result = mysqli_query($connection,$query);
  if($result){
    if(mysqli_num_rows($result)==1){

      $list = mysqli_fetch_assoc($result);
      $d1 = $list['date_1'];
      $d2 = $list['date_2'];
      $d3 = $list['date_3'];
      $d4 = $list['date_4'];
      $d5 = $list['date_5'];
      $d6 = $list['date_6'];
      $d7 = $list['date_7'];
      
    }
  }



 ?>


<div class="container fluid padding" style=" padding: 5px;padding-top: 75px">
	<div class="row""> <!--START row 1-->
		
		<!--<div class="col-sm-1"></div>-->
		<div class="col-sm-12" style=" padding: 10px">
			<h2 class="text-center">PUBLISH IMPORTANT DATES</h2>

		

<hr style="background-color: black">

		</div>	
		<!--<div class="col-sm-1"></div>-->
</div><!-- END row 1-->
 
      
      
        <div class="row" style="padding: 10px;">
          <div class="col-sm-12" <?php echo $style; ?>>
            <h5>
              <?php if(isset($errors[0])){
                echo $errors[0];
                

              } ?>
            </h5>

          </div>
          <div class="col-sm-12"><br></div>
          <div class="col-sm-1"></div>
          <div class="col-sm-10 text-center">
            <form action="imp-dates.php" method="post">
         
     <!------------------------------------------------------------------------------------------------->
     
            
                <div class="form-group form-inline">
                  <div class="col-sm-6">
                    <label style="float: left">Calling full papers</label>
                 
                  </div>
                  <div class="col-sm-3">
                    
                  <input class="form-control text-center" type="date" name="date_1" value= <?php echo $d1; ?>  >
                  </div>
                  <div class="col-sm-3">
                    
                  <button class="form-control btn btn-success" style="float: right;width: 150px" name="btn_1">Publish</button>
                  </div>
                </div>
              
     <!------------------------------------------------------------------------------------------------->
                <div class="form-group form-inline">
                  <div class="col-sm-6">
                    <label style="float: left">Last date for submission of full paper</label>
                 
                  </div>
                  <div class="col-sm-3">
                    
                  <input class="form-control text-center" type="date" name="date_2" value= <?php echo $d2; ?>>
                  </div>
                  <div class="col-sm-3">
                    
                  <button class="form-control btn btn-success" style="float: right;width: 150px" name="btn_2">Publish</button>
                  </div>
                </div>
               
              
      <!------------------------------------------------------------------------------------------------>
                <div class="form-group form-inline">
                  <div class="col-sm-6">
                    <label style="float: left">Notification of acceptance</label>
                 
                  </div>
                  <div class="col-sm-3">
                    
                  <input class="form-control text-center" type="date" name="date_3" value= <?php echo $d3; ?> >
                  </div>
                  <div class="col-sm-3">
                    
                  <button class="form-control btn btn-success" style="float: right;width: 150px" name="btn_3">Publish</button>
                  </div>
                </div>
              
               
            
          <!------------------------------------------------------------------------------------------------>
                 <div class="form-group form-inline">
                  <div class="col-sm-6">
                    <label style="float: left">Registration</label>
                 
                  </div>
                  <div class="col-sm-3">
                    
                  <input class="form-control text-center" type="date" name="date_4" value= <?php echo $d4; ?> >
                  </div>
                  <div class="col-sm-3">
                    
                  <button class="form-control btn btn-success" style="float: right;width: 150px" name="btn_4">Publish</button>
                  </div>
                </div>
               
         
          <!------------------------------------------------------------------------------------------------>
                 <div class="form-group form-inline">
                  <div class="col-sm-6">
                    <label style="float: left">Last date to submit finalized full paper</label>
                 
                  </div>
                  <div class="col-sm-3">
                    
                  <input class="form-control text-center" type="date" name="date_5" value= <?php echo $d5; ?> >
                  </div>
                  <div class="col-sm-3">
                    
                  <button class="form-control btn btn-success" style="float: right;width: 150px" name="btn_5">Publish</button>
                  </div>
                </div>
             
             
          <!------------------------------------------------------------------------------------------------>
                 <div class="form-group form-inline">
                  <div class="col-sm-6">
                    <label style="float: left">Date for submission of presentation</label>
                 
                  </div>
                  <div class="col-sm-3">
                    
                  <input class="form-control text-center" type="date" name="date_6" value= <?php echo $d6; ?> >
                  </div>
                  <div class="col-sm-3">
                    
                  <button class="form-control btn btn-success" style="float: right;width: 150px" name="btn_6">Publish</button>
                  </div>
                </div>
              
             
          <!------------------------------------------------------------------------------------------------>
                 <div class="form-group form-inline">
                  <div class="col-sm-6">
                    <label style="float: left">Proposed dates for SRS 2018</label>
                 
                  </div>
                  <div class="col-sm-3">
                    
                  <input class="form-control text-center" type="date" name="date_7" value= <?php echo $d7; ?> >
                  </div>
                  <div class="col-sm-3">
                    
                  <button class="form-control btn btn-success" style="float: right;width: 150px" name="btn_7">Publish</button>
                  </div>
                </div>
               
            </form>
          <!------------------------------------------------------------------------------------------------>
          <div><br></div>
                 <div class="form-group form-inline">
                  <div class="col-sm-4">
                   
                 
                  </div>
                  <div class="col-sm-4">
                    
               
                  </div>
                  <div class="col-sm-4">
                    <a href="admin.php"><button class="btn btn-danger" style="width: 150px; float: right;" name="cancel" type="submit">Cancel</button></a>
                  
                  </div>
                </div>
          
              
             
             
      

          </div>
          <div class="col-sm-1"></div>
          
        </div>

        
          

         
 

</div>


 <?php require_once("includes/admin_footer.php"); ?>