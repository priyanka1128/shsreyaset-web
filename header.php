<?php
session_start();
error_reporting(0);
?>
<?php
	
    										if (isset($_SESSION['username']))
    										{
    										echo "welcome admin"; 
    										}
    										else
    										{
    										echo "<script>	
    												window.location='index.php';
    												</script>";
    										}

									
									
								?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="images/fevicon.png">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link href="assets/weather/css/weather-icons.css" rel="stylesheet" />
    <link href="assets/calendar/fullcalendar.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/charts/chartist.min.css" rel="stylesheet"> 
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet"> 
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart { 
            min-height: 335px; 
        }
        #flotPie1  {
            height: 150px;
        } 
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        } 

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>

</head>
<body>
    <!-- Left Panel --> 
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default"> 
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                   
                    <li class="active">
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Master</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>User</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="create-subadmin.php">Create User</a></li>
                            <li><a href="view_user.php">View User LIst</a></li>
                        </ul>
                    </li>
                   
                    <li class="menu-title">Events</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Events</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="add_evnt.php">Add Event</a></li>
                            <li><a href="view_event.php">View Event List</a></li>
                            <li><a href="event_checkin.php"> Event Check-in</a></li>
                            <li><a href="show_type.php"> Add Language</a></li>
                             <li><a href="gener.php">Add Genre</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Customer</li><!------/.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Customer</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="view_cust.php">View Customer List</a></li>
                            <li><a href="cust_details.php">Customer Details</a></li>
                            <li><a href="notify.php">Send Notification</a></li>
                         </ul> 
                    </li>   
                        
                        <li class="menu-title">Venue</li><!-- /.menu-title -->

                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Venue</a>
                                <ul class="sub-menu children dropdown-menu">
                                     <li><a href="seat.php">Create Theater</a></li>
                                    <li><a href="create_seat.php">Create Venue</a></li>
                                    <li><a href="view_seat.php">View Venue</a></li>
                                    
                                </ul>
                            </li>
                            
                             <li class="menu-title">Blog</li>
                                  <li>
                           <a href="https://shreyaset.com/blog/wp-login.php"> <i class="menu-icon fa fa-tasks"></i>Blog</a>
                              </li>    
                            <li class="menu-title">Change Password</li><!-- /.menu-title -->

                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Change Password</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><a href="sub_admin-forget.php">Sub-Admin</a></li>
                                    <li><a href="tkt_checker-forget.php">Sub Sub-Admin </a></li>
                                    
                                </ul>
                            </li>
                                    
    </ul>
</li>
     

    </ul>
</li>
                   
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel --> 
    <!-- Left Panel -->




    <!-- Right Panel --> 
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">  
            <div class="top-left">
                <div class="navbar-header"> 
                <a class="navbar-brand" href="dashboard.php"><img src="images/sreyas.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="dashboard.php"><img src="images/sreyas.png" alt="Logo"></a> 
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
                </div> 
            </div>
            <div class="top-right"> 
                <div class="header-menu"> 
                 

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='fas fa-user-cog' style='font-size:20px'></i>
                        <!--<img class="user-avatar rounded-circle" src="" alt="User Avatar">-->
                        </a>

                        <div class="user-menu dropdown-menu">


                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div> 
                </div>  
            </div>
        </header><!-- /header -->
        <!-- Header-->
 

       


   


    <script>
        // jQuery(document).ready(function($) {
        //     "use strict"; 

        //     // Pie chart flotPie1 
        //     var piedata = [
        //         { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
        //         { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
        //         { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
        //     ];

        //     $.plot('#flotPie1', piedata, {
        //         series: {
        //             pie: {
        //                 show: true,
        //                 radius: 1,
        //                 innerRadius: 0.65,
        //                 label: {
        //                     show: true,
        //                     radius: 2/3,
        //                     threshold: 1
        //                 },
        //                 stroke: { 
        //                     width: 0
        //                 }
        //             }
        //         },
        //         grid: {
        //             hoverable: true,
        //             clickable: true
        //         }
        //     });

        //     // Pie chart flotPie1  End




        //     var cellPaiChart = [
        //         { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
        //         { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'} 
        //     ];
        //     $.plot('#cellPaiChart', cellPaiChart, {
        //         series: {
        //             pie: {
        //                 show: true,
        //                 stroke: { 
        //                     width: 0
        //                 }
        //             }
        //         },
        //         legend: {
        //             show: false
        //         },grid: {
        //             hoverable: true,
        //             clickable: true
        //         }
                
        //     });















        //     // Line Chart  #flotLine5
        //     var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

        //     var plot = $.plot($('#flotLine5'),[{
        //         data: newCust,
        //         label: 'New Data Flow',
        //         color: '#fff'
        //     }],
        //     {
        //         series: {
        //             lines: {
        //                 show: true,
        //                 lineColor: '#fff',
        //                 lineWidth: 2
        //             },
        //             points: {
        //                 show: true,
        //                 fill: true,
        //                 fillColor: "#ffffff",
        //                 symbol: "circle",
        //                 radius: 3
        //             },
        //             shadowSize: 0
        //         },
        //         points: {
        //             show: true,
        //         },
        //         legend: {
        //             show: false
        //         },
        //         grid: {
        //             show: false
        //         }
        //     });

        //      // Line Chart  #flotLine5 End


 


        //     // Traffic Chart using chartist
        //     if ($('#traffic-chart').length) {
        //         var chart = new Chartist.Line('#traffic-chart', {
        //           labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        //           series: [
        //           [0, 18000, 35000,  25000,  22000,  0],
        //           [0, 33000, 15000,  20000,  15000,  300],
        //           [0, 15000, 28000,  15000,  30000,  5000]
        //           ]
        //       }, {
        //           low: 0,
        //           showArea: true,
        //           showLine: false,
        //           showPoint: false,
        //           fullWidth: true,
        //           axisX: {
        //             showGrid: true
        //         }
        //     });

        //         chart.on('draw', function(data) {
        //             if(data.type === 'line' || data.type === 'area') {
        //                 data.element.animate({
        //                     d: {
        //                         begin: 2000 * data.index,
        //                         dur: 2000,
        //                         from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
        //                         to: data.path.clone().stringify(),
        //                         easing: Chartist.Svg.Easing.easeOutQuint
        //                     }
        //                 });
        //             }
        //         });
        //     }
        //     // Traffic Chart using chartist End

            


        //     //Traffic chart chart-js 
        //     if ($('#TrafficChart').length) {
        //         var ctx = document.getElementById( "TrafficChart" );
        //         ctx.height = 150;
        //         var myChart = new Chart( ctx, {
        //             type: 'line',
        //             data: {
        //                 labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
        //                 datasets: [
        //                 {
        //                     label: "Visit",
        //                     borderColor: "rgba(4, 73, 203,.09)",
        //                     borderWidth: "1",
        //                     backgroundColor: "rgba(4, 73, 203,.5)",
        //                     data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
        //                 },
        //                 {
        //                     label: "Bounce",
        //                     borderColor: "rgba(245, 23, 66, 0.9)",
        //                     borderWidth: "1",
        //                     backgroundColor: "rgba(245, 23, 66,.5)",
        //                     pointHighlightStroke: "rgba(245, 23, 66,.5)",
        //                     data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
        //                 },
        //                 {
        //                     label: "Targeted",
        //                     borderColor: "rgba(40, 169, 46, 0.9)",
        //                     borderWidth: "1",
        //                     backgroundColor: "rgba(40, 169, 46, .5)",
        //                     pointHighlightStroke: "rgba(40, 169, 46,.5)",
        //                     data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
        //                 } 
        //                 ]
        //             },
        //             options: {
        //                 responsive: true,
        //                 tooltips: {
        //                     mode: 'index',
        //                     intersect: false
        //                 },
        //                 hover: {
        //                     mode: 'nearest',
        //                     intersect: true
        //                 }

        //             }
        //         } );
        //     }
        //     //Traffic chart chart-js  End 



        //     // Bar Chart #flotBarChart
        //     $.plot("#flotBarChart", [{
        //         data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
        //         bars: {
        //             show: true,
        //             lineWidth: 0,
        //             fillColor: '#ffffff8a'
        //         }
        //     }], {
        //         grid: {
        //             show: false
        //         }
        //     });
        //     // Bar Chart #flotBarChart End

        // });  // End of Document Ready 
    </script>





<div id="container">
  
 
  
</div>


</body>
</html>