<?php
	
include('connection.php');
	


	
	$rn=$_POST['rowI'];
	
	$cn=$_POST["columnI"];
	
	$sql=mysqli_query($db,"select id from hall order by id desc limit 1");
	$row=mysqli_fetch_array($sql);
	$id=$row['id'];
	
	
	$sql="delete from  seat_position where `row_p`='$rn' and`column_p`='$cn'";
	mysqli_query($db,$sql); 
	
?> 				