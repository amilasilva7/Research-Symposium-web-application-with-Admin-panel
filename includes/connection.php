<?php 
$connection= mysqli_connect('localhost','root','','symposiumdb');

	if (mysqli_connect_errno()) {
		die("database faild".mysqli_connect_error());
		
	}else{
		//echo " Database Successful.";
		
	}
  ?>