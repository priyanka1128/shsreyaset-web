<?php
    include('subadmin_header.php');
    include('connection.php');
/*/* ---------------------Edit the form--------------*/
if(isset($_GET['delet']))
   {

            $id=$_GET['delet'];
            $update_query = "delete  from theaters  WHERE id='$id'";
            $query= mysqli_query($db, $update_query);
            
                if($query)
                        {
                        echo "<script>alert(' Deleted Venue Successfully........!');
                        window.location='subseat.php';
                        </script>";
                        } 
    
   
   }

 if(isset($_GET['edit']))
	{
		$id=$_GET['edit'];
		$record = mysqli_query($db,"SELECT * FROM theaters  WHERE id='$id'") or die(mysqli_error($db));
			if ($n = mysqli_fetch_array($record))
		
			{
                $theater=$n['name'];
                $address=$n['address_id'];
                		$the= mysqli_query($db,"SELECT * FROM  address  WHERE id='$address'") or die(mysqli_error($db));
			if ($nn = mysqli_fetch_array($the)){
			    $add1=$nn['map_address'];
			    $id1=$nn['id'];
			  
			}
		    
                $capacity=$n['capacity'];
                $city=$n['city'];
                $event_date=$n['event_date'];
                $event_time=$n['event_time'];
                $arr = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$event_time);   
            

$time1=$arr[0];
$time2=$arr[1];

                $screen=$n['screen_no'];
          	    $mip=$n['mip'];
          	  
                $vvip=$n['vvip'];
                $vip=$n['vip'];
                $normal=$n['normal'];
                
			}                        
	}	
	
			if (isset($_POST['update'])) 
	        {
                 
           
            $tnamea=$_POST['tname'];
        
            $address3=$_POST['address'];
			
			
            $citya=$_POST['city'];
           
             $capacitya=$_POST['capacity'];
             
            $datea=$_POST['date'];
             $time1=$_POST['time'];
           
             $time2=$_POST['time1'];
           
             $time=$time1.$time2;
             
            $screena=$_POST['screen'];
            $mipa=$_POST['mip'];
            
            $vvipa=$_POST['vvip'];
           
            $vipa=$_POST['vip'];
            
            $normala=$_POST['normal'];
           
		    $id=$_GET['edit'];
		   
            $query3=mysqli_query($db,"UPDATE  theaters SET name='$tnamea',city='$citya',capacity='$capacitya',event_date='$datea',event_time='$time',screen_no='$screena',mip='$mipa',vvip='$vvipa',vip='$vipa',normal='$normala' WHERE id='$id'");
             $query2=mysqli_query($db,"Update address SET map_address='$address3' where id=$id1 and map_address='$add1'  ");
	        $theater1 = mysqli_query($db,"SELECT id FROM theaters WHERE updated_date = (SELECT MAX(updated_date) FROM theaters)");
                $theater_row1 = mysqli_fetch_array($theater1);
                $th_id1 = $theater_row1['id'];
                echo $th_id1 ;
                
                $address1 = mysqli_query($db,"SELECT id FROM address WHERE 	updated_at = (SELECT MAX(updated_at) FROM address)");
                $address_row1 = mysqli_fetch_array($address);
                $ad_id1 = $address_row1['id'];
                echo $ad_id1 ;
                
                mysqli_query($db,"update theaters set address_id = '$ad_id1' WHERE id='$th_id1'");
                
                if($query3)
                     {
                        echo "<script>alert('Theater updated Successfully........!');
                        window.location='subseat.php';
                        </script>";
                    }   
                
	        }    
	        
	        
	
/*-------------------------------------------------------------------------------------------------*/

?>

 
 <!--------------------------Horizontal Sub-navbar------------------------->
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
      
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Seat Allocation</div>
                        <div class="card-body card-block">
                            <form action="#" method="post" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                	    <label for="company" class=" form-control-label">Theater Name</label> 
                                        <input type="text" name="tname" placeholder="Enter Theater Name" class="form-control"value="<?php echo  $theater;?>"required>
                                    </div>
                               
                                    <div class="col col-md-6">
                                	    <label for="company" class=" form-control-label">Theater Capacity</label> 
                                        <input type="text" name="capacity" placeholder=" Enter Capacity of Theater" class="form-control"value="<?php echo  $capacity;?>"required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-12">
                                	    <label for="company" class=" form-control-label">Address</label> 
                                        <input type="text" name="address" placeholder=" Enter Address in Only Url" class="form-control" value="<?php echo $add1;?>"required>
                                    </div>
                                </div>
                              <div class="row form-group">
                                    <div class="col col-md-6">
                                	    <label for="company" class=" form-control-label">Event Date</label> 
                                        <input type="date" name="date" placeholder=" Enter the Event Time" class="form-control"value="<?php echo $event_date;?>"required>
                                    </div>
                                    <div class="col col-md-6">
                                	    <label for="company" class=" form-control-label">City Name</label> 
                                        <input type="text" name="city" placeholder="Enter City " class="form-control"value="<?php echo $city;?>"required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                	    <label for="company" class=" form-control-label">Event Time</label> 
                                        <input type="time" name="time" placeholder=" Enter The  Event Date" class="form-control" value="<?php echo $time1;?>"required>
                                    </div>
                                    <div class="col col-md-3">
                                              	<label>Event Time</label>
                                                      <select class="form-control" name="time1" required >
                                                    <option value="value="<?php echo $time2;?>""><?php echo $time2;?></option>
                                                	<option value="AM">AM</option>
                                                   <option value="PM">PM</option>
                                                      </select>
                                            </div>          
                              
                                    <div class="col col-md-6">
                                	    <label for="company" class=" form-control-label">Event Screen</label> 
                                        <input type="text" name="screen" placeholder=" Enter The Screen No" class="form-control"value="<?php echo $screen;?>"required>
                                    </div>
                                </div>
                               
                                 <div class="row form-group">
                                    <div class="col col-md-6">
                                	    <label for="company" class=" form-control-label">MIP</label> 
                                        <input type="text" name="mip" placeholder=" Enter MVP Seats" class="form-control"value="<?php echo $mip;?>" required>
                                    </div>
                               
                                    <div class="col col-md-6">
                                	    <label for="company" class=" form-control-label">VVIP</label> 
                                        <input type="text" name="vvip" placeholder="Enter VIP Seats" class="form-control"value="<?php echo $vvip;?>" required>
                                    </div>
                                </div>
                                 <div class="row form-group">
                                    <div class="col col-md-6">
                                	    <label for="company" class=" form-control-label">VIP</label> 
                                        <input type="text" name="vip" placeholder="Enter VIP Seats" class="form-control" value="<?php echo $vip;?>"required>
                                    </div>
                               
                                    <div class="col col-md-6">
                                	    <label for="company" class=" form-control-label">FANS</label></label> 
                                        <input type="text" name="normal" placeholder=" Enter Normal Seats" class="form-control"value="<?php echo $normal;?>"required>
                                    </div>
                                </div>
                                    <center> <button type="submit"  name="submit" class="btn btn-danger" >Add</button>
                                    <button type="submit"  name="update" class="btn btn-danger">Update</button>
                                    </center>
                            </form>
                         </div>
                </div>
                
                </div>
                <div class="col-lg-4">
                  <div class="row">
                <div class="card">
                    <div class="card-header">Generate code</div>
                    <div class="card-body card-block">
                            <form action="process.php" method="post" class="form-horizontal">
                                    <div class="col col-md-12">
                                        <label>Select Category</label>
                                            <select class="form-control" name="type" value="<?php echo $type;?>"required>
                                                    <option value="<?php echo$type;?>"><?php echo $type;?></option>
                                                    <option value="vip">VIP</option>
                                                    <option value="mvp">MVP</option>
                                                   
                                            </select><br><br>
                                    </div>
                                    <div class="row form-group">
                                    <div class="col col-md-12">
                                	    <label for="company" class="form-control-label">Mobile No</label> 
                                        <input type="text" name="mobile" placeholder="Enter mobile no" class="form-control">
                                    </div>
                                </div>
                               
                                   <center> <button type="submit" name="send" class="btn btn-danger">Send</button></center>
                            </form>
                    </div>      
                </div>
            </div>
    </div>
</div>   <!-- .content -->
    
      <?php
       if(isset($_POST['submit'])) 
       {
           
           
            $mip=$_POST['mip'];
            $vvip=$_POST['vvip'];
            $vip=$_POST['vip'];
            $normal=$_POST['normal'];
            $tname=$_POST['tname'];
            $capacity=$_POST['capacity'];
            $address=$_POST['address'];
            echo $address;
            $city=$_POST['city'];
            
            $date=$_POST['date'];
             $time2=$_POST['time'];
             $time1=$_POST['time1'];
             $time=$time2.$time1;
             $screen=$_POST['screen'];
               
              mysqli_query($db,"INSERT INTO theaters(name,city,capacity,event_date,event_time,screen_no,mip,vvip,vip,normal) VALUES('$tname','$city','$capacity','$date','$time','$screen','$mip','$vvip','$vip','$normal')");
              mysqli_query($db,"INSERT INTO address(map_address) VALUES(' $address')");
    
                $theater = mysqli_query($db,"SELECT id FROM theaters WHERE created_date = (SELECT MAX(created_date) FROM theaters)");
                $theater_row = mysqli_fetch_array($theater);
                $th_id = $theater_row['id'];
                echo $th_id ;
                
                $address = mysqli_query($db,"SELECT id FROM address WHERE created_at = (SELECT MAX(created_at) FROM address)");
                $address_row = mysqli_fetch_array($address);
                $ad_id = $address_row['id'];
                echo $ad_id ;
                
                mysqli_query($db,"update theaters set address_id = '$ad_id' WHERE id='$th_id'");
                
                
                
       
                
                
             /*   
                 $event = mysqli_query($db,"select e.id as eid,t.id as tid from events e join theaters t on t.id=e.theater order by e.id desc limit 1");
                $event_row = mysqli_fetch_array($event);
                $event_id = $event_row['eid'];
                $theater_id = $event_row['tid'];
                var_dump($event_id);
                var_dump($theater_id);
                
                mysqli_query($db,"update theaters set event_id ='$event_id' WHERE id='$theater_id'");*/
               
               
            
       if(!$query1)
                                                           {
                                            echo "<script>alert('Theater Created Successfully........!');
                                            window.location='subseat.php';
                                            </script>";
                                            } 
            }
     
       
        ?>
           <div class="content pb-0">
           <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">View All Events</strong>
                </div>
                       <div class=" card-body pagetable">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
        
                                    <th>Theater</th>
                                    <th>Address</th>
                                    <th>City Name</th>
                                    <th>Event Date</th>
                                    <th>Event Time</th>
                                    <th>Screen no</th>
                                    <th>Mip</th>
                                     <th>Vvip</th>
                                      <th>Vip</th>
                                     <th>Normal</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                              
                    </div>
            </div> 
                                <tbody>
         </div>                     
                                         <?php
                                        $sql = ("SELECT* FROM  theaters ");
                                         
                                        $result=mysqli_query($db,$sql)or die(mysqli_error($result));
                                        while($row=mysqli_fetch_array($result)) 
                                        { 
                                            
                                            /*--------------------------theater name code--------------------------*/
                                           /* $theater=$row['theater'];
                	$the= mysqli_query($db,"SELECT name  FROM theaters  WHERE id='$theater'") or die(mysqli_error($db));
			if ($nn = mysqli_fetch_array($the)){
			    $theater1=$nn['name'];
			*//*
			                               $event=$row['event_id'];
                	$the= mysqli_query($db,"SELECT name  FROM events WHERE id='$event'") or die(mysqli_error($db));
			if ($nn = mysqli_fetch_array($the)){
			    $event1=$nn['name'];
			}*/
			                               $address=$row['address_id'];
			                               
                	$the= mysqli_query($db,"SELECT * FROM  address  WHERE id='$address'") or die(mysqli_error($db));
			if ($nn = mysqli_fetch_array($the)){
			    $address1=$nn['map_address'];
			  
			}
			 
		 /*----------------------------------------------------------------------------------------------------------*/
                                            
                                            
                                        ?>
                                        
                                    <tr>
                                             <td data-title="name"><?php echo $row["name"];?></td>
                                             <td data-title="map_address"><?php echo $nn["map_address"]; ?></td>
                                             <td data-title="city"><?php echo $row["city"];?></td>
                                                <td data-title="event_date"><?php echo $row["event_date"]; ?></td>
                                                <td data-title="event_time"><?php echo $row["event_time"]; ?></td>
                                                <td data-title="screen_no"><?php echo $row["screen_no"]; ?></td>
                                                <td data-title="mip"><?php echo $row["mip"]; ?></td>
                                                <td data-title="vvip"><?php echo $row["vvip"]; ?></td>
                                                 <td data-title="vip"><?php echo $row["vip"]; ?></td>
                                                  <td data-title="normal"><?php echo $row["normal"]; ?></td>
                                        <td> <a href="subseat.php?delet=<?php echo $row["id"]; ?>"><i class="fa fa-trash" style="width:20px;color:#ec2d5d;"></i></a>
                                        <a href="subseat.php?edit=<?php echo $row["id"];?>"><i class="fa fa-edit" style="width:20px;color:#ec2d5d;"></i></a></td>
                                    </tr>
                                 
                                       <?php }
                                      
                                       ?>
                                </tbody>

                        </table>
                                         
                         
        </div>
    </div>
                    
   
   <!---------------------------code for OTP--------------------------------------->       
                    



<div class="clearfix">&nbsp;</div>



  <!---------------------------------footer ------------------------------------>            
     
            <?php
                include('footer.php');
            ?>
             <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script> 