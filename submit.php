<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/header1.php") ?>
<?php //require_once("includes/header2.php") ?>



<?php 
        
      $_SESSION['val_1'] = "" ;
      $_SESSION['val_2'] = "" ; 
      $_SESSION['val_3'] = "" ;
      $_SESSION['val_4'] = "" ;
      $_SESSION['val_5'] = "" ;
      $_SESSION['val_6'] = "" ;
      $_SESSION['val_9'] =  "" ;
      $_SESSION['val_10'] = "" ;
      $_SESSION['val_11'] = "" ;
     



  
  if(isset($_POST['save'])){
      $errors = array();

      if($_POST['pass1']==$_POST['pass2']){
        $pass1 = sha1($_POST['pass1']);

      $name1      = mysqli_real_escape_string($connection,$_POST['name1']);
      $name2      = mysqli_real_escape_string($connection,$_POST['name2']);
      $name3      = mysqli_real_escape_string($connection,$_POST['name3']);
      $organization = mysqli_real_escape_string($connection,$_POST['organization']);
      $salutation = mysqli_real_escape_string($connection,$_POST['salutation']);
      $usertype   = "Researcher";
      $email      = mysqli_real_escape_string($connection,$_POST['email']);
      $phone      = mysqli_real_escape_string($connection,$_POST['phone']);
      $addline1   = mysqli_real_escape_string($connection,$_POST['addline1']);
      $addline2   = mysqli_real_escape_string($connection,$_POST['addline2']);
      $addline3   = mysqli_real_escape_string($connection,$_POST['addline3']);
      $acc        = mysqli_real_escape_string($connection,$_POST['accomodation']);
      $food       = mysqli_real_escape_string($connection,$_POST['food_type']);

      $title      = mysqli_real_escape_string($connection,$_POST['title']);
      $category   = mysqli_real_escape_string($connection,$_POST['category']);
      $sub_area   = mysqli_real_escape_string($connection,$_POST['sub_area']);
     // $file_name  = mysqli_real_escape_string($connection,$_POST['file1']);
      

      
      

      $_SESSION['val_1'] = $name1;
      $_SESSION['val_2'] = $name2;
      $_SESSION['val_3'] = $name3;
      $_SESSION['val_4'] = $organization;
      $_SESSION['val_5'] = $salutation;
      $_SESSION['val_6'] = $usertype;
      $_SESSION['val_7'] = $email;
      $_SESSION['val_8'] = $phone;
      $_SESSION['val_9'] = $addline1;
      $_SESSION['val_10'] = $addline2;
      $_SESSION['val_11'] = $addline3;
     


        

          $query1 = "SELECT email FROM users WHERE email='{$email}'";
          $query2 = "SELECT phone_no FROM users WHERE phone_no='{$phone}'";

          $result1 = mysqli_query($connection,$query1);
          $result2 = mysqli_query($connection,$query2);

          if($result1 && $result2){
            if(mysqli_num_rows($result1)==1){
              $errors[]="Your email is already exsist!";
            }
            if(mysqli_num_rows($result2)==1){
              $errors[] = "Your phone number is already exsist!";
            }
            if((mysqli_num_rows($result1)==0) && (mysqli_num_rows($result2)==0)){

              $target_dir = "downloads/papers/";
              $fname = $_FILES['file1']['name'];
              $ftemp = $_FILES['file1']['tmp_name'];

              move_uploaded_file($ftemp, $target_dir.$phone.$fname);
              $file_name = "".$fname;


             

             

               $query = "INSERT INTO users(food_type,accommodation,email,user_type,institute,first_name,last_name,name_initial,add_line1,add_line2,add_line3,dated,ttime,salutation,phone_no,password) VALUES('$food','$acc','$email','$usertype','$organization','$name1','$name2','$name3','$addline1','$addline2','$addline3',NOW(),NOW(),'$salutation','$phone','$pass1')";


              $result = mysqli_query($connection,$query);

              if($result){
                
                $_SESSION = array(); //Clear all cookies

                $query = "SELECT * FROM users WHERE email='{$email}'";
                $result3 = mysqli_query($connection,$query);

                $log_user = mysqli_fetch_assoc($result3);

                $_SESSION['user_id']  = $log_user['user_id'];
                $_SESSION['email'] = $log_user['email'];
                $recod_id = $_SESSION['user_id'];
                $recod_name = $log_user['name_initial'];
                $status = "Pending";
                $rev_name = "Not Assigned";// to identify

                $qr = $_SESSION['user_id'].".png";
                $query ="UPDATE users SET qr = '$qr',image = '$qr' WHERE user_id='{$_SESSION['user_id']}'";
                $result5 = mysqli_query($connection,$query);

                $query_pap = "INSERT INTO full_papers(user_id,category_name,title,subject_area,submit_date,pdf_name,result,reviewer_name) VALUES($recod_id,'$category','$title','$sub_area',NOW(),'$fname','$status','$rev_name')";
              
                $result= mysqli_query($connection,$query_pap);
                
                header("location:profile.php");

                

              } else{
                $errors[] = "Query Error!";
              }

              
            }else{
              //$errors[]="empty";
            }

          }else{
            $errors[]="Query Fail!";
          }

      }else{
            $errors[]="Confrom password is not match!";
          }
     
     
       
    }


 ?>

<!----------------------------------------------CONTAINER------------------------------------------------------------->


<div class="container" style="padding-top: 100px;">

  <div class="row" style="padding-top: 0px">
    

    
    <div class="col-sm-12 shadow-lg p-4 mb-1 bg-white rounded" style="border: ridge; padding-top:0px;padding-bottom: 1px;border-radius:1px;color: black;">

      <div class="row" style="padding-top: 0px;">
      
      
        <div class="col-sm-12 form-inline " style="border-bottom: ridge;border-top: ridge;background-color: #1E3566;padding-top: 5px;border-radius:1px;border-radius: 5px">
        
          <div class="col-sm-4 text-center" style="padding-bottom: 0px;">
            <img class="img-fluid" style="max-height: 150px;width: auto;" src="img/srscover1.png">
          </div>
          <div class="col-sm-8 text-center" style="padding-bottom: 0px;">
            <h2 class="display-4" style="color: white">PAPER SUBMITION FORM</h2>
          </div>

        </div>
      <!------------------------------------------------------------------------------------------->
        <div class="col-sm-12" style="height:5px;width: auto;background-color: #5AB4F9">
      
        </div>
      <div class="col-md-12" style="padding-top: 5px;"><?php require_once("includes/createuser1_errors.php") ?></div>
     <!------------------------------------------------------------------------------------------->

      </div>
<!-------------------------------------------------FORM---------------------------------------------->
      <div class="col-sm-12" style="padding-top: 10px">

        <form class="needs-validation" method="post" action="submit.php" enctype="multipart/form-data" novalidate >

        <div class="form-row">
          <div class="col-md-12"><h4>PERSONAL INFO</h4><hr style="background-color: blue"></div>
          

     <!------------------------------------------------------------------------------------------------->
          <div class="col-md-6 mb-1" >
            <label for="validationCustom01">First name</label>
            <input type="text" class="form-control" name="name1" maxlength="20" value="<?php echo $_SESSION['val_1']; ?>"  placeholder="First name" required>
              <div class="invalid-feedback">
                Required!
              </div>
          </div>
      <!------------------------------------------------------------------------------------------------>
          <div class="col-md-6 mb-3">
            <label for="validationCustom02">Last name</label>
            <input type="text" class="form-control" name="name2"  maxlength="20" value="<?php echo $_SESSION['val_2']; ?>" placeholder="Last name" required>
            <div class="invalid-feedback">
              Required!
            </div>
            
          </div>
      <!----------------------------------------------------------------------------------------------------------->
          <div class="col-md-6 mb-3">

            <label for="validationCustomUsername">Salutaion</label>
            <div class="input-group">
              
              <select name="salutation" class="custom-select mb-3" style="border-color: black">
                     <option selected>Mr</option>
                     <option>Mrs.</option>
                     <option>Ms.</option>
                     <option>Mss.</option>
                     <option>Dr.</option>
              </select>

            </div>
          </div>
      <!----------------------------------------------------------------------------------------------------------->
          <div class="col-md-6 mb-3">
            <label for="validationCustom04">Name with initials</label>
            <input type="text" name="name3" class="form-control" id="validationCustom04" value="<?php echo $_SESSION['val_3']; ?>" maxlength="60" placeholder="Name with initials" required>
            <div class="invalid-feedback">
              Required! -- [ Example: O.A.P.Silva ]
            </div>
          </div>
        
      <!----------------------------------------------------------------------------------------------------------->
          <div class="col-md-12 mb-3">
            <label for="validationCustom04">Organization</label>
            <input type="text" class="form-control" name="organization" id="validationCustom05" value="<?php echo $_SESSION['val_4']; ?>" maxlength="50" placeholder="Organization" required>
            <div class="invalid-feedback">
              Required! -- [ Enter where you working etc. ]
            </div>
          </div>

          <div class="col-md-12"><hr style="background-color: blue"><h4>PAPER INFORMATION</h4><hr style="background-color: blue"></div>
      <!----------------------------------------------------------------------------------------------------------->
        
          <div class="col-md-6 mb-3">
            
            <label>Paper Title: </label>
            <input class="form-control" type="text" placeholder="title" name="title" maxlength="80" required="">
            <div class="invalid-feedback">
              Title is required!
            </div>
          </div>
        <!----------------------------------------------------------------------------------------------------------->

           <div class="col-md-6 mb-3">
            <label for="validationCustom08">Related Category:</label>
             <select name="category" class="custom-select mb-3"style="border-color: black">
                <option value="Hospitality Management" selected="select">Hospitality Management</option>
                <option value="HUMINITIES & SOCIAL SCIENCE">Huminities & Social Science</option>
                <option value="Halal">Information Technology</option>
                <option value="Vegetarian">Financial and Economics</option>

               </select>
          </div>
        <!----------------------------------------------------------------------------------------------------------->
          <div class="col-md-6 mb-3">
            <label for="validationCustomAdd1">Subject Area:</label>
            <div class="input-group">
              <input type="text" class="form-control" name="sub_area" id="validationCustomUsername1" value="<?php echo $_SESSION['val_9']; ?>" maxlength="50" placeholder="subject area" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Required!
              </div>
            </div>
          </div>

          <!----------------------------------------------------------------------------------------------------------->
          <div class="col-md-6 mb-3">
            <label for="validationCustomAdd2">Uplaod File:</label>
            <?php 
                if(isset($_POST['submit'])){
                if(isset($errors)){
                
                 echo '<strong style="color:red;">';
                 echo $errors;
                 echo '</strong>';
                    
                } 
              }
                ?>
                <input type="file" class="form-control-file border" accept=".docx,doc" name="file1" required>
                <div class="invalid-feedback">
                File is Required!
              </div>
          </div>
      <!----------------------------------------------------------------------------------------------------------->
      <div class="col-md-12"><hr style="background-color: blue"><h4>SPECIAL REQUIREMENTS</h4><hr style="background-color:blue"></div>
      <!----------------------------------------------------------------------------------------------------------->
        
          <div class="col-md-6 mb-3">
            <label for="validationCustom07">Accommodation</label>
              <select name="accomodation" class="custom-select mb-3"style="border-color: black">
                 
                <option value="Need Accomodation" selected="select">Need Accomodation</option>
                <option value="No Need Accomodation">No Need Accomodation</option>
              </select>
            
          </div>
        <!----------------------------------------------------------------------------------------------------------->

           <div class="col-md-6 mb-3">
            <label for="validationCustom08">Dietary Type</label>
              <select name="food_type" class="custom-select mb-3"style="border-color: black">
                <option value="Dairy free" selected="select">Dairy free</option>
                <option value="Gluten free">Gluten free</option>
                <option value="Halal">Halal</option>
                <option value="Vegetarian">Vegetarian</option>

               </select>
            
          </div>
        <!----------------------------------------------------------------------------------------------------------->
         
       
      <!----------------------------------------------------------------------------------------------------------->
        <div class="col-md-12"><hr style="background-color: red"><h4>MAIL INFORMATION</h4><hr style="background-color: red"></div>
      <!----------------------------------------------------------------------------------------------------------->
        
          <div class="col-md-6 mb-3">
            <label for="validationCustom07">Email address</label>
            <input type="email" class="form-control" name="email" id="validationCustom06" maxlength="50" placeholder="Email address" required>
            <div class="invalid-feedback">
              Insert a valid email address!
            </div>
          </div>
        <!----------------------------------------------------------------------------------------------------------->

           <div class="col-md-6 mb-3">
            <label for="validationCustom08">Phone Number</label>
            <input type="text" class="form-control" name="phone" id="validationCustom07" pattern="[0-9]{10}" maxlength="10" placeholder="Phone Number" required>
            <div class="invalid-feedback">
              Required 10 digit Number!
            </div>
          </div>
        <!----------------------------------------------------------------------------------------------------------->
          <div class="col-md-6 mb-3">
            <label for="validationCustomAdd1">Address Line 1</label>
            <div class="input-group">
              <input type="text" class="form-control" name="addline1" id="validationCustomUsername1" value="<?php echo $_SESSION['val_9']; ?>" maxlength="50" placeholder="Address Line 1" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Required!
              </div>
            </div>
          </div>

          <!----------------------------------------------------------------------------------------------------------->
          <div class="col-md-6 mb-3">
            <label for="validationCustomAdd2">Address Line 2</label>
            <div class="input-group">
              <input type="text" class="form-control" name="addline2" id="validationCustomUsername2" maxlength="50" value="<?php echo $_SESSION['val_10']; ?>" placeholder="Address Line 2" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Required!
              </div>
            </div>
          </div>

          <!----------------------------------------------------------------------------------------------------------->
          <div class="col-md-6 mb-3">
            <label for="validationCustomAdd3">Address Line 3</label>
            <div class="input-group">
              <input type="text" class="form-control" name="addline3" id="validationCustomUsername3" value="<?php echo $_SESSION['val_11']; ?>" maxlength="50" placeholder="Address Line 3" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Required!
              </div>
            </div>
          </div>
          <div class="col-md-6"></div>

          <div class="col-md-6 mb-3">
            <label for="validationCustom08">Password</label>
            <input type="Password" class="form-control" name="pass1" id="validationCustom07" minlength="8" maxlength="18" placeholder="**********" required>
            <div class="invalid-feedback">
              Enter the password!
            </div>
          </div>
        <!----------------------------------------------------------------------------------------------------------->
          <div class="col-md-6 mb-3">
            <label for="validationCustomAdd1">Confirm Password</label>
            <div class="input-group">
              <input type="Password" class="form-control" name="pass2" id="validationCustomUsername1" minlength="8" value="" maxlength="18" placeholder="**********" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Confrim the password!
              </div>
            </div>
          </div>

          <!----------------------------------------------------------------------------------------------------------->
         

        <div class="col-md-9">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              I agree to terms and conditions
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
          </div>
        </div>
        <!----------------------------------------------------------------------------------------------------------->
        <div class="col-md-3" style="padding-bottom: 20px"><button class="btn btn-primary" name="save" type="submit" style="float: right;pad;">Register to Sysmposium</button></div>
        </div>
      </form>


    </div>
    <div class="col-sm-12" style="height: 60px;background-color:#75D07B; padding-top:20px"></div>


<!------------------------------------------------SCRIPT START---------------------------------------------------->
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>

<!--------------------------------------------------END SCRIPT---------------------------------------------------->


</div>



  </div>

  <!--------------------------------------------END ROW 2--------------------------------------------------------------->
</div>





<?php require_once("includes/footer.php") ?>