<?php require_once("includes/connection.php") ?>

<?php 
session_start();
  if(isset($_SESSION['user_id'])){
    header("location:index.php");
  }
 ?>

<?php 
  if(isset($_POST['submit'])){
    $errors = array();

    $user = mysqli_real_escape_string($connection,$_POST['email']);
    $pass = mysqli_real_escape_string($connection,$_POST['pswd']);

      if(trim($pass)<1){
        $errors = array();
        $errors[] = "Username or password not valid!";

      }else{
        $pass = sha1($pass);
        $query = "SELECT * FROM users WHERE email='{$user}' AND password='{$pass}'";
        $result = mysqli_query($connection,$query);
          if($result){
              if(mysqli_num_rows($result)==1){

                 $log_user = mysqli_fetch_assoc($result);
                 $_SESSION=array();

                  $_SESSION['user_id']   = $log_user['user_id'];
                  $_SESSION['user_name'] = $log_user['name_initial'];
                  $_SESSION['usertype']  = $log_user['user_type'];

                  $usertype = $log_user['user_type'];
                  $recod_id = $_SESSION['user_id'];
                  $recod_name = $_SESSION['user_name'];
                  $query = "INSERT INTO log_records (user_id,name_initial,in_date,in_time,user_type) VALUES('$recod_id','$recod_name',NOW(),NOW(),'$usertype')";
                  mysqli_query($connection,$query);
                  
                  header("location:profile.php");

              }else{
                $errors = array();
                $errors[] = "Invalide username or password!";
              }
          }else{
            $errors = array();
            $errors[] = "Query Error!";
          }
      }

  }

 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=email], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}
.frame{
    max-width: 500px;
    max-height: 400px;
    margin-left: auto;
    margin-right: auto;
    padding-top: 15px;
    

}
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;

}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    

}

img.avatar {
    width: 30%;
    border-radius: 40%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>
<div class="frame">



    <form action="login.php" method="post">
  <div class="imgcontainer">
    <h1>SIGN IN</h1>
    <img src="img/srscover1.png" alt="Avatar" class="avatar">
  </div>
  

  <div style="padding: 20px">
    
    <?php if (isset($errors)): ?>
              <?php if(count($errors) > 0): ?>

              <div class="error" style="background-color: #FFCECF;border-radius: 5px;padding: 10px;width: auto;">

                  <?php foreach ($errors as $error):?>

                    <?php echo $error; ?>
                    <?php echo '<br>' ?>
                    <?php endforeach ?>

                  <?php endif ?>

              </div>

                  <?php echo '<br>'; ?>
            <?php endif ?>
  <!-------------------------------------------------------------------------------------------->
            <script>
              function setErrors() {
                val errors = <?php echo $errors ?>;
              }
            </script>
  <!-------------------------------------------------------------------------------------------->      

  </div>


  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="email" placeholder="Enter Username" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" maxlength="18" minlength="8" name="pswd" required>
        
    <button type="submit" name="submit">Login</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
    <a style="float: right;" href="register.php">Register</a>
    
  </div>
</form>

</div>

</body>
</html>
