<!-----------------------Include Files-------------------------->
<?php
    include('header.php');
    include('connection.php');
/*-------------------session Start-------------------*/ 
    @ob_start();
    @session_start();
   
/* ---------------------End of session--------------*/
?>
<!---------------Approve and Reject Operation----------------->
  <?php
     // API access key from Google API's Console
    // Paste Server Key From The Firebase Console Project Setting Uder The Cloud Messaging
    define( 'API_ACCESS_KEY', 'AAAAWmdwZu0:APA91bEg2-266RHWlTKqVWXQwHzZ1COMpgyhxCIsKilTkFbH43lmTAD-OpdSyFMdOcx2F5k2lgd5-UZhEylXDIv6IS76V9AmIASfEYJ-rLdNmoCD_DfHSj1WUe9EowHmbvjmO9qYc3So' );
    // prep the bundle
    if(isset($_GET['approve'])) {
    $ID1=$_GET['approve'];
    
    
    $status= "Approved";
    $query="UPDATE booking SET status=1,current_status='$status' where id='$ID1'";
    mysqli_query($db,$query);
    
    $query2=("select * from  booking where id='$ID1'");
	$res2=mysqli_query($db,$query2);
	$row2=mysqli_fetch_array($res2);
    $userid=$row2['user_id'];
    $eventid=$row2['event_id'];
        
    $request_fcm_token = mysqli_query($db,"SELECT fcm_token FROM users WHERE id = '$userid' ");
    $fcm_token_row = mysqli_fetch_array($request_fcm_token);
    $fcm_token = $fcm_token_row['fcm_token'];
    $request_event_details = mysqli_query($db,"SELECT name FROM events WHERE id = '$eventid' ");
    $event_details_row = mysqli_fetch_array($request_event_details);
    $event_name = $event_details_row['name'];
     
    $msg = array
    (
    	'message' 	=> 'Your Ticket For Event: '.$event_name.' Is '.$status,
        'title' => 'Event '.$status,
        'type' => 'Individual',
    );

    
    }
    
    else if(isset($_GET['reject']))
    {
    $id=$_GET['reject'];
	$status= "Rejected";
    $query="UPDATE booking SET status=0, current_status='$status'  where id='$id'";
	$res=mysqli_query($db,$query);
	    
	$query2=("select * from  booking where id='$id'");
	$res2=mysqli_query($db,$query2);
	$row2=mysqli_fetch_array($res2);
    $userid=$row2['user_id'];
    $eventid=$row2['event_id'];
        
    $request_fcm_token = mysqli_query($db,"SELECT fcm_token FROM users WHERE id = '$userid' ");
    $fcm_token_row = mysqli_fetch_array($request_fcm_token);
    $fcm_token = $fcm_token_row['fcm_token'];
    $request_event_details = mysqli_query($db,"SELECT name FROM events WHERE id = '$eventid' ");
    $event_details_row = mysqli_fetch_array($request_event_details);
    $event_name = $event_details_row['name'];
     
    $msg = array
    (
    	'message' 	=> 'Your Ticket For Event: '.$event_name.' Is '.$status,
        'title' => 'Event '.$status,
        'type' => 'Individual',
    );

    
    }
    
    $fields = array
    (
    	'to' 	=> $fcm_token ,
    	'data'	=> $msg,
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
                                         
                                             <th>User_Id</th>
                                              <th>Name</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                             
                                             <th>Current Status</th>
                                             
                                            <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                

                                    <tbody>
                                                <?php
                                                $sql =("SELECT users.f_name,users.l_name,
                                                      booking.id,booking.current_status,booking.user_id,booking.event_id,events.name
                                                       FROM users ,events,booking
                                                     WHERE booking.user_id=users.id and booking.event_id=events.id");
                                                
                                                $result=mysqli_query($db,$sql)or die(mysqli_error($db));
                                                while($row=mysqli_fetch_array($result)) 
                                                { 
                                                ?>
                                                
                                                <tr>
                                                 <td data-title="user_id"><?php echo $row["user_id"];?></td>
                                                 <td data-title="name"><?php echo $row["name"];?></td>
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
        
    
    