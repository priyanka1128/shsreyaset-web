<?php
include('header.php');
include('connection.php');
session_start();
if($_SESSION["username"]==true)
{
 
}
else
{
	 header('location:index.php');
}
?>

<head> 
        <meta charset=utf-8 /> 
        
       <style type="text/css"> 
        body {margin: 30px;} 
        .page{


 /* width: 50px;*/
  padding: 35px;
  border-spacing: 15px;
  border-color:white;
  margin: 10px;
  -webkit-column-gap: 100px; /* Chrome, Safari, Opera */
  -moz-column-gap: 70px; /* Firefox */
  column-gap: 70px;
 
        }
       .selected {background: coral;}
	   
	   
        </style> 
        </head>



<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                           
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li class="active">Create Seats</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

 


    <div class="content pb-0">
        <div class="row">
          
                <div class="col-md-12">
                    <center>
                    <!--	<form>
                            <input type="button" onclick="createTable()" value="Create the table"> 
                        </form>-->
                                     
                    <table id="myTable" class="page" border="1"> 
                    </table>
                                    	
                                    		
                    </center>     
                </div>
            
        </div> 
          

 
  

      
   <?php
   include('footer.php');
   ?>
 </div>

<?php

$sql=mysqli_query($db,"select row_r,column_c from hall order by id desc limit 1");
$d=mysqli_fetch_array($sql);

$r= $d['row_r'];
$c= $d['column_c'];


?>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script>



$(document).ready(function(){
	
rn = '<?php echo $r;?>';

cn = '<?php echo $c;?>';
 
 
 
 
 for(var r=0;r<parseInt(rn,10);r++)  
  {
    
   var x=document.getElementById('myTable').insertRow(r);

   for(var c=0;c<parseInt(cn,10);c++)  
    {
		 
     var y=  x.insertCell(c);
	
		y.innerHTML=
	 "<img width=\'30px\' height=\'20px'>";
	 
	
    /*  y.innerHTML=
	 "<img src=\'../seat_arrnagment/armchair.png\' width=\'30px\' height=\'15px'><input class='coupon_question' type='checkbox' id='chair' value='' onclick='' />"+r+""+c;
	 *///seat(""+r+""+c);
	 
  }
 


    
   } 
   
 /*  var myNode = document.getElementById("myTable");
var tds = myNode.getElementsByTagName("td");
	alert(tds);
 */
	
  

  
  
  
  
  




  
 
});

/* function seat(r,c){
alert(""+r+"");	
} */







</script>
<?php
$sql=mysqli_query($db,"select id,row_r,column_c from hall order by id desc limit 1");
$d=mysqli_fetch_array($sql);
$i= $d['id'];
$r= $d['row_r'];
$c= $d['column_c'];
?>
<script>

$(document).ready(function(){


});
</script>

<?php
$sql1=mysqli_query($db,"select row_p,column_p from seat_position where id='$i' order by seat_id ");
while($d2=mysqli_fetch_array($sql1)){
$r2= $d2['row_p'];
$c2= $d2['column_p'];
?>
<script>

$(document).ready(function(){
	
	var table = document.getElementById('myTable');

		 var rowCount = table.rows.length;
			

			var colCount = table.rows[0].cells.length;	
	
	
 var rowIndex = '<?php echo $r2;?>';
  var columnIndex = '<?php echo $c2;?>';
  
   var r = '<?php echo $r;?>';
   var c = '<?php echo $c;?>';
  
  /* for(var i =0;i<r;i++){
   for(var j =0;j<c;j++){ */

   /*  if(i==rowIndex && j==columnIndex){
  */
   table.rows[rowIndex].cells[columnIndex].style.background ="skyblue";
  /*  } else if(i!=rowIndex && j!=columnIndex){
	   
	  table.rows[i].cells[j].style.background ="white";
   } */
  /*  }
} */
  
  
/* for(var i =0;i<r;i++){
   for(var j =0;j<c;j++){

   /*  if(i==rowIndex && j==columnIndex){
 
   table.rows[rowIndex].cells[columnIndex].style.background ="red"; */
  /*  } else if(i!=rowIndex && j!=columnIndex){
	   
	  table.rows[i].cells[j].style.background ="white";
   } */
   /*}
} */
});
    
</script>
<?php } ?>


           
 