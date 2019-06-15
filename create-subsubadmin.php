<!--------------include files--------------------------->
        <?php
        include('subadmin_header.php');
        include('connection.php');
/*---------------------Session start-----------------------*/       
        
@ob_start();
@session_start();
error_reporting(0);
/*if($_SESSION["username"]==true)
{
 
}
else
{
	 header('location:index.php');
}*/

?>
<!-----------------------Session Ends--------------------------------->
<!----------------------------Edit Operation------------------------------>
    <?php
        if (isset($_GET['edit']))
        	{
            		$id = $_GET['edit'];
            		$record = mysqli_query($db,"SELECT * FROM admin WHERE id='$id'") or die(mysqli_error($db));
            			if ($n = mysqli_fetch_array($record))
                    	{
                    		$type=$n['type'];
                            $fname=$n['first_name'];
                            $lname=$n['last_name'];
                            $mobile=$n['mobile'];
                            $email=$n['email'];
                            $pass=$n['password'];
            
            	        }
            	         if (isset($_POST['update']))
            	        {
                            $type=$_POST['type'];
                            $fname=$_POST['fname'];
                            $lname=$_POST['lname'];
                            $mobile=$_POST['mobile'];
                            $email=$_POST['email'];
                            $pass=$_POST['password'];
            	        }
                   
            
                            $id = $_GET['edit'];
                    		$query1=mysqli_query($db,"UPDATE admin SET type='$type',first_name='$fname',last_name='$lname',mobile='$mobile',email='$email',password='$pass' WHERE id='$id'");
                            $result = mysqli_query($db,$query);
            		
            		 if($query1)
                    {
            			echo "<script>alert('user  Updated successfully........!');
            			window.location='create-subadmin.php';
            			</script>";
                    }	
            }  
            	
    ?>
    <!---------------------------------------End Of Edit Operation-------------------------------------------------->

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
                                <li class="active">Create User Type</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!----------------------------------------form start--------------------------------------->
        <div class="content pb-0">
            <div class="row">
                <div class="col-lg-2"></div>
                     <div class="col-lg-8">
                            <div class="card pg">
                                <div class="card-header">Create User Type
                                </div>
                            <div class="card-body card-block">
                            <form action="#" method="post" class="form-horizontal">
                                
                                <div class="col col-md-12">
                                    <label>User Type</label>
                                        <select class="form-control" name="type" value="<?php echo $type;?>">
                                            <option value="<?php echo$type;?>"><?php echo $type;?></option>
                                            <option value="sub sub-admin">Sub Sub-Admin</option>
                                                   
                                        </select><br><br>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-6">
                                            <label for="company" class=" form-control-label">Frist Name</label> 
                                            <input type="text" placeholde class="form-control"name="fname"  value="<?php echo $fname; ?>"required>
                                        </div>
                                        

                                        <div class="col col-md-6">
                                            <label for="company" class=" form-control-label">Last Name</label>
                                            <input type="text" placeholder="Last Name" class="form-control"name="lname"  value="<?php echo $lname; ?>"required>
                                        </div>
                                    </div>
                                    

                                    <div class="row form-group">
                                        <div class="col col-md-6">
                                            <label for="company" class=" form-control-label">Mobile No.</label>
                                            <input type="text" placeholder="Mobile no" class="form-control"name="mobile"  value="<?php echo $mobile; ?>"required>
                                        </div>
                                        <div class="col col-md-6">
                                            <label for="company" class=" form-control-label">Email</label>
                                            <input type="text" placeholder="Email" class="form-control"name="email" value="<?php echo $email;?>" required></div>
                                    </div>
                                    
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-12">
                                            <label for="company" class=" form-control-label">Password</label> 
                                            <input type="password" placeholder="password" class="form-control"name="password" value="<?php echo $pass; ?>" required>
                                        </div>
                                    </div> 
                                    
                                        <center>   
                                            <button type="submit" class="btn btn-danger"name="submit">Add</button>
                                            <button type="update" name="update" class="btn btn-danger">Update</button>
                                        </center>                                         
                            </form>
                     </div>
                </div>
            </div>
         </div> <!-- .content ------>
         
 <!------------------------------------Display Data From Database Into Table--------------------------------------------->        
      <?php

       if (isset($_POST['submit'])) {
           
        
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
         $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $type=$_POST['type'];
         $pass=$_POST['password'];

       $query= mysqli_query($db,"INSERT admin (first_name,last_name,email,mobile,type,password)
       VALUES('$fname','$lname','$email','$mobile','$type','$pass')")or die(mysqli_error($query));
       
          }
             if($query)
                                                           {
                                            echo "<script>alert('  User  added Successfully........!');
                                            window.location='create-subadmin.php';
                                            </script>";
                                            } 
          ?>
   
         
         
         
<!---------------------------------------------footer------------------------------------------------>
<?php
include('footer.php');
?>
<!--------------------------------End of Code-------------------------------------------------->
   