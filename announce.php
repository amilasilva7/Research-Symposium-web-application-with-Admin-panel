<?php session_start(); ?>
<?php require_once("includes/connection.php") ?>

<?php require_once("includes/header1.php") ?>
 

  <br>
    <br>
    <br>
    <br>

    <div class="container">

     
      <!-- Marketing Icons Section -->
      <div class="row">

        <h1 class="text-center">Accepted Papers</h1>
        

        <div class="col-12" style="padding: 5px; border-top: ridge;"></div>
        <br>


        <div class="col-12">
          

          <?php 

          $msg = "";

          $query = "SELECT * FROM full_papers WHERE result = 'Accepted'";
          $result = mysqli_query($connection,$query);


          if($result){
            
            if(mysqli_num_rows($result)>0){

              echo '<table class="table text-justify">';
              echo '<tbody>';

              echo '<tr>';

              echo '<th>No</th>';
              echo '<th>Paper Title</th>';
              echo '<th>Researcher Name</th>';
              echo '<th>Organization</th>';
              echo '<th>Result</th>';
              
              echo '</tr>';
              $x = 1;
              while ($list = mysqli_fetch_assoc($result)) {
                  
                  

                  echo '<tr class="success"> <td>';
                  echo $x;
                  echo '</td>';

                  echo '<td>';
                  echo $list['title'];
                  echo '</td>';

                  $query_id = "SELECT * FROM users Where user_id = '{$list['user_id']}'";
                  $result_id = mysqli_query($connection,$query_id);

                  if($result_id){
                    $list2=mysqli_fetch_assoc($result_id);

                  }




                  echo '<td>';
                    echo $list2['salutation'].". ".$list2['name_initial'];
                  echo '</td>';
                  echo '<td>';
                  echo $list2['institute'];
                  echo '</td>';
                  echo '<td>';
                  echo $list['result'];
                  echo '</td></tr>';
                  
                  $x = $x+1;
                  
              }

              echo '</tbody>';
              echo '</table>';
              

            }else{
              $msg = "NOT PUBLISH YET!";
              
            }
          }


           ?>

           <h2 style="color: red"><?php echo $msg; ?></h2>
           <div style="height:300px">
              
              </div>


        </div>
        
        
      </div>
    </div>


<?php require_once("includes/footer.php") ?>