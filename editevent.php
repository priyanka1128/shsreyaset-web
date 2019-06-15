<?php
session_start();
include('header.php');
include('connection.php');
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
                	$the= mysqli_query($db,"SELECT  id,name  FROM theaters  WHERE id='$theater'") or die(mysqli_error($db));
			if ($nn = mysqli_fetch_array($the)){
			    $id2 =$nn['id'];
			  $theater1=$nn['name'];
			}
		
                
                $eventname=$n['name'];
                $image=$n['poster'];
                $image1=$n['banner'];
                $starname=$n['starcast'];
          	    $vlink=$n['videolink'];
                $lang=$n['language'];
              
                
                $stime=$n['duration'];
                $etime=$n['release_date'];
                $description=$n['description'];
                $tc=$n['terms_conditions'];
                                       
			}
			
/*----------------------------UPDATE OPEARTION---------------------------------- */	
	        if (isset($_POST['update'])) 
	        {
                      
                $eventtype=$_POST['eventtype'];
                $genre=implode(',', $_POST['genre']);
                $theater2=$_POST['tname'];
                $eventname=$_POST['eventname'];
                $stime=$_POST['stime'];
                $etime=$_POST['etime'];
                $starname=$_POST['starname'];
                $vlink=$_POST['vlink'];
                $lang= implode(',', $_POST['language']);
                $dimention= implode(',', $_POST['dimention']);
                $description=$_POST['des'];
                $tc=$_POST['terms_conditions'];
                $target_dir = "uploads/";
	            $target_file = $target_dir . basename($_FILES["image"]["name"]);
		        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
		        {
			        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			    }
    			    else 
    		        	{
    		            	echo "Sorry, there was an error uploading your file.";
    		            }
		        $image="https://www.shreyaset.com/Shreyas/uploads/".$_FILES["image"]["name"];
                $target_dir1 = "uploads/";
	            $target_file1 = $target_dir1. basename($_FILES["banner"]["name"]);
		        $uploadOk1 = 1;
		        $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
		
		        if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file1)) 
		        {
			        echo "The file ". basename( $_FILES["banner"]["name"]). " has been uploaded.";
		    	} 
        			else 
        			{
        			echo "Sorry, there was an error uploading your file.";
        		    }
		        $banner="https://www.shreyaset.com/Shreyas/uploads/".$_FILES["banner"]["name"];
	            $id = $_GET['edit'];
                $query1=mysqli_query($db,"UPDATE events SET type='$eventtype',genre='$genre',name='$eventname',duration='$stime',release_date='$etime',starcast='$starname', poster='$image',banner='$banner', videolink='$vlink', language='$lang',description='$description',terms_conditions='$tc' WHERE id='$id'");
                $result = mysqli_query($db,$query1);
		    $query2=mysqli_query($db,"Update theaters SET name=' $theater2' where id=$id2 and name='$theater1'");
	        $theater2 = mysqli_query($db,"SELECT id FROM events WHERE updated_at=(SELECT MAX(updated_at) FROM events)");
                $theater_row1 = mysqli_fetch_array($theater2);
                $th_id1 = $theater_row1['id'];
                echo $th_id1 ;
                 $address1 = mysqli_query($db,"SELECT id FROM theaters WHERE updated_date = (SELECT MAX(updated_date) FROM theaters)");
                $address_row1 = mysqli_fetch_array($address1);
                $ad_id1 = $address_row1['id'];
                echo $ad_id1 ;
                
                mysqli_query($db,"update events set theater='$th_id1' WHERE id='$ad_id1'");
                
		        if($query1)
                {
        			echo "<script>alert('  Event  Updated successfully........!');
        			window.location='add_evnt.php';
        			</script>";
                }	
		    }  
	}
?> <div class="breadcrumbs">
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
    
<!-----------------------------------------------------------Add Event form------------------------------------------------------------>    
        <div class="content pb-0">
            <div class="row">
                <div class="col-lg-2"></div>
                     <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">Add Event</div>
                                <div class="card-body card-block">
                                    <form action="#" method="post"id="comment_form" class="form-horizontal"enctype="multipart/form-data">
                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                              	<label>Event Type</label>
                                                      <select class="form-control" value="<?php echo$eventtype;?>" name="eventtype"required>
                                                    <option value="<?php echo$eventtype;?>"><?php echo$eventtype;?></option>
                                                	<option value="Movie">Movie-Event</option>
                                                   <option value="Event">Live-Concert</option>
                                                      </select>
                                                      
                                            </div> 
                                                           <div class="col col-md-6">
                                              	<label>Select Theater</label>
                                                      <select class="form-control" value="<?php echo$theater1;?>" name="tname" required>
                                                         <option value="<?php echo$theater1;?>"><?php echo$theater1;?></option>  
                                                <?php
                                                
                                         $today = date("Y-m-d");
                                         $sql= mysqli_query($db,"select id,name from theaters  where event_date>='$today'");
                                while ($row = mysqli_fetch_array($sql)){?>
                              <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                          <?php } ?>
                                                      </select>
                                            </div>
                                                 
                                         </div>
                                          <div class="row form-group">
                             
                                              <div class="col col-md-6">
                                                    <label>Event Genre</label>
                                                              <select class="form-control " value="<?php echo $genre; ?>" name="genre[]" multiple="multiple" required>
                                               	<option value="<?php echo $genre; ?>"><?php echo $genre; ?></option>
                                          <?php
                                         $sql= mysqli_query($db,"select genre from genre ORDER BY id");
                                while ($row = mysqli_fetch_array($sql)){?>
                              <option value="<?php echo $row['genre'] ?>"><?php echo $row['genre'] ?></option>
                                          <?php } ?>
                                        </select>
                                                </div>

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
                                   
                                            
                                            </div>
                                          <div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label">Event Name</label>
                                                    <input type="text" name="eventname"   placeholder="Add Event Name" id="name" class="form-control" value="<?php echo$eventname;?>"required>
                                                </div>
                                                 
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label">Star Cast</label> 
                                                    <input type="text" name="starname" placeholder="star cast Name" class="form-control" value="<?php echo $starname;?>"required>
                                                </div>
                                            </div>
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label">Event poster</label>
                                                    <input type="File" name="image" accept=".jpg,.png,.jpeg"  placeholder="Add Event Poster" class="form-control" value="<?php echo $image;?>">
                                                    <p><span style="color:red;" >poster size should be 250pxX350px</span></p>
                                                </div>
                                                 
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label">Event Banner</label> 
                                                  <input type="File" name="banner" accept=".jpg,.png,.jpeg"  placeholder="Add Event Poster" class="form-control" value="<?php echo $image1;?>">
                                                   <p><span style="color:red;" > banner size should be 1330pxX520px</span></p>
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
                                                    <label for="company" class=" form-control-label">Duration</label>
                                                    
                                        
                                                    <input type="text"  class="form-control" 

                                                    name="stime" value="<?php echo $stime;?>"required>
                                               
                                                </div>
                                                
                                            
                                                <div class="col col-md-6">
                                                    <label for="company" class=" form-control-label"> Event Date</label> 
                                                    <input type="date"  class="form-control"
                                                    name="etime" id="date" value="<?php echo $etime;?>" required>
                
                                                </div>
                                                
                        
                                                
                                                
                                            </div>
                                            
                                             <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="company" class="form-control-label">Description</label>
                                                      
                                                       <textarea name = "des" class="form-control"  cols=40  rows=3><?php echo $description; ?>
                                                                 </textarea>
                                                </div>
                                            </div>
            
                                            
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="company" class="form-control-label">Terms & Conditions</label>
                                                      
                                                       <textarea name = "terms_conditions" class="form-control"  cols=40  rows=3><?php echo $tc; ?>
                                                                 </textarea>
                                                </div>
                                            </div>
            
                                                    <center> 
                                              <button type="update" name="update" class="btn btn-danger">Update</button>   </center>
                                    </form>
                                   </div>
                                   </div>
                           </div>
            
        </div> <!-- .content -->
        <!----------------------end of form----------------------------------------> 
              <!--------------------------footer ------------------------>
          <?php
           include('footer.php');
       ?> 
       <!---------------------------------------END OF CODE---------------