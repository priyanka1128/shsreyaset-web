<?php
	
include('connection.php');
	
	
	$rn=$_POST['ru'];
	
	$cn=$_POST["cu"];
	$hn=$_POST["hn"];
	
	$sql="INSERT INTO hall(`hall_name`,`row_r`,`column_c`)
	VALUES ('$hn','$rn','$cn')";
	mysqli_query($db,$sql); 
	
	
?> 				