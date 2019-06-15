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
  
  if(isset($_GET['delet'])){



    $id=$_GET['delet'];
    $update_query =("UPDATE admin SET status=1 WHERE id='$id'");
   $query= mysqli_query($db, $update_query);
    
    if($query)
{
echo "<script>alert(' Deleted info Successfully........!');
window.location='view_user.php';
</script>";
} 
    

}
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
                                    <li><a href="#">Events</a></li>
                                    <li class="active">View User</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

 


    <div class="content pb-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">View All Users</strong>
                </div>
                       <div class=" card-body pagetable">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                                
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Type</th>
                                    <th>Password</th>
                                   <th>Operation</th>
                                </tr>
                            </thead>
                              
                    </div>
            </div> 
                                <tbody>
         </div>                     
                                         <?php
                                        $sql = ("SELECT* FROM admin WHERE status=0");
                                         
                                        $result=mysqli_query($db,$sql)or die(mysqli_error($result));
                                        while($row=mysqli_fetch_array($result)) 
                                        { 
                                        ?>
                                        
                                    <tr>
                                        <td data-title="id"><?php echo $row["id"];?></td>
                                        <td data-title="f_name"><?php echo $row["first_name"]; ?></td>
                                        <td data-title="l_name"><?php echo $row["last_name"]; ?></td>
                                        <td data-title="email"><?php echo $row["email"]; ?></td>
                                        <td data-title="mobile"><?php echo $row["mobile"]; ?></td>
                                        <td data-title="type"><?php echo $row["type"]; ?></td>
                                        <td data-title="pass"><?php echo $row["password"]; ?></td>
                                        
                                        <td> <a href="view_user.php?delet=<?php echo $row["id"]; ?>"><i class="fa fa-trash" style="width:20px;color:#ec2d5d;"></i></a>
                                        <a href="create-subadmin.php?edit=<?php echo $row["id"];?>"><i class="fa fa-edit" style="width:20px;color:#ec2d5d;"></i></a></td>
                                    </tr>
                                 
                                       <?php } ?>
                                </tbody>

                        </table>
                                         
                         
        </div>
    </div>
                 
                
        

<?php
include('footer.php');

?>

 <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>   
 