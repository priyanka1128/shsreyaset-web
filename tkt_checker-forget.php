<?php
include('header.php');
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
/*$uname ="";	
$oldpass="";
$newpassword=""; */

if(isset($_POST['submit']))
{
$exist_pass = $_POST['Existing_password'];	
$new_pass=($_POST['new_password']);
$c_pass=($_POST['c_password']);


$sql=mysqli_query($db,"SELECT id,password FROM admin order by id");
$num=mysqli_fetch_array($sql);

if($num>0)
{


$db=mysqli_query($db,"UPDATE admin SET `password`='$new_pass' WHERE `password`='$exist_pass' ");
$message = "Password Changed Successfully !!";
echo "<script type='text/javascript'>alert('$message');</script>"; 

}
else
{
$message = "Old Password not match !!";
echo "<script type='text/javascript'>alert('$message');</script>"; 
}
}
?>

 <div class="content pb-0">
            <div class="row">
                <div class="col-lg-2"></div>
                     <div class="col-lg-8">
                        <div class="card pg">
                            <div class="card-header">change Password
                            </div>
                        <div class="card-body card-block">
                            <form name="" method="post" action="" enctype="multipart/form-data">
                            <div class="row form-group">
                                    <div class="col col-md-12">
                                        <label for="password" class=" form-control-label">existingpassword</label> 
                                        <input type="pass" class="form-control" name="Existing_password">
                                    </div>
                                  </div>
                               <div class="row form-group">
                                    <div class="col col-md-12">
                                        <label for="password" class=" form-control-label">New Password</label> 
                                        <input type="pass" class="form-control" name="new_password">
                                    </div>
                                  </div>
                                   <div class="row form-group">
                                    <div class="col col-md-12">
                                        <label for="password" class=" form-control-label">Confirm Password</label> 
                                        <input type="pass" class="form-control" name="c_password">
                                    </div>
                                  </div>
                                   <center> <button type="submit" class="btn btn-danger" name="submit" >Add</button></center>
                         </form>
                     </div>
                </div>
            </div>
         </div>          
                                  
<?php
include('footer.php');
?>
	
	
	
	
	
