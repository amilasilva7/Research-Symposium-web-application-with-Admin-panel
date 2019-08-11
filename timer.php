<?php require_once("includes/connection.php") ?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
h6 {
  text-align: center;
  font-size: 10px;
  margin-top:0px;
}
</style>
</head>
<body>



<?php 
    $date = '';
    $query = "SELECT date_7 FROM dates";
    $result = mysqli_query($connection,$query);
    if($result){
        if(mysqli_num_rows($result)>0){

            $list = mysqli_fetch_assoc($result);
            if($list['date_7']==""){
                
                echo '<p>WELCOME</p>';
            }else{
                 echo '<p id="demo"></p>';
            }
            $date .= $list['date_7'];

        }else{
            echo "WELCOME";
        }
    }else{
        echo "Query error";
    }


 ?>


<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $date ?> 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>

