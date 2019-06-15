<?php
include('header.php');
 include('connection.php');
?>
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
                                                <li><a href="#">Customer</a></li>
                                                <li class="active">Notification</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="content pb-0">
 <div class="row">
                <div class="col-lg-3"></div>
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">Notification</div>
                                <div class="card-body card-block">
                                    <form action="#" method="post"id="comment_form" class="form-horizontal"enctype="multipart/form-data">
                                        <div class="row form-group">
                                            <div class="col col-md-12">
                                              	<label> Select gender</label>
                                                      <select class="form-control" name="gender">
                                                    <option value=""></option>
                                                	<option value="Male">Male</option>
                                                   <option value="Female">Female</option>
                                                      </select>
                                                      
                                            </div> 
                                                        
                                                 
                                         </div>
                                          <div class="row form-group">
                             
                                              <div class="col col-md-12">
                                                    <label>Select Fan Of</label>
                                                              <select class="form-control " value="" name="fan">
                                               	<option value=""></option>
                                          <?php
                                         $sql= mysqli_query($db,"select fan_of from users ORDER BY id");
                                while ($row = mysqli_fetch_array($sql)){?>
                              <option value="<?php echo $row['fan_of'] ?>"><?php echo $row['fan_of'] ?></option>
                                          <?php } ?>
                                        </select>
                                                </div>
                                                
                                   </div>
                                   
                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="company" class=" form-control-label">Add Message</label>
                                                    <input type="text" name="msg"   placeholder="Add message" id="name" class="form-control" value="">
                                                </div>
                                                </div>
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="company" class=" form-control-label">image</label>
                                                    <input type="File" name="image" accept=".jpg,.png,.jpeg"  placeholder="Add Image" class="form-control" value="">
    
                                                </div>
                                               </div>
                                
                                                    <center>  <button type="submit" name="submit" class="btn btn-danger" >Submit</button>
                                                </cente
                                </form>
                            </div>
                           </div>
            
                        </div>
                   </div>
                  
                                   
 <?php
 define( 'API_ACCESS_KEY', 'AAAAWmdwZu0:APA91bEg2-266RHWlTKqVWXQwHzZ1COMpgyhxCIsKilTkFbH43lmTAD-OpdSyFMdOcx2F5k2lgd5-UZhEylXDIv6IS76V9AmIASfEYJ-rLdNmoCD_DfHSj1WUe9EowHmbvjmO9qYc3So' ); 
   
    if (isset($_POST['submit'])) 
    {
        $gender=$_POST['gender'];
     
        $fan= $_POST['fan'];
         $msg=$_POST['msg'];
         
         $image=$_POST['image'];
  
      $request_fcm_token = mysqli_query($db,"SELECT * FROM users WHERE gender='$gender'AND fan_of='$fan'");
    $fcm_token_row = mysqli_fetch_array($request_fcm_token);
   $fcm_token = $fcm_token_row['fcm_token'];
  
   /* $request_event_details = mysqli_query($db,"SELECT name FROM events WHERE id = '$eventid' ");
    $event_details_row = mysqli_fetch_array($request_event_details);
    $event_name = $event_details_row['name'];
     */
    $msgg = array
    (
    	'message' 	=> 'Your message: '.$msg,
        'title' => 'Notification'.$image,
        'type' => 'Individual',
    );

    
    
    
    $fields = array
    (
    	'to' 	=> $fcm_token ,
    	'data'	=> $msgg,
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
    
   
}
         
?>
<?php
include('footer.php');
 ?>