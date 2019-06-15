<?php
session_start();
include('header.php');
include('connection.php');
?>

<!---------------------------------------------------EDIT Operation----------------------------------------------------------------------------------------->

<!------------------------------ receive all input values from the form----------------------------------------------------->
   <?php

    if (isset($_POST['submit'])) 
    {
        $eventtype=$_POST['eventtype'];
        $genre= implode(',',$_POST['genre']);
        $theater=$_POST['tname'];
        $eventname=$_POST['eventname'];
        $stime=$_POST['stime'];
        $etime=$_POST['etime'];
        $starname=$_POST['starname'];
        
 /*---------------------------CODE FOR UPLAODING POSTER AND BANNER-----------------------------------------------------------*/
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
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
	    $vlink=$_POST['vlink'];
	    $lang= implode(',', $_POST['language']);
	    
        $description=$_POST['des'];
        $tc=$_POST['terms_conditions'];


/*--------------------------------------INSERT QUERY-------------------------------------------------------------*/

        $query= mysqli_query($db,"INSERT INTO events(type,genre,theater,name,duration,release_date,starcast,
                                   poster,banner,videolink,language,description,terms_conditions) 
                                   
            VALUES ('$eventtype','$genre','$theater','$eventname','$stime','$etime','$starname','$image','$banner',
                    '$vlink','$lang','$description','$tc')")or die(mysqli_error($query));
                   
                   define( 'API_ACCESS_KEY', 'AAAAWmdwZu0:APA91bEg2-266RHWlTKqVWXQwHzZ1COMpgyhxCIsKilTkFbH43lmTAD-OpdSyFMdOcx2F5k2lgd5-UZhEylXDIv6IS76V9AmIASfEYJ-rLdNmoCD_DfHSj1WUe9EowHmbvjmO9qYc3So' );

            $request_event_details = mysqli_query($db,"SELECT name,banner FROM events WHERE id = (SELECT MAX(id) FROM events) ");
            $event_details_row = mysqli_fetch_array($request_event_details);
            $event_name = $event_details_row['name'];
            $event_banner = $event_details_row['banner'];
             
            $msg = array
            (
            	'message' => 'Tap Here For More Info',
                'title' => 'New Event: '.$event_name,
                'image' => $event_banner,
                'type' => 'All',
            );
            $fields = array
            (
            	'to' 	=> "/topics/com.morgat.shreyaset" ,
            	'data'	=> $msg
            );
            
            $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );
                 
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
            $result = curl_exec($ch );
            curl_close( $ch );
  

/*-----------------------------------------CODE FOR INSERT DATA INTO  event_theater-----------------------------------------------------------------*/
        $q=mysqli_query($db,"select id from events order by id desc limit 1");
        $s=mysqli_fetch_array($q);
        $event_id=$s['id'];

        $qu=mysqli_query($db,"INSERT INTO `event_theater`(`theater_id`, `event_id`, `address_id`,`city`,`event_date`, `event_time`,
                                `screen_no`, `mip`, `vvip`,`vip`, `normal`) 
        select t.`id`, '$event_id', t.`address_id`,t.`city`, t.`event_date`, t.`event_time`, t.`screen_no`, t.`mip`, t.`vvip`,t.`vip`, t.`normal` 
        from theaters t, events e where t.id=e.theater and e.id='$event_id'");
/*-------------------------------------------------------------------------------------------------------*/
 /*$theater1 = mysqli_query($db,"SELECT id FROM events WHERE created_at = (SELECT MAX(created_at) FROM events)");
                $theater_row = mysqli_fetch_array($theater1);
                $th_id1 = $theater_row['id'];
                echo $th_id1 ;
                
                $address1 = mysqli_query($db,"SELECT address_id FROM event_theater WHERE created_date = (SELECT MAX(created_date) FROM event_theater)");
                $address_row1 = mysqli_fetch_array($address1);
                $ad_id1 = $address_row['address_id'];
                echo $ad_id1 ;*/
/*
        
     $query1=mysqli_query($db,"select * from events desc limit 1");
                    $ress=mysqli_fetch_array($query1);
                    $eid=$ress['id'];
                    var_dump($eid);
                $row1=("select th.`address_id` from event_theater th, events e where th.theater_id=e.theater and th.event_id='$eid'");
               $ress1=mysqli_fetch_array($row1);
                 $add=$ress1['address_id'];
   var_dump($add);
   $address=mysqli_query($db,"UPDATE events SET address_id='$add' where id='$eid'");
   echo $address;
                */
    

            if($query)
                     {
                        echo "<script>alert('Event  added Successfully........!');
                        window.location='add_evnt.php';
                        </script>";
                    } 
    }
?>
      
<!-----------------------------------------------------sub-navbar------------------------------------------------------------------>
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
                              <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
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
            
                                                    <center>  <button type="submit" name="submit" class="btn btn-danger" >Submit</button>
                                              <button type="update" name="update" class="btn btn-danger">Update</button>   </center>
					        <center>  <button type="submit" name="submit" class="btn btn-danger" >Submit</button>
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
       <!---------------------------------------END OF CODE------------------------------------------->
                         
