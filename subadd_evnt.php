<!----------------include header file----------------------->
<?php
include('subadmin_header.php');
include('connection.php');
@ob_start();
@session_start();
error_reporting(0);
if($_SESSION["username"]==true)
{
 
}
else
{
	 header('location:index.php');
}
  
  ?>



<?php

if (isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$record = mysqli_query($db,"SELECT * FROM events  WHERE id='$id'") or die(mysqli_error($db));
			if ($n = mysqli_fetch_array($record))
		
			{
			                       $eventtype=$n['type'];
			                       $genre=$n['genre'];
			                       $theater=$n['theater'];
                                   $eventname=$n['name'];
                                   $image=$n['poster'];
                                    $image=$n['banner'];
                                    $starname=$n['starcast'];
			                  	  $vlink=$n['videolink'];
	                               $lang=$n['language'];
	                                 $dimention=$n['dimentions'];
	                                 $theater=$n['theater'];
                                    $stime=$n['duration'];
                                     $etime=$n['release_date'];
                                     $description=$n['description'];
                                       
			}
		
	

                        if (isset($_POST['update'])) {
                      
                                $eventtype=$_POST['eventtype'];
                                 $genre=$n['genre'];
                                 $theater=$_POST['tname'];
                                $eventname=$_POST['eventname'];
                              $stime=$_POST['stime'];
                               $etime=$_POST['etime'];
                          
                             $starname=$_POST['starname'];
                             	
                    	 $vlink=$_POST['vlink'];
	                 $lang= implode(',', $_POST['language']);
	 $dimention= implode(',', $_POST['dimention']);
	  
	    $description=$_POST['des'];
                             
                    	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
			echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			} else {
			echo "Sorry, there was an error uploading your file.";
		}
		
	$image="https://www.shreyaset.com/Shreyas/uploads/".$_FILES["image"]["name"];

		$target_dir1 = "uploads/";
	$target_file1 = $target_dir1. basename($_FILES["banner"]["name"]);
		$uploadOk1 = 1;
		$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
		
		if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file1)) {
			echo "The file ". basename( $_FILES["banner"]["name"]). " has been uploaded.";
			} else {
			echo "Sorry, there was an error uploading your file.";
		}
		
	$banner="https://www.shreyaset.com/Shreyas/uploads/".$_FILES["banner"]["name"];
	
        $id = $_GET['edit'];
        
		$query1=mysqli_query($db,"UPDATE events SET type='$eventtype',name='$eventname',duration='$stime',release_date='$etime',starcast='$starname', poster='$image',banner='$banner', videolink='$vlink', language='$lang',dimentions='$dimention',theater='$theater',description='$description' WHERE id='$id'");
        $result = mysqli_query($db,$query);
		
		 if($query1)
        {
			echo "<script>alert('  Event  Updated successfully........!');
			window.location='subadd_evnt.php';
			</script>";
        }	
		}  
	}
?>


<!----------------------sub-navbar--------------------------->
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
                                        <li><a href="#">Master</a></li>
                                        <li class="active">Add Events</li>
                                </ol>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
<!--------------Add Event form--------------------->    
        <div class="content pb-0">
            <div class="row">
                <div class="col-lg-2"></div>
                     <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">Add Event</div>
                                <div class="card-body card-block">
                                    <form action="#" method="post" class="form-horizontal"enctype="multipart/form-data">
                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                              	<label>Event Type</label>
                                                      <select class="form-control" value="<?php echo$eventtype;?>" name="eventtype"required>
                                                    <option value="<?php echo$eventtype;?>"><?php echo$eventtype;?></option>
                                                	<option value="Movie">Movie</option>
                                                   <option value="Event">Event</option>
                                                      </select>
                                            </div>          
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label">Event Genre</label>
                                                    <input type="text" name="genre" placeholder="Comedy,Horror,Romance,Thriller" class="form-control" value="<?php echo $genre;?>"required>
                                                </div>
                                                 
                                         </div>
                                          <div class="row form-group">
                                            <div class="col col-md-6">
                                              	<label>Select Theater</label>
                                                      <select class="form-control" value="<?php echo$theater;?>" name="tname" required>
                                                    <option value="<?php echo$theater;?>"><?php echo$theater;?></option>
                                                <?php
                                         $sql= mysqli_query($db,"select name from theaters ORDER BY id");
                                while ($row = mysqli_fetch_array($sql)){?>
                              <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                          <?php } ?>
                                                      </select>
                                            </div>          
                                            </div>
                                          <div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label">Event Name</label>
                                                    <input type="text" name="eventname"   placeholder="Add Event Name" class="form-control" value="<?php echo$eventname;?>"required>
                                                </div>
                                                 
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label">Star Cast</label> 
                                                    <input type="text" name="starname" placeholder="star cast Name" class="form-control" value="<?php echo $starname;?>"required>
                                                </div>
                                            </div>
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label">Event poster</label>
                                                    <input type="File" name="image" accept=".jpg,.png, .jpeg"  placeholder="Add Event Poster" class="form-control" value="<?php echo $image;?>">
                                                </div>
                                                 
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label">Event Banner</label> 
                                                  <input type="File" name="banner" accept=".jpg,.png, .jpeg"  placeholder="Add Event Poster" class="form-control" value="<?php echo $banner;?>">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="company" class=" form-control-label">video link</label>
                                                        <input type="url" name="vlink"  placeholder="Enter video link" class="form-control" value="<?php echo $vlink;?>"required>
                                                </div>
                                            </div>
                                                 <div class="row form-group">
                                                <div class="col col-md-6">
                                                    	<label>Language Type</label>
                                            <select class="form-control " value="<?php echo $lang; ?>" name="language[]" multiple="multiple" required>
                                               	<option value="<?php echo $lang; ?>"><?php echo $lang; ?></option>
                                          <?php
                                         $sql= mysqli_query($db,"select language from language ORDER BY id");
                                while ($row = mysqli_fetch_array($sql)){?>
                              <option value="<?php echo $row['language'] ?>"><?php echo $row['language'] ?></option>
                                          <?php } ?>
                                        </select>
                                   </div>
                                                
                                                <div class="col col-md-6">
                                                    	<label>Dimention Type</label>
                                                   <select class="form-control " value="<?php echo $dimention; ?>" name="dimention[]" multiple="multiple" required>
                                             	<option value="<?php echo $dimention; ?>"><?php echo $dimention; ?></option>
                                          <?php
                                         $sql= mysqli_query($db,"select dimention  from show_type ORDER BY id");
                                while ($row = mysqli_fetch_array($sql)){?>
                              <option value="<?php echo $row['dimention'] ?>"><?php echo $row['dimention'] ?></option>
                                          <?php } ?>
                                        </select>
                                                </div>
                                            </div>
                                           
                                            
                                             <div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label">Duration</label>
                                                    
                                        
                                                    <input type="text"  class="form-control" 

                                                    name="stime" value="<?php echo $stime;?>"required>
                                               
                                                </div>
                                                
                                            
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label">Release Date</label> 
                                                    <input type="date"  class="form-control"
                                                    name="etime" value="<?php echo $etime;?>" required>
                
                                                </div>
                                                
                        
                                                
                                                
                                            </div>
                                            
                                            
                                            
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="company" class="form-control-label">Description</label>
                                                      
                                                       <textarea name = "des" class="form-control"  cols=40  rows=3><?php echo $description; ?>
                                                                 </textarea>
                                                </div>
                                            </div>
            
                                                    <center>  <button type="submit" name="submit" class="btn btn-danger" >Submit</button>
                                              <button type="update" name="update" class="btn btn-danger">Update</button>   </center>
                                    </form>
                                   </div>
                                   </div>
                           </div>
            
        </div> <!-- .content -->
        <!----------------------end of form---------------------------------------->
<!--------------------------footer start------------------------>
     <?php
       include('footer.php');
     ?> 
                            <?php

                        if (isset($_POST['submit'])) {
                      // receive all input values from the form
                                $eventtype=$_POST['eventtype'];
                                 $genre=$_POST['genre'];
                                $theater=$_POST['tname'];
                            
                                $eventname=$_POST['eventname'];
                              $stime=$_POST['stime'];
                              
                    
                               $etime=$_POST['etime'];
                               
                               
                             $starname=$_POST['starname'];
                    	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			} else {
			echo "Sorry, there was an error uploading your file.";
		}
		
	$image="https://www.shreyaset.com/Shreyas/uploads/".$_FILES["image"]["name"];
	

		$target_dir1 = "uploads/";
	$target_file1 = $target_dir1. basename($_FILES["banner"]["name"]);
		$uploadOk1 = 1;
		$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
		
		if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file1)) {
			echo "The file ". basename( $_FILES["banner"]["name"]). " has been uploaded.";
			} else {
			echo "Sorry, there was an error uploading your file.";
		}
		
	$banner="https://www.shreyaset.com/Shreyas/uploads/".$_FILES["banner"]["name"];
	

	 $vlink=$_POST['vlink'];
	 $lang= implode(',', $_POST['language']);
	 $dimention= implode(',', $_POST['dimention']);
   $description=$_POST['des'];
$query= mysqli_query($db,"INSERT INTO events(type,genre,theater,name,duration,release_date,starcast,poster,banner,videolink,language,dimentions,description) 
VALUES ('$eventtype','$genre','$theater','$eventname','$stime','$etime','$starname','$image','$banner','$vlink','$lang','$dimention','$description')")or die(mysqli_error($query));

$q=mysqli_query($db,"select id from events order by id desc limit 1");
$s=mysqli_fetch_array($q);
$event_id=$s['id'];

$qu=mysqli_query($db,"INSERT INTO `event_theatre`(`theater_id`, `event_id`, `address_id`, `event_date`, `event_time`, `screen_no`, `vip`, `mvp`, `normal`) 
select t.`id`, '$event_id', t.`address_id`, t.`event_date`, t.`event_time`, t.`screen_no`, t.`vip`, t.`mvp`, t.`normal` 
from theaters t, events e where t.id=e.theater and e.id='$event_id' ");









 if($query)
                                                           {
                                            echo "<script>alert('Event  added Successfully........!');
                                            window.location='subadd_evnt.php';
                                            </script>";
                                            } 
}
?>
    
                    
                    
                    
                    
                    
                    
                    
                    
                    