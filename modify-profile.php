<?php require_once('includes/redirect.php') ?>
<?php require_once("includes/header1.php") ?>
<?php //require_once("includes/header2.php") ?>
<?php require_once("includes/connection.php") ?>


<?php 
    
    $query = "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'";

    $result = mysqli_query($connection,$query);

    $user = mysqli_fetch_assoc($result);

    $qr_img = 'img/uploads/';
    $qr_img .= $user['qr'];

 ?>

 <?php 
   
   if(isset($_POST['update'])){
    $msg="";
    
    $type          = $_POST['user_type'];
    $name          = $_POST['name'];
    $salutation    = $_POST['salutation'];
    $organization  = $_POST['organization'];
    $phone         = $_POST['phone'];
    $add_1         = $_POST['add_1'];
    $add_2         = $_POST['add_2'];
    $add_3         = $_POST['add_3'];
    $accomodation  = $_POST['accomodation'];
    $food_type     = $_POST['food_type'];
    $first_name    = $_POST['first_name'];
    $last_name     = $_POST['last_name'];

    $query        = "UPDATE users SET
    first_name    = '$first_name',
    last_name     = '$last_name',
    name_initial  = '$name',
    salutation    ='$salutation',
    institute     = '$organization',
    phone_no      = $phone,
    add_line1     ='$add_1',
    add_line2     = '$add_2',
    add_line3     = '$add_3',
    accommodation = '$accomodation',
    food_type     = '$food_type' WHERE user_id='{$_SESSION['user_id']}'";

   

    $result = mysqli_query($connection,$query);
    if($result){
      $msg = "Modifications applied successfully!";
      $state = 'success';
    }else{
      $msg = "Query Error";
    }

   }

  ?>



<!------------------------Resistration------------------------------->


 

  <script>

function showPaper() {

  <?php 

   $state = array();

   $quary = "SELECT user_id FROM registration WHERE user_id='{$user_id}'";
   $quary_paper = "SELECT user_id FROM full_papers WHERE user_id='{$user_id}'";

   $result = mysqli_query($connection,$query);
   $result_paper = mysqli_query($connection,$query_paper);

   if(!($result && $result_paper)){
       // var x = document.getelEmentById("reg");
       // x.style.display=  "block";
          //set visible false registration
            //set visible true paper
    
       }
       //$state[]="okaaaaaaaaaaaaaaaaaaaaaaaa";

    if($result){
        $state=array();
      $state[] = "You have already registered as a participant. But you can submit papers!";
    }else{
      if($result_paper){
          $state=array();
          $state[] = "Sorry! You have already submited a paper.!";
      }else{

        //set visible true -->paper submition

      }


    }

    ?>
  
}


function showReg(){

    <?php   

      $state = array();

       $quary = "SELECT user_id FROM registration WHERE user_id='{$user_id}'";
       $quary_paper = "SELECT user_id FROM full_papers WHERE user_id='{$user_id}'";

       $result = mysqli_query($connection,$query);
       $result_paper = mysqli_query($connection,$query_paper);

       if(!($result && $result_paper)){
          //set visible true registration
            //set visible false paper
       }

        if($result){
          $state=array();
          $state[] = "You have already registered as a participant. But you can submit papers!";
        }else{
          if($result_paper){
              $state=array();
              $state[] = "Sorry! You have already submited a paper.!";
          }else{

            //set visible true -->paper submition

          }


        }


     ?>


}



   


 </script>

  <div class="container" style="padding-top: 85px; padding-bottom: 20px">
    <div class="container fluid padding">
     <div class="row padding" style="padding-top: 10px;">

        
        <div class="col-sm-12" style="border: solid;padding-top: 10px;padding: 40px">
          <div class="row">
            


            <div class="col-sm-9">

              <div class="text-center">
                <h1 class="display-4">MODIFY PROFILE</h1>
                  
             
                <hr style="background-color: black">
                <br>

              </div>
            </div>

            <div class="col-sm-3">
              <div style="width: 150px;height: 150px;background-color:#D3D3D3;padding-bottom: 30px;">
                  <img src=<?php echo $qr_img; ?> style="width: 150px; height: 150px;padding-bottom: 10px">
              </div>
              <hr>
            </div>

          </div>
         


       <!----------------------------------------------------MESSAGES----------------------------------------------------------->                  
                  <?php
                      if(isset($msg)){
                        echo '<div class="alert alert-success alert-dismissible" >';
                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo $msg;
                        echo '</div>';
                   
                      }
                  ?>
          
         
         
          

          <div class="row" style="border: ridge;padding: 20px">
          <div class="col-sm-12" style="border-radius: 10px;">
            <a href="profile.php"> <button class="btn btn-danger pull-right">Go Back To Profile</button></a>
            <form action="modify-profile.php" method="post">
            <h4> <?php echo $user['first_name'];?> &nbsp <?php echo $user['last_name']; ?></h4>

              <table class="table table-striped"  style="font-size: 18px;font-family: sans-serif;font-style: inherit;">
                
                <tbody>
                  
                  <tr>
                    
                    <td> PROFILE ID</td>
                    <td ><?php echo $_SESSION['user_id']; ?></td>

                  </tr>
                  
                  <tr>
                    
                    <td>USER TYPE</td>
                    <td><?php echo $user['user_type']; ?></td>
                    </tr>
                        
                        
                        
<!------------------------USER TYPE CHANGE----------------------------

                      <select name="user_type" class="form-control">
                          <?php 
                              //  if($user['user_type']=="Researcher"){
                              //     echo '<option value="Resercher" selected>Researcher</option>';
                               //    echo '<option value="Participant">Participant</option>';
                               // }else{
                                   
                               //    echo '<option value="Participant" selected>Participant</option>';
                              //     echo '<option value="Resercher" >Researcher</option>';
                              //   } 
                          ?>
                      </select>

  -----------------END USER TYPE CHANGE---------------------------->                      
                        
                      
                    <tr>
                    
                    <td> FIRST NAME</td>
                    
                    <td><input name="first_name" class="form-control" type="text" value=<?php echo $user['first_name']; ?>></td>
                    

                  </tr>
                  <tr>
                    
                    <td> LAST NAME</td>
                    
                    <td><input name="last_name" class="form-control" type="text" value=<?php echo $user['last_name']; ?>></td>

                  </tr>

                  <tr>
                    
                    <td>SALUTATION</td>
                    <td>
                      <select class="form-control" name="salutation">
                        <option><?php echo $user['salutation']; ?></option>
                          <?php 

                              if($user['salutation']=="Mrs."){
                                echo '<option>Ms.</option>';
                                echo ' <option>Mr</option>';
                                echo '<option>Mss.</option>';
                                echo '<option>Dr.</option>';
                              }elseif($user['salutation']=="Ms."){
                                echo '<option>Mrs.</option>';
                                echo ' <option>Mr</option>';
                                echo '<option>Mss.</option>';
                                echo '<option>Dr.</option>';
                              }elseif($user['salutation']=="Mr"){
                                echo '<option>Ms.</option>';
                                echo ' <option>Mrs.</option>';
                                echo '<option>Mss.</option>';
                                echo '<option>Dr.</option>';
                              }elseif($user['salutation']=="Mss."){
                                echo '<option>Ms.</option>';
                                echo ' <option>Mr</option>';
                                echo '<option>Mrs.</option>';
                                echo '<option>Dr.</option>';
                              }elseif($user['salutation']=="Dr."){
                                echo '<option>Ms.</option>';
                                echo ' <option>Mr</option>';
                                echo '<option>Mss.</option>';
                                echo '<option>Mrs.</option>';
                              }
                          ?>
                      </select>



                    </td>

                  </tr>
                  <tr>
                    
                    <td>NAME</td>
                    <td>
                      
                        <input name="name" class="form-control" type="text" value=<?php echo $user['name_initial']; ?>>
                      
                    </td>

                  </tr>
                  <tr>
                    
                    <td>EMAIL ADDRESS</td>
                    <td><?php echo $user['email']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>ORGANIZATION</td>
                    <td>
                      <input name="organization" class="form-control" type="text" value=<?php echo $user['institute']; ?>>
                    </td>
                    
                  </tr>
                  <tr>
                    
                    <td>PHONE NO</td>
                    <td>
                    <input type="text" class="form-control" name="phone" id="validationCustom07" pattern="[0-9]{10}" maxlength="10" value=<?php echo $user['phone_no']; ?> required>
                    </td>
                  </tr>
                  <tr>
                    
                    <td>ADDRESS LINE 1</td>
                    <td>
                      
                        
                      <input name="add_1" class="form-control" type="text" value=<?php echo $user['add_line1']; ?>>
                        
                    </td>

                  </tr>
                  <tr>
                    
                    <td>ADDRESS LINE 2</td>
                    <td>
                      <input name="add_2" class="form-control" type="text" value=<?php echo $user['add_line2']; ?>>
                    </td>
                    
                  </tr>
                  <tr>
                    
                    <td>ADDRESS LINE 3</td>
                    <td>
                      <input name="add_3" class="form-control" type="text" value=<?php echo $user['add_line3']; ?>>
                    </td>

                  </tr>
                  <tr>
                    
                    <td>ACCOMODATION</td>
                    <td>
                      
                      <select name="accomodation" class="form-control"style="border-color: black">
                 
                        <option value="Need Accomodation" selected="select">Need Accomodation</option>
                        <option value="No Need Accomodation">No Need Accomodation</option>
                      </select>
                    </td>

                  </tr>
                  <tr>
                    
                    <td>DIETARY TYPE</td>
                    <td>
                      
                        <select name="food_type" class="form-control">
                        <option value="Dairy free" selected="select">Dairy free</option>
                        <option value="Gluten free">Gluten free</option>
                        <option value="Halal">Halal</option>
                        <option value="Vegetarian">Vegetarian</option>

                        </select>
                    </td>

                  </tr>
                

                </tbody>
              </table>


                  
                </div>
                <div class="col-sm-12 pull-right">
                  
                  <button class="btn btn-success pull-right" type="submit" name="update"  data-dismiss="modal">Update Modifications</button>
                  <a href="profile.php"> <button type="button" class="btn btn-danger pull-right">Go Back To Profile</button></a></div>

              
                </form>
                
          </div>
        
          
 

        </div>
      </div>

    </div>
  </div>
 </div>

 


 <?php require_once("includes/footer.php") ?>




















 


 