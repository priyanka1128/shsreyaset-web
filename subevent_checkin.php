<?php
include('subadmin_header.php');
include('connection.php');
@ob_start();
@session_start();
error_reporting(0);





?>

<?php
    if(isset($_GET['approve']))

    {
        $id=$_GET['approve'];
        $status="Approved";
        $query="UPDATE booking SET status=1,current_status='$status' where id='$id'";
    
        $res=mysqli_query($db,$query);

	    if($res)
	    {
        	echo "<script>alert(' User Approved Successfully........!');
                    window.location='event_checkin.php';
                              </script>";
		
	    }
    }
    
    if(isset($_GET['reject']))
    {
        $id=$_GET['reject'];
	    $status= "Rejected";
        $query="UPDATE booking SET status=0, current_status='$status'  where id='$id'";
	    $res=mysqli_query($db,$query);
	    
	    if($res)
	    {
	       echo "<script>alert(' User Rejected Successfully........!');
            window.location='event_checkin.php';
                      </script>";
		}
	}
?>
<!-----------------------------------Horizontal Sub-Navbar------------------------------->
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
                                    <li class="active">Event Check In</li>
                                </ol>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<!------------------------Table Start----------------------------------------->
        <div class="content pb-0"> 
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Event Check in</strong>
                </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th>Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                             
                                             <th>Current Status</th>
                                             
                                            <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                

                                    <tbody>
                                                <?php
                                                $sql =("SELECT users.f_name,users.l_name,
                                       booking.id,booking.current_status
                                             FROM users ,booking
                                   WHERE  booking.user_id=users.id");
                                                
                                                $result=mysqli_query($db,$sql)or die(mysqli_error($db));
                                                while($row=mysqli_fetch_array($result)) 
                                                { 
                                                ?>
                                                
                                                <tr><td data-title="id"><?php echo $row["id"];?></td>
                                                <td data-title="first_name"><?php echo $row["f_name"]; ?></td>
                                                <td data-title="last_name"><?php echo $row["l_name"]; ?></td>
                                                
                                                  <td data-title="cstatus"style="color:blue"><?php echo $row["current_status"];?></td>
                                                <td> <a href="event_checkin.php?approve=<?php echo $row["id"]; ?>"<i class="fa fa-check-square" style="color:green"></i>Approve</a>&nbsp;&nbsp;&nbsp;                                           
                                              <a href="event_checkin.php?reject=<?php echo $row["id"]; ?>"<i class="fa fa-check-square" style="color:red"></i>Reject</a></td>
                                            
                                                
                                              
                                           
                                             
                                             
                                              
                                              
                                                </tr>
                                                <?php } ?>
                                    </tbody>

                        </table>
                    </div> 
            </div> 
        </div>
        <div class="clearfix">&nbsp;</div>
<!---------------------------------------------end Of table-------------------------------------------------->
        <!---------------------------------footer ------------------------------------>            
     
            <?php
                include('footer.php');
            ?>
     <!-----------------------DataTable Script----------------------------------->          
               <script type="text/javascript">
                    $(document).ready(function() {
                      $('#bootstrap-data-table-export').DataTable();
                  } );
              </script>   

<!-------------------------------End Of Code------------------------------------------>
        
    
    