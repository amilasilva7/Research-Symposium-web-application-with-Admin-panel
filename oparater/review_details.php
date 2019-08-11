<?php   require_once("../includes/redirect_admin.php") ?>
<?php   require_once("includes/oparate_header.php"); ?>
<?php   require_once("includes/oparate_navbar.php"); ?>
<?php   require_once("../includes/connection.php") ?>


<?php 
    //SET REVIEWER NAMES LIST

  $errors = array();

  $list = '';
  $query1 = "SELECT * FROM reviewer";
  $result_rew = mysqli_query($connection,$query1);

  if($result_rew){
    
    if(mysqli_num_rows($result_rew)>0){
      while($dataset = mysqli_fetch_assoc($result_rew)){

        $list .= "<option selected>{$dataset['reviewer_name']}</option>";
      }
    }

  }else{
    $errors[]="Not available reviwers!";
  }

 ?>

 



<?php //-------------Add Reviewer -------------
  if(isset($_POST['add'])){

    $errors = array();

    $reviewer = $_POST['reviewer'];
    $paper    = $_POST['paper'];
    $note     = $_POST['note'];
    $status   = "Pending";

    $query3 = "INSERT INTO review_details(paper_id,reviewer_name,notes,status,added_date) VALUES('$paper','$reviewer','$note','$status',NOW())";
    $result_insert = mysqli_query($connection,$query3);
    
    $query4 = "UPDATE full_papers SET reviewer_name = '$reviewer' WHERE paper_id = '{$paper}'";
    $result_insert2 = mysqli_query($connection,$query4);



    //-----------------------------------------------------------------------------

    $list2 = '';
    $x="Pending";
    $query2 = "SELECT * FROM full_papers";
    $result_paper = mysqli_query($connection,$query2);

    if($result_paper){

      if(mysqli_num_rows($result_paper)>0){

        while ($dataset2=mysqli_fetch_assoc($result_paper)) {
          $list2 .= "<option selected>{$dataset2['paper_id']}</option>";
        }

      }else{
        $errors[]="Not available papers!";
      }
    }else{
      $errors[]="query error";
    }

    //-----------------------------------------------------------------------------

    if($result_insert2){
        $errors[]="Paper ID: {$paper} is added to Reviewer: {$reviewer} !";
    }else{

    }

      //$errors[]="Paper ID: {$paper} is added to Reviewer: {$reviewer} !";
  }





  if(isset($_POST['update'])){

    $pap_id = $_POST['list2'];
    $state = $_POST['list3'];

    $query_update = "UPDATE full_papers SET result = '{$state}',reviewer_name ='{$_POST['list1']}' WHERE paper_id = '{$pap_id}'";
    $result_update = mysqli_query($connection,$query_update);
    if($result_update){
      $errors=array();
      $errors[0]="Successfully Updated!";
    }

    $query_update2 = "UPDATE review_details SET status = '{$state}',reviewer_name ='{$_POST['list1']}',notes = '{$_POST['text']}' WHERE paper_id = '{$pap_id}'";
    $result_update2 = mysqli_query($connection,$query_update2);
    if($result_update2){
      $errors=array();
      $errors[0]="Successfully Updated!";
    }



  }


    $list2 = '';
    $x="Pending";
    $query2 = "SELECT * FROM full_papers";
    $result_paper = mysqli_query($connection,$query2);

    if($result_paper){

      if(mysqli_num_rows($result_paper)>0){

        while ($dataset2=mysqli_fetch_assoc($result_paper)) {
          $list2 .= "<option selected>{$dataset2['paper_id']}</option>";
        }

      }else{
        $errors[]="Not available papers!";
      }
    }else{
      $errors[]="query error";
    }




 ?>

 <?php 
    //SET PAPER ID LIST
    $list22 = '';
    $x="Not Assigned";
    $query2 = "SELECT * FROM full_papers WHERE reviewer_name='{$x}'";
    $result_paper = mysqli_query($connection,$query2);

    if($result_paper){

      if(mysqli_num_rows($result_paper)>0){
        while ($dataset2=mysqli_fetch_assoc($result_paper)) {
          $list22 .= "<option selected>{$dataset2['paper_id']}</option>";
        }
      }else{
        $errors[]="Not available papers to add!";
      }
    }else{
      
       
      
    }



  ?>


 <!---------------------------------------------------------------------------------------------------------------->

 <?php 
 //Table Load

 $list3 = '';
 $query5 = "SELECT * FROM review_details";
 $result_rev_dtl = mysqli_query($connection,$query5);

 if($result_rev_dtl){
    if(mysqli_num_rows($result_rev_dtl)>0){
        while ($dataset3 = mysqli_fetch_assoc($result_rev_dtl)){
            $list3 .= "<tr>";
            $list3 .= "<td>{$dataset3['review_id']}</td>";
            $list3 .= "<td>{$dataset3['reviewer_name']}</td>";
            $list3 .= "<td>{$dataset3['paper_id']}</td>";
            $list3 .= "<td>{$dataset3['added_date']}</td>";
            $list3 .= "<td>{$dataset3['status']}</td>";
            $list3 .= "<td>{$dataset3['notes']}</td>";
            $list3 .= "</tr>";

        }

    }else{
      $errors[]="There is not available results!";
    }

 }else{
   $errors[] = "Query Error";
 }



  ?>






<div class="text-center" style="padding-top: 75px;">
  
  <hr style="background-color: black">
  <button class=" btn btn-success" onclick="showAdd()">ASSIGN PAPER REVIEWERS</button>
  <button class=" btn btn-primary" onclick="showUpdate()">UPDATE PAPER REVIEW RESULTS</button>
  <button class=" btn btn-danger" style="color: white" onclick="showTable()">VIEW PAPER ASSIGNED DETAILS</button>
  
</div>
<br>
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-3"></div>
        <div class="col-sm-6 " id="addrev"  style="padding: 30px; border: ridge;">
          
              <form style="padding-bottom: 60px" method="post" action="review_details.php">
                <h2 class="text-center">ASSIGN PAPER REVIEWERS</h2>
                  <hr><p></p>
                  <div class="alert alert-warning">
                    <?php 

                      if(isset($errors[0])){
                        echo $errors[0];
                      }
                     ?>
                  </div>
               
            <div class="form-group">
                <label for="sel1">Select a Reviewer:</label>
                
                  <select class="form-control" id="sel1" name="reviewer" required>
                  <?php echo $list; ?>
                 </select>
            </div>

            <div class="form-group">
                <label for="sel1">Select Paper ID:</label>
                  <select class="form-control" id="sel1" name="paper"  required>
                  <?php echo $list22; ?>
                  <!--LIST REVIEWER ISs HERE-->
                  </select>
            </div>

            <div class="form-group">
                  <label for="comment">Special Notes:</label>
                  <textarea class="form-control" placeholder="Type your notes here!" rows="5" id="comment" maxlength="200" name="note" required></textarea>
            </div>

                <div>
                  <button class="btn btn-success" type="submit" name="add" style="float: right;width: 100px">Save</button>
                </div>

              </form>

          </div>


            <div class="col-sm-6" id="updateRev"  style="padding: 30px;border: ridge;display: none;">

              <hr>
              <form style="padding-bottom: 60px" action="review_details.php" method="post">
                <h2 class="text-center">UPDATE PAPER REVIEW RESULTS</h2>
                  <hr>
               
            <div class="form-group">
                <label for="sel1">Select a Reviewer:</label>
                  <select class="form-control" id="sel1" name="list1">
                  <?php echo $list; ?>
                  <!--LIST REVIEWER ISs HERE-->
                  </select>
            </div>

            <div class="form-group">
                <label for="sel1">Select Paper ID:</label>
                  <select class="form-control" id="sel1" name="list2">
                  <?php echo $list2; ?>
                  
                  </select>
            </div>

            <div class="form-group">
                <label for="sel1">Select Status:</label>
                  <select class="form-control" id="sel1" name="list3">
                  <option value="Pending">Pending</option>
                  <option value="Accepted">Accepted</option>
                  <option value="Rejected">Rejected</option>
                  <!--LIST REVIEWER ISs HERE-->
                  </select>
            </div>

            <div class="form-group">
                  <label for="comment">Special Notes:</label>
                  <textarea class="form-control" placeholder="Type your notes here!" rows="5" id="comment" name="text"></textarea>
            </div>

                <div>
                  <button class="btn btn-success" type="submit" name="update" style="float: right;">Update</button>
                </div>

              </form>
              
            </div>



          <div class="col-sm-3"></div>


      </div>
      <div class="row">
        <div class="col-sm-1"></div>
          <div class="col-sm-10" id="divtab" style="padding: 30px;border: ridge; display: none;">
                
                <hr style="background-color: #B22222">
                <h2 class="text-center">VIEW PAPER ASSIGNED DETAILS</h2>


                    <div class="container">

                    
                        <input class="form-control mr-sm-2" type="text" placeholder="Select here" style="max-width:300px; float: right;">
                        <button class="btn btn-primary" name="Search">Search</button>
                        <p></p>
                      <div class="alert alert-warning">
                    <?php 

                      if(isset($errors[0])){
                        echo $errors[0];
                      }
                     ?>
                  </div>

                      <p> </p>
             
                      <table class="table table-bordered">
                        
                          <tr>
                            <th>ID</th>
                            <th>REVIEWER NAME</th>
                            <th>PAPER ID</th>
                            <th>ADDED DATE</th>
                            <th>STATUS</th>
                            <th>NOTES</th>
                          </tr>
                        
                          <?php echo $list3; ?>
                          <!----------------------------------------------------------------------------->

                        
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
    var z = document.getElementById("updateRev");

    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";

  }
</script>

<script>
  function showAdd(){
  var x = document.getElementById("divtab");
  var y = document.getElementById("addrev");
  var z = document.getElementById("updateRev");
  
  y.style.display = "block";
  x.style.display = "none";
  z.style.display = "none";

  }
</script>

<script>
  function showUpdate(){
    var x = document.getElementById("divtab");
    var y = document.getElementById("addrev");
    var z = document.getElementById("updateRev");

    z.style.display = "block";
    x.style.display = "none";
    y.style.display = "none";

  }
</script>


  <?php require_once("includes/oparate_footer.php"); ?>

  <!----><!----><!----><!---->