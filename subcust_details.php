<?php
  include('subadmin_header.php');
  include('connection.php');
  
/*-----------------------Session Start-----------*/        
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
<!--------------------------End of Session------------->

<!----------------------Delete Operation--------------------->
    <?php
   if(isset($_GET['delet']))
   {
        $id=$_GET['delet'];
        $update_query = "UPDATE users SET status = 1 WHERE id='$id'";
        $query= mysqli_query($db, $update_query);
    
            if($query)
            {
                echo "<script>alert(' Deleted info Successfully........!');
                window.location='user_details.php';
                </script>";
            } 
    }
  ?>
 <!-----------------------------------End of delete opration------------------> 
 
 <!----------------------------------Horizontal sub-navbar------------------->
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
                                    <li><a href="#">User</a></li>
                                    <li class="active">User Details</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<!----------------------------------------Start Table------------------------------------>        

        <div class="content pb-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">View Users Details</strong>
                        </div>
                                <div class="card-body pagetable">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Frist Name</th>
                                                                <th>Last Name</th>
                                                                <th>DOB</th>
                                                                <th>contact</th>
                                                                <th>Email</th>
                                                                <th>Gender</th>
                                                                <th>Fan Of</th>
                                                                <th>Picture</th>
                                                                <th>Password</th>
                                                                <th>Operation</th>
                                                             </tr>
                                                        </thead>
                                
                                               
                                                    <tbody>
                                                          <?php
                                                                $sql = ("SELECT * FROM users  WHERE status= 0");
                                                                
                                                                $result=mysqli_query($db,$sql)or die(mysqli_error($db));
                                                                while($row=mysqli_fetch_array($result)) 
                                                                { 
                                                                ?>
                                                                
                                                                <tr>
                                                                    <td data-title="id"><?php echo $row["id"];?></td>
                                                                    <td data-title="f_name"><?php echo $row["f_name"]; ?></td>
                                                                    <td data-title="l_name"><?php echo $row["l_name"]; ?></td>
                                                                    <td data-title="dob"><?php echo $row["dob"]; ?></td>
                                                                    <td data-title="mobile"><?php echo $row["mobile"]; ?></td>
                                                                    <td data-title="email"><?php echo $row["email"]; ?></td>
                                                                    <td data-title="gender"><?php echo $row["gender"]; ?></td>
                                                                    <td data-title="fan_of"><?php echo $row["fan_of"]; ?></td>
                                                                    <td data-title="image"><img src="<?php echo $row['pic'];?>"  height='50' width='80'></td>
                                                                    <td data-title="password"><?php echo $row["password"]; ?></td>
                                                                    <td> <a href="user_details.php?delet=<?php echo $row["id"]; ?>"><i class="fa fa-trash" style="width:20px;color:#ec2d5d;"></i></a>
                                                                    </td>
                                                                </tr>
                                                                    <?php } ?>
                                                    </tbody>
                                        </table>
                                 </div>  
                    </div>   
                </div>                                
            </div>
        </div><!----------content end--------->
        
        <div class="clearfix">&nbsp;</div>
        
<!------------------------------------Footer---------------------------------->
            <?php
            include('footer.php');
            ?>
<!-------------------------------DataTable------------------------------------------>            

                    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>   

<!---------------------------------End Of Code--------------------------------------->