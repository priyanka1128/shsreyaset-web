<?php
include('connection.php');
include('header.php');
/*@ob_start();
@session_start();*/
error_reporting(0);
/*if($_SESSION["username"]==true)
{
 
}
else
{
	 header('location:index.php');
}*/

 if(isset($_GET['delet']))
   {

            $id=$_GET['delet'];
            $update_query = "delete  from genre  WHERE id='$id'";
            $query= mysqli_query($db, $update_query);
            
                if($query)
                        {
                        echo "<script>alert(' Deleted genre Successfully........!');
                        window.location='gener.php';
                        </script>";
                        } 
    
   
   }
    
   if (isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$record = mysqli_query($db,"SELECT * FROM genre WHERE id='$id'") or die(mysqli_error($db));
			if ($n = mysqli_fetch_array($record))
		
			{
			      $lang=$n['genre'];
			}
	}
    	if (isset($_POST['update'])) 
	        {
	  $lang1=$_POST['genre'];
	    $id = $_GET['edit'];
                $query1=mysqli_query($db,"UPDATE genre SET genre='$lang1' WHERE id='$id'");
                $result = mysqli_query($db,$query);
	        }

			    ?>
<!----------------------Horizontal sub-navbar--------------------------->
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
                                            <li class="active">Add Genre</li>
                                </ol>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<!-------------------------- form start---------------------------------------->   
       <div class="content pb-0">
            <div class="row">
                <div class="col-lg-2"></div>
                     <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">Add Genre</div>
                                <div class="card-body card-block">
                                    <form action="#" method="post" class="form-horizontal"enctype="multipart/form-data">
                                        <div class="row form-group">
                                            <div class="col col-md-12">
                                        
                           
                                             <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="company" class=" form-control-label">GENRE</label>
                                                    <input type="time-local" value="<?php echo $lang;?>"id="postal-code" class="form-control" id="meeting-time"
                                                    name="genre">
                                                </div>
                                                
                                                
                                            </div>
                                            
                                          <center> <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                                         <button type="submit" name="update" class="btn btn-danger">Update</button>    </center>
                                    </form>
                        </div>
                </div>
            </div>
            
        </div> <!----------------------------------- .content ---------------------------------------------------------------------------->
<!----------------------------------------------------------------------------end of form--------------------------------------------------------------------------------------------------------------->
    
    
     <?php

       if (isset($_POST['submit']))
       {
           $gener=$_POST['genre'];
         	$sql_u = "SELECT * FROM genre  WHERE genre='$gener'";
    	    $res_u =  mysqli_query($db, $sql_u);
  
          if (mysqli_num_rows($res_u) >0)
            {
                echo "<script>alert(' genre , already exists........!');
                window.location='gener.php';
                </script>";
            } 
                                            
                                            
            else{
                $query="INSERT into genre (genre)
                VALUES('$gener');" or die(mysqli_error($query));
                mysqli_query($db, $query);
            
             
            if($query)
            {
                echo "<script>alert('genre  added Successfully........!');
                window.location='gener.php';
                </script>";
            } 
                                            
            }
       }
    ?>

     <div class="row">
        <div class="col-lg-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Added Event type</strong>
                    </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Genre</th>
                                             <th>ACTION</th>
                                        </tr>
                                    </thead>
                                        <tbody>                          
                                            <?php
                                                $sql = ("SELECT * FROM genre");
                                                
                                                $result=mysqli_query($db,$sql)or die(mysqli_error($db));
                                                while($row=mysqli_fetch_array($result)) 
                                                { 
                                            ?>
                                                 <tr>
                                                    <td data-title="id"><?php echo $row["id"];?></td>
                                                    <td data-title="type"><?php echo $row["genre"]; ?></td>
                                                    <td> <a href="gener.php?delet=<?php echo $row["id"]; ?>"><i class="fa fa-trash" style="width:20px;color:#ec2d5d;"></i></a></td>
                                                     <td> <a href="gener.php?edit=<?php echo $row["id"]; ?>"><i class="fa fa-edit" style="width:20px;color:#ec2d5d;"></i></a></td>
                                                </tr>
                                                    <?php } ?>
                                        </tbody>
                            </table>
                        </div>
                </div>
            </div>
                        <div class="col-lg-1"></div>   
        </div>
    </div>  
    
                <div class="clearfix">&nbsp;</div>
    
    
  <!---------------------------------------Footer-------------------------------------- > 
    
     <?php
       include('footer.php');
     ?> 
<!------------------------------------------End of Code---------------------------------->