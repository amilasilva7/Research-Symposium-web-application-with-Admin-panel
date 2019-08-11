<?php session_start(); ?>

<?php require_once("includes/header1.php") ?>
<?php require_once("includes/connection.php") ?>
 

  <br>
    <br>
    <br>
    <br>

    <div class="container">

    

      

     
     
      <h1 class="text-center">News </h1>




      <div class="row">
        <div class="col-lg-2 mb-4"></div>>
          <div class="col-lg-8 mb-4">

          <?php 
          if(isset($_GET['id'])){

            $query = "SELECT * FROM news WHERE id = '{$_GET['id']}'";
            $result = mysqli_query($connection,$query);
            $list = mysqli_fetch_assoc($result);
            $title = $list['title'];
            $description = $list['discrip'];
            $description2 = $list['descrip_2'];

            if($result){

              echo '<div class="card h-50">';
              echo '<h4 class="card-header">';
              echo $title;
              echo '</h4>';
              echo '<div class="card-body">';
              echo '<p class="card-text" style="text-align: justify;">';
              echo $description;
              echo '<br>';
              echo $description2;
              echo '</p>';
              echo '</div>';
              echo '<p style="color:red; float:right">';
              echo $list['date_time'];
              echo '</p>';
              echo '</div>';

            }else{
              echo '<h2>Not available!</h2>';
            }

     
            

           }else{

            $query2 = "SELECT * FROM news";
            $result2 = mysqli_query($connection,$query2);
            $list = mysqli_fetch_assoc($result2);
            

            if($result2){

              if(mysqli_num_rows($result2)>0){

                while ($list = mysqli_fetch_assoc($result2)) {


                    echo '<div class="card h-50">';
                    echo '<h4 class="card-header">';
                    echo $list['title'];
                    echo '</h4>';
                    echo '<div class="card-body">';
                    echo '<p class="card-text" style="text-align: justify;">';
                    echo $list['discrip'];
                    echo '<br>';
                    echo $list['descrip_2'];
                    echo '</p>';
                    echo '</div>';
                    echo '<p style="color:red; float:right">';
                    echo $list['date_time'];
                    echo '</p>';
                    echo '</div>';
                    echo '<br><br>';
                  
                }

              }else{
                echo '<h2>Not available!</h2>';
              }

              

            }else{
              echo '<h2>Not available!</h2>';
            }


           }

           ?>





        </div>
        <div class="col-lg-2 mb-4"></div>
       
        
      </div>
    </div>



    <br>
    <br>
  


<?php require_once("includes/footer.php") ?>