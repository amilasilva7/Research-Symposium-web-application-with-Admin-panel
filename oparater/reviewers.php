<?php   require_once("../includes/redirect_admin.php") ?>
<?php   require_once("includes/oparate_header.php"); ?>
<?php   require_once("includes/oparate_navbar.php"); ?>
<?php   require_once("../includes/connection.php") ?>


<?php 

  if(isset($_POST['submit'])){
    $mes =array();
    $email = $_POST['email'];
    $phone = $_POST['Phone'];
    $designation = $_POST['designation'];
    $name = $_POST['name'];

    $query1 = "SELECT * FROM reviewer WHERE email ='{$email}'";
    $query2 = "SELECT * FROM reviewer WHERE Phone_no = '{$phone}'";
    $result1 = mysqli_query($connection,$query1);
    $result2 = mysqli_query($connection,$query2);

    if($result1 && $result2){
      
        

        if(mysqli_num_rows($result1)==1 && mysqli_num_rows($result2)==1){
          
          $mes[]="Email and Phone number already exsit!";

        }if(mysqli_num_rows($result1)==1){
          
          $mes[]="Email is already exsit!";
        }else if(mysqli_num_rows($result2)==1){
         
          $mes[]="phone number is already exsit!";
        }else{

          $query3 = "INSERT INTO reviewer(reviewer_name,designation,phone_no,email,datetimes) VALUES('$name','$designation','$phone','$email',NOW())";

          $result3 = mysqli_query($connection,$query3);

          $mes[] = "One riviewer added!";

        }

      
    }else{
      $mes[]="query error";
    }
  }

 ?>


 <?php 

  $list = '';
  $query_ecords = "SELECT * FROM reviewer";
  $errors = array();
  $result4 = mysqli_query($connection,$query_ecords);


  if(mysqli_num_rows($result4)>0){
      while ($dataset=mysqli_fetch_assoc($result4)) {
        $list .= "<tr>";

        $list .= "<td>{$dataset['reviewer_id']}</td>";
        $list .= "<td>{$dataset['datetimes']}</td>";
        $list .= "<td>{$dataset['reviewer_name']}</td>";
        $list .= "<td>{$dataset['designation']}</td>";
        $list .= "<td>{$dataset['phone_no']}</td>";
        $list .= "<td>{$dataset['email']}</td>";

        $list.="</tr>";
      }
  }else{
        $errors[] = "Not availble records!";
      }

  ?>


<div class="text-center" style="padding-top: 75px;">
  <h1>REVIEWERS</h1>
  <hr style="background-color: black">
  <button class=" btn btn-primary" onclick="showAdd()">Add new Reviewer</button>
  <button class=" btn btn-primary" onclick="showTable()">View Reviewers</button>
  
</div>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-3"></div>
        <div class="col-sm-6 " id="addrev"  style="padding-right: 100px;">

          <hr style="background-color: #B22222">
              <form style="padding-bottom: 60px" method ="post">
                <h4 class="text-center">ADD REVIEWERS</h4>
                  <hr>
                  <div style="background-color: #d40000;padding: 1px; color: white;border-radius: 4px"><p style="padding-left:7px">

                  <?php 

                    if(isset($mes)){
                      echo $mes[0]; 
                    }

                  ?>
                    
                  </div><p></p>

               
                <div class="form-group">
                    <input type="text" autofocus="" required="" class="form-control" id="usr" name="name" placeholder="Reviewer name" style="border-color: black">
                </div>

                <div class="form-group">
                    <input type="text" required="" class="form-control" id="usr" name="Phone" pattern="[0-9]{10}" title="Ex: 0774455666" placeholder="Contact Number" maxlength="10" style="border-color: black">
                </div>

                <div class="form-group">
                    <input type="text" required="" class="form-control" id="usr" name="designation" placeholder="Reviewer Designation"style="border-color: black">
                </div>

                <div class="form-group">
                    <input type="email" required="" class="form-control" name="email" id="usr" placeholder="Email Address"style="border-color: black">
                </div>

                <div>
                  <button class="btn btn-success" type="submit" name="submit" style="float: right;">Save Reviewer  </button>
                </div>

              </form>

          </div>
          <div class="col-sm-3"></div>


      </div>
      <div class="row">
        <div class="col-sm-1"></div>
          <div class="col-sm-10" id="divtab" style="display: none;">
                
                <hr style="background-color: #B22222">
                <h4 class="text-center">REVIEWERS TABLE</h4>

                    <div class="container">
             
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Reviewer ID</th>
                          <th>Date</th>
                          <th>Reviewer Name</th>
                          <th>Designation</th>
                          <th>Phone No</th>
                          <th>Email</th>
                        </tr>
                      </thead>

                      <?php echo $list; ?>

                    </table>
                  </div>

          </div>

        <div class="col-sm-1"></div>
      </div>

    </div>


<script>
  function showTable() {
    var x = document.getElementById("divtab");
    var y = document.getElementById("addrev");

    y.style.display = "none";
    x.style.display = "block";

  }
</script>

<script>
  function showAdd(){
  var x = document.getElementById("divtab");
  var y = document.getElementById("addrev");
  
  y.style.display = "block";
  x.style.display = "none";

  }
</script>


  <?php require_once("includes/oparate_footer.php"); ?>

  <!----><!----><!----><!---->