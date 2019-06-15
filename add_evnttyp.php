        <?php
/* ----------------include files-- ----------------*/
        include('connection.php');
        include('header.php');
/* --------------session start------------------*/    
        @ob_start();
        @session_start();
        /*error_reporting(0);

if($_SESSION["username"]==true)
{
 
}
else
{
	 header('location:index.php');
}
*/
?>

<?php
/*----------------------delete Operation---------------------------*/
  if(isset($_GET['delet']))
   {

            $id=$_GET['delet'];
            $update_query = "UPDATE event_type SET status = 1 WHERE id='$id'";
            $query= mysqli_query($db, $update_query);
            
                if($query)
                        {
                        echo "<script>alert(' Deleted info Successfully........!');
                        window.location='add_evnttyp.php';
                        </script>";
                        } 
    }

?>
<!-----------------------------------sub-navbar------------------------------>
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
                                    <li class="active">Add Event Type</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<!----------------------------Form start-------------------------------->
    <div class="content pb-0">
        <div class="row">
            <div class="col-lg-3">
                
            </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Add Event Type
                        </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-12">
                                    	    <label for="company" class=" form-control-label">Event Type</label> 
                                            <input type="text" name="type" placeholder=" Enter Event Type" class="form-control"required>
                                        </div>
                                    </div>
                                            <center> <button type="submit"  name="submit" class="btn btn-danger">Add</button></center>
                                </form>
                            </div>
                    </div>
                </div>
        </div>        
    
    
    <!--------------------------------------------End of form------------------------------------------>
    <!-----------------------------------------Insert Data Into Database----------------------------->
                                 <?php
                                        if (isset($_POST['submit'])) 
                                        {
                                                    $event=$_POST['type'];
                                                    $sql_u = "SELECT * FROM event_type  WHERE type='$event'  and status=0";
                                                    $res_u = mysqli_query($db, $sql_u);
  
                                                if (mysqli_num_rows($res_u) > 0) 
                                                {
                                                        echo "<script>alert('  Event type already exists........!');
                                                        window.location='add_evnttyp.php';
                                                        </script>";
                                                        } 
                                                        else
                                                        {
                                                               $query= mysqli_query($db,"INSERT INTO event_type (type)
                                                               VALUES('$event')")or die(mysqli_error($query));
                                                        }
                                                }
    
                                 ?>
  <!---------------------------------Display Data inTo Table----------------------------------------------->   
    <div class="row">
        <div class="col-lg-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Added Event type</strong>
                    </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Event</th>
                                             <th>ACTION</th>
                                        </tr>
                                    </thead>
                                        <tbody>                          
                                            <?php
                                                $sql = ("SELECT * FROM event_type WHERE status=0");
                                                
                                                $result=mysqli_query($db,$sql)or die(mysqli_error($db));
                                                while($row=mysqli_fetch_array($result)) 
                                                { 
                                            ?>
                                                 <tr>
                                                    <td data-title="id"><?php echo $row["id"];?></td>
                                                    <td data-title="type"><?php echo $row["type"]; ?></td>
                                                    <td> <a href="add_evnttyp.php?delet=<?php echo $row["id"]; ?>"><i class="fa fa-trash" style="width:20px;color:#ec2d5d;"></i></a></td>
                                                </tr>
                                                    <?php } ?>
                                        </tbody>
                            </table>
                        </div>
                </div>
            </div>
                        <div class="col-lg-1"></div>   
        </div>
    </div>  
    
                <div class="clearfix">&nbsp;</div>
                
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