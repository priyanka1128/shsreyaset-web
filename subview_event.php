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
    $update_query =("UPDATE events SET status=1 WHERE id='$id'");
   $query= mysqli_query($db, $update_query);
    
    if($query)
{
echo "<script>alert(' Deleted info Successfully........!');
window.location='subview_event.php';
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
                                    <li class="active">View Event</li>
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
                    <strong class="card-title">View All Events</strong>
                </div>
                       <div class=" card-body pagetable">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                                
                                    <th>Event Type</th>
                                    <th>Genre</th>
                                    <th>Theater</th>
                                    <th>Event Name</th>
                                    <th>Duration</th>
                                    <th>Release Date</th>
                                    <th>Starcast</th>
                                    <th>Poster</th>
                                      <th>Banner</th>
                                    <th>videolink</th>
                                     <th>Language</th>
                                      <th>Dimentions</th>
                                     <th>Created Date Time</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                              
                    </div>
            </div> 
                                <tbody>
         </div>                     
                                         <?php
                                        $sql = ("SELECT* FROM events WHERE status=0");
                                         
                                        $result=mysqli_query($db,$sql)or die(mysqli_error($result));
                                        while($row=mysqli_fetch_array($result)) 
                                        { 
                                        ?>
                                        
                                    <tr>
                                        <td data-title="type"><?php echo $row["type"];?></td>
                                         <td data-title="genre"><?php echo $row["genre"]; ?></td>
                                         <td data-title="theater"><?php echo $row["theater"]; ?></td>
                                        <td data-title="name"><?php echo $row["name"]; ?></td>
                                        <td data-title="duration"><?php echo $row["duration"]; ?></td>
                                        <td data-title="release_date"><?php echo $row["release_date"]; ?></td>
                                        <td data-title="starcast"><?php echo $row["starcast"]; ?></td>
                                        <td data-title="poster"><img src="<?php echo $row['poster'];?>" height=50px width=80px></td>
                                         <td data-title="banner"><img src="<?php echo $row['banner'];?>" height=50px width=100px></td>
                                       <td data-title="videolink"><a href='<?php echo $row["videolink"]; ?>'><?php echo $row["videolink"]; ?></a></td>
                                        <td data-title="language"><?php echo $row["language"]; ?></td>
                                        <td data-title="dimentions"><?php echo $row["dimentions"]; ?></td>
                                         <td data-title="created_at"><?php echo $row["created_at"]; ?></td>
                                        <td> <a href="subview_event.php?delet=<?php echo $row["id"]; ?>"><i class="fa fa-trash" style="width:20px;color:#ec2d5d;"></i></a>
                                        <a href="subadd_evnt.php?edit=<?php echo $row["id"];?>"><i class="fa fa-edit" style="width:20px;color:#ec2d5d;"></i></a></td>
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
  
  