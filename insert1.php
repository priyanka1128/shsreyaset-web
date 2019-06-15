<?php
	
include('connection.php');
	


	
	$rn=$_POST['rowI'];
	
	$cn=$_POST["columnI"];
	
	$sql=mysqli_query($db,"select id from hall order by id desc limit 1");
	$row=mysqli_fetch_array($sql);
	$id=$row['id'];
	
	
	$sql="INSERT INTO seat_position(`id`,`row_p`,`column_p`)
	VALUES ('$id','$rn','$cn')";
	mysqli_query($db,$sql); 
	
?> 				