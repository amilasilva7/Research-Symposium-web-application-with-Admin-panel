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

   // if($user['confirm_mail']=="Verified"){
   ///   $status = "Account Verified";
   // }else{
   //   $status = "Account not Verified";
   // }

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
            


            <div class="col-sm-9 text-center">

              <div class="center">
                <h1>SLIATE RTESEARCH SYMPOSIUM</h1>
                
                <h2 class="display-3">Hi <?php echo $user['first_name']; ?>!</h2>
                <hr style="background-color: black">
                <br>

              </div>
            </div>

            <div class="col-sm-3 text-center">
              <div style="width: 150px;height: 150px;background-color:#D3D3D3;padding-bottom: 30px;">
                  <img src=<?php echo $qr_img; ?> style="width: 150px; height: 150px;padding-bottom: 10px">
              </div>
              <hr>
            </div>

          </div>
         
          

          <div class="row" style="border: ridge;padding: 20px">
          <div class="col-sm-12" style="border-radius: 10px;">
           <a href="modify-profile.php"> <button class="btn btn-danger pull-right">Modify My Profile</button></a>
            <h4> <?php echo $user['first_name'];?> &nbsp <?php echo $user['last_name']; ?></h4>

              <table class="table table-striped" style="font-size: 18px;font-family: sans-serif;font-style: inherit;">
                
                <tbody>
                  
                  <tr>
                    
                    <td> PROFILE ID</td>
                    <td><?php echo $_SESSION['user_id']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>USER TYPE</td>
                    <td><?php echo $user['user_type']; ?></td>

                  </tr>
                  <tr>
                    
                    <td> FIRST NAME</td>
                    <td><?php echo $user['first_name']; ?></td>

                  </tr>
                  <tr>
                    
                    <td> LAST NAME</td>
                    <td><?php echo $user['last_name']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>SALUTATION</td>
                    <td><?php echo $user['salutation']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>NAME</td>
                    <td><?php echo $user['name_initial']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>EMAIL ADDRESS</td>
                    <td><?php echo $user['email']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>ORGANIZATION</td>
                    <td><?php echo $user['institute']; ?></td>
                    
                  </tr>
                  <tr>
                    
                    <td>PHONE NO</td>
                    <td><?php echo $user['phone_no']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>ADDRESS LINE 1</td>
                    <td><?php echo $user['add_line1']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>ADDRESS LINE 2</td>
                    <td><?php echo $user['add_line2']; ?></td>
                    
                  </tr>
                  <tr>
                    
                    <td>ADDRESS LINE 3</td>
                    <td><?php echo $user['add_line3']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>ACCOMMODATION</td>
                    <td><?php echo $user['accommodation']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>DIETARY TYPE</td>
                    <td><?php echo $user['food_type']; ?></td>

                  </tr>

                

                </tbody>
              </table>

          </div>
        
          
 

        </div>
      </div>

    </div>
  </div>
 </div>

 


 <?php require_once("includes/footer.php") ?>




















 


 