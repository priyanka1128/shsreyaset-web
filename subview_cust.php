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
    $update_query = "UPDATE users SET status =1 WHERE id='$id'";
   $query= mysqli_query($db, $update_query);
    
    if($query)
{
echo "<script>alert(' Deleted info Successfully........!');
window.location='view_cust.php';
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
                                    <li><a href="#">User</a></li>
                                    <li class="active">View User</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

   
               <div class="content pb-0"> 
                          <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title">View All Users</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Operation</th>
                                            
                                        </tr>
                                    </thead>
                                
                    
                      

 <?php
$sql = ("SELECT id, f_name, l_name FROM users WHERE status=0");

$result=mysqli_query($db,$sql)or die(mysqli_error($db));
while($row=mysqli_fetch_array($result)) 
{ 
?>

<tr><td data-title="id"><?php echo $row["id"];?></td>
<td data-title="s_name"><?php echo $row["f_name"]; ?></td>
<td data-title="l_name"><?php echo $row["l_name"]; ?></td>
<td> <a href="view_cust.php?delet=<?php echo $row["id"]; ?>"><i class="fa fa-trash" style="width:20px;color:#ec2d5d;"></i></a>
</td>
</tr>
<?php } ?>
</tbody>
</tr>
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