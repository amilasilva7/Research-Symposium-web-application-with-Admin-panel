<?php require_once("includes/connection.php") ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="newsss/a.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
    <link href="body/news/css/site.css" rel="stylesheet" type="text/css" />
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="body/news/scripts/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>


  </head>

  <body>
   
    

<div class="news">
  <span>News Feed</span>
  <?php 

  $query_news = "SELECT * FROM news";
  $result_news = mysqli_query($connection,$query_news);

  if($result_news){

    if(mysqli_num_rows($result_news)>0){
      echo '<ul>';
      $num = mysqli_num_rows($result_news);
      while ($list = mysqli_fetch_assoc($result_news)) {
        echo '<li><a href="#">';
        echo $list['heading'];
        echo '</a></li>';
      }

    }

  }else{

  }


   ?>
  
    
  </ul>
</div>


  
<div class="container" style="background-color:white;padding-top: 1px">


      <div class="row">
          <!--start main body (BIG SESSION)-->


           <!--<div class="col-sm-1"></div>-->

           <div class="col-sm-9" style="padding-top: 20px;">
           
           
           <h1 class="display-4 text-center" style="font-family:sans-serif;"><b>WELCOME</b></h1>

           <h1 class="text-center" style="color: #e23644;"><b>SLIATE RESERACH SYMPOSIUM-2018</b></h1>
            <h3 class="text-center">Professional progress for social sustainability</h3>
            <h4 class="text-center">Call for Papers from Academics of SLIATE and Sri Lankan Universities</h4>
            <hr>
            <div class="text-justify">
            <p style="font-size: 18px">Sri Lanka Institute of Advanced Technological Education (SLIATE) that was established under the provisions of the act of parliament no 29 of 1995 is currently functioning within the purview of Ministry of Higher Education and Cultural Affairs. SLIATE is one of the leading government institutions in the Alternative Higher Education Sector in Sri Lanka.</p>

            <p style="font-size: 18px">At present, SLIATE manages and supervises eleven Advanced Technological Institutes and eight Sections. It conducts a broad range of multi-disciplinary programs in English medium targeting at students who have passed A/L examination in Sri Lanka. They are: Higher National Diploma in Accountancy, Agriculture, Business Administration, Business Finance, Building Services Engineering, Consumer Sciences and Product Technology, Engineering(Civil, Electrical & Electronic, Mechanical), English, Food Technology, Information Technology, Management, Project Management, Quantity Surveying and Tourism & Hospitality Management.</p>

            <p style="font-size: 18px">As a step further, last year SLIATE provided opportunities to its academics to involve in research activities also in addition to teaching and learning. This year, SLIATE has extended the opportunities to outsiders (Academics from Sri Lankan universities) as well. This act has provided a common platform to SLIATE members to share their experience/new knowledge with their colleagues and outsiders.</p>
            <P></P>
            </div>            
          </div> 

           <div class="col-sm-3"><br> <br> <br> <br> <br> <br>

           
<div class="panel panel-default">
<div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b>News</b></div>
<div class="panel-body">
<div class="row">
<div class="col-xs-12">

<?php 

  $query_news = "SELECT * FROM news";
  $result_news = mysqli_query($connection,$query_news);

    if($result_news){

        if(mysqli_num_rows($result_news)>0){
          echo '<ul>';
          $num = mysqli_num_rows($result_news);
          while ($list = mysqli_fetch_assoc($result_news)) {
            $link = "news.php?id=".$list['id'];
            echo '<li>';
            echo $list['heading'];
            echo '</li><a href="';
            echo $link;
            echo '" style="color:red">Read more</a>';
          }

        }

      }else{

      }


 ?>
</div>
</div>
</div>
<div class="panel-footer"> </div>
</div>
</div>

<script type="text/javascript">
    $(function () {
        $(".demo1").bootstrapNews({
            newsPerPage: 3,
            autoplay: true,
      pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        });
    
    $(".demo2").bootstrapNews({
            newsPerPage: 6,
            autoplay: true,
      pauseOnHover: true,
      navigation: false,
            direction: 'down',
            newsTickerInterval: 2500,
            onToDo: function () {
                //console.log(this);
            }
        });

        $("#demo3").bootstrapNews({
            newsPerPage: 3,
            autoplay: false,
            
            onToDo: function () {
                //console.log(this);
            }
        });
    });
</script>

           
       


           <hr> <br> <br> <br> <br><br>

            <!-- Portfolio Section -->
      <div class="col-sm-12" style="background-color: #2E3E6A;padding: 2px">
            <h3 class="text-center" style="color:white;">SLIATE RESEARCH SYMPOSIUM</h3> 
          </div>
         

      <div class="row">
        <div class="col-lg-6" style="font-size: 15px">
        <br>          
          <p style="font-size: 18px">Academic Affairs / Planning & Research Branch (AA/PR)</p>
          <p style="font-size: 18px; text-align: justify;">Academic Affairs / Planning & Research Branch coming under the purview of Director General - SLIATE. Dr.W. Hilary E Silva is mandated to organize research symposium annually. This is the 2nd symposium of SLIATE. </p>
          <ul>
            <h4>Objectives of this symposium are:</h4>
            <li>
              <strong>To provide opportunities to our academics to add values to their research and teaching activities. </strong>
            </li>
            <li>
              <strong>To provide a forum for exchanging interactive views among SLIATE’s academics and outsiders. </strong>
            </li>
            <li>
              <strong>To inculcate research culture among SLIATE’s academics. </strong>
            </li>            
          </ul>
          <h5 style="font-size: 18px">This year, this symposium is extended to outsiders as well in addition to our academics.</h5><br>
          <p style="font-size: 16px">Chair-SRS 2018<br>
              Dr.W.Hilary E.Silva<br>
              Director General,<br>
              E-mail: dg@sliste.ac.lk</p>
              <p style="font-size: 18px; text-align: justify;">Sri Lanka Institute of Advanced Technological Education (SLIATE) is<br>proud to announce the <a href="past.php">1st ever symposium (SRS 2017).</a></p>
        </div>
        <div class="col-lg-6">
          
           <video width="520" height="440" controls>
            <source src="body/a.mp4" type="video/mp4">            
          </video>           
        </div>
      </div>
    </div>



      <div class="row" style="padding-top: 20px;padding-bottom: 20px;">

          <div class="col-sm-12 text-center" style="background: #2E3E6A;padding: 5px;color: white">
          <h4 class="text-center">IMPORTANT DATES</h4>
          </div>


        </div>

        <div class="row">

          <div class="col-sm-12" >

            <p style="text-align: justify; font-size: 19px;">SRS 2018 provides a forum for academics/researchers/ Students of SLIATE and Sri Lankan universities to share their experience/new knowledge with their colleagues and outsiders. Full Papers are invited under the following categories: Bussiness (Management, Accountancy, Tourism and Hospitality Management), Technology (Information Technology, Agriculture & Food Science, and Engineering), Humanities & social science (English,& law..) to be presented at the SRS 2018 and published in the proceedings of SRS 2018.</p>
            <br>
            
          </div>

        </div>

        <div class="row" style="font-size: 18px">
          
          <div class="col-sm-12">
    

<?php 
  $query = "SELECT date_1 FROM dates WHERE id = '1'";
  $result = mysqli_query($connection,$query);
  $msg = "";

  if($result){
    $query2 = "SELECT * FROM dates WHERE id = '1'";
    $result2 = mysqli_query($connection,$query2);

    $val = mysqli_fetch_assoc($result2);

    $isempty = $val['date_1'];
    $isempty2 = $val['date_2'];
    $isempty3 = $val['date_3'];
    $isempty4 = $val['date_4'];
    $isempty5 = $val['date_5'];
    $isempty6 = $val['date_6'];
    $isempty7 = $val['date_7'];


    if($isempty==""){
      $msg = "SORRY! DATES ARE NOT PUBLISHED YET.";
    }else{

      echo '<table class="table text-justify">';
      echo '<tbody>';
      echo '<tr class="success"> <td style = "padding:15; padding-left:30px;">Calling full papers</td>';
      echo '<td style = "padding:15;">';
      echo $isempty;
      echo '</td>';
      echo '</tr>';


      echo '<tr class="success"> <td style = "padding:15; padding-left:30px;">Last date for submission of full paper</td>';
      echo '<td style = "padding:15;">';
      echo $isempty2;
      echo '</td>';
      echo '</tr>';

      echo '<tr class="info"> <td style = "padding:15; padding-left:30px;">Notification of acceptance</td>';
      echo '<td style = "padding:15;">';
      echo $isempty3;
      echo '</td>';
      echo '</tr>';

      echo '<tr class="info"> <td style = "padding:15; padding-left:30px;">Registration</td>';
      echo '<td style = "padding:15;">';
      echo $isempty4;
      echo '</td>';
      echo '</tr>';

      echo '<tr class="warning"> <td style = "padding:15; padding-left:30px;">Last date to submit finalized full paper</td>';
      echo '<td style = "padding:15;">';
      echo $isempty5;
      echo '</td>';
      echo '</tr>';

      echo '<tr class="warning"> <td style = "padding:15; padding-left:30px;">Date for submission of presentation</td>';
      echo '<td style = "padding:15;">';
      echo $isempty6;
      echo '</td>';
      echo '</tr>';

      echo '<tr class="danger"> <td style = "padding:15; padding-left:30px;">Proposed dates for SRS 2018</td>';
      echo '<td style = "paddi5;">';
      echo $isempty7;
      echo '</td>';
      echo '</tr>';
      echo '</tbody>';
      echo '</table>';





    }
  }else{
    $msg = "Query Error!";
  }
echo '<h3 class = "text-center"  style ="color:red; padding:20px;">';
echo $msg;
echo '</h3>';
 ?>


            
  
</div>

</div>
    </div>

      

      <hr>

  
    <br>
    <br>

      <!-- /.row -->

      

      <!-- Features Section -->
      
    <!-- /.container -->

    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
