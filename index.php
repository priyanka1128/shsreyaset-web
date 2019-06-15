<?php
@session_start();
include('connection.php');


        $username="";
        $password="";
        $type="";
        
        if(isset($_POST['submit']))
        {
        $username=$_POST['user'];
        $password=$_POST['pass'];
        $types=$_POST['usertype'];
        $_SESSION["username"] = $username;
       
        if($types=='admin'){
        $query="SELECT * FROM  admin WHERE email='".$username."' and password='".$password."' and type='".$types."' and status='0'";
       
        $result = mysqli_query($db, $query);
        
        $row = mysqli_fetch_array($result);
        
        $type=$row['type'];
         $_SESSION["types"] = $type;
        $status = $row['status'];
    
        
        if($type=="admin" && $status=='0'){
            $_SESSION['status']="Active";
           
        ?>
        <script type="text/javascript">
        
        window.location.href = "dashboard.php";
        </script>
        <?php
         
        }else{
              echo '<script type="text/javascript">alert("may be Wrong username password ");
           
             </script>'; 
        }
        }
        else if($types=='sub-admin'){
         $query="SELECT * FROM  admin WHERE email='".$username."' and password='".$password."' and type='".$types."' and status='0'";
       
        $result = mysqli_query($db, $query);
        
        $row = mysqli_fetch_array($result);
        
        $type=$row['type'];
         $_SESSION["types"] = $type;
        $status = $row['status'];
    
        
        if($type=="sub-admin" && $status=='0'){
            $_SESSION['status']="Active";
           
        ?>
        <script type="text/javascript">
        
        window.location.href = "dashboard_copy.php";
        </script>
        <?php
         
        }else{
              echo '<script type="text/javascript">alert("may be Wrong username password ");
           
             </script>'; 
        }
        }
          
        
       
         
        
        
         
         else
        {
            
            
             header("Location: index.php");
        }    
        
        }
        ?>
        <!doctype html> 
        <html class="no-js" lang="">
      <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Shreyas Entertainment</title>
            <meta name="description" content="Ela Admin - HTML5 Admin Template">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        
            <!--<link rel="apple-touch-icon" href="images/favicon.png">
            <link rel="shortcut icon" href="images/favicon.png"> -->
        
            <link rel="stylesheet" href="assets/css/normalize.css">
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/font-awesome.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
            <link rel="stylesheet" href="assets/css/flag-icon.min.css">
            <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
            <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        
            <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
        <style>
                .transition,
                form button,
                form .question label,
                form .question input[type="text"] {
                -moz-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
                -o-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
                -webkit-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
                transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
                }
                
                * {
                font-family: 'Montserrat', sans-serif;;
                font-weight: light;
                -webkit-font-smoothing: antialiased;
                }
                body{
                    background-image:url('/Shreyas/images/red3.jpg');
                    background-size:cover;
                }
                
                
                
                
                form h1 {
                color: #007bff;
                font-weight: 100;
                letter-spacing: 0.01em;
                margin-left: 15px;
                margin-bottom: 35px;
                text-transform: uppercase;
                }
                
                form button {
                margin-top: 10px;
                background-color: white;
                border: 1px solid black;
                line-height: 0;
                font-size: 17px;
                display: inline-block;
                box-sizing: border-box;
                padding: 16px 25px;
                border-radius: 50px;
                
                font-weight: 100;
                letter-spacing: 0.01em;
                position: relative;
                z-index: 1;
                }
                
                form button:hover,
                form button:focus {
                color: white;
                background-color:#F33652;
                }
                
                form .question {
                position: relative;
                padding: 10px 0;
                }
                
                form .question:first-of-type {
                padding-top: 0;
                }
                
                form .question:last-of-type {
                padding-bottom: 0;
                }
                
                form .question label {
                transform-origin: left center;
                
                font-weight: 100;
                letter-spacing: 0.01em;
                font-size: 17px;
                box-sizing: border-box;
                padding: 10px 15px;
                display: block;
                position: absolute;
                margin-top: -40px;
                z-index: 2;
                pointer-events: none;
                }
                
                form .question input[type="text"] {
                appearance: none;
                background-color: none;
                border: 1px solid black;
                line-height: 0;
                font-size: 17px;
                width: 100%;
                display: block;
                box-sizing: border-box;
                padding: 10px 15px;
                border-radius: 60px;
                
                font-weight: 100;
                letter-spacing: 0.01em;
                position: relative;
                z-index: 1;
                }
                
                form .question input[type="text"]:focus {
                outline: none;
                background:#F33652;
                color: white;
                margin-top: 30px;
                }
                form .question input[type="text"]:valid {
                margin-top: 30px;
                }
                
                form .question input[type="text"]:focus ~ label {
                -moz-transform: translate(0, -35px);
                -ms-transform: translate(0, -35px);
                -webkit-transform: translate(0, -35px);
                transform: translate(0, -35px);
                }
                form .question input[type="text"]:valid ~ label {
                text-transform: uppercase;
                font-style: italic;
                -moz-transform: translate(5px, -35px) scale(0.6);
                -ms-transform: translate(5px, -35px) scale(0.6);
                -webkit-transform: translate(5px, -35px) scale(0.6);
                transform: translate(5px, -35px) scale(0.6);}
                /*--------------------*/
                
                 form .question input[type="password"] {
                appearance: none;
                background-color: none;
                border: 1px solid black;
                line-height: 0;
                font-size: 17px;
                width: 100%;
                display: block;
                box-sizing: border-box;
                padding: 10px 15px;
                border-radius: 60px;
                
                font-weight: 100;
                letter-spacing: 0.01em;
                position: relative;
                z-index: 1;
                }
                
                form .question input[type="password"]:focus {
                outline: none;
                background:#F33652;
                color: white;
                margin-top: 30px;
                }
                form .question input[type="password"]:valid {
                margin-top: 30px;
                }
                
                form .question input[type="password"]:focus ~ label {
                -moz-transform: translate(0, -35px);
                -ms-transform: translate(0, -35px);
                -webkit-transform: translate(0, -35px);
                transform: translate(0, -35px);
                }
                form .question input[type="password"]:valid ~ label {
                text-transform: uppercase;
                font-style: italic;
                -moz-transform: translate(5px, -35px) scale(0.6);
                -ms-transform: translate(5px, -35px) scale(0.6);
                -webkit-transform: translate(5px, -35px) scale(0.6);
                transform: translate(5px, -35px) scale(0.6);}
                .radio {
                 
                
                position: relative;
                padding-left: 90px;
                margin-bottom: 12px;
                cursor: pointer;
                font-size: 20px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                
                
                }
                
                /* Hide the browser's default radio button */
                .radio input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
                
                }
                /* Create a custom radio button */
                .checkround {
                
                position: absolute;
                top: 6px;
                left: 60px;
                height: 20px;
                width: 20px;
                background-color: #fff ;
                
                border-style:solid;
                border-width:2px;
                 border-radius: 50%;
                }
                
                
                /* When the radio button is checked, add a blue background */
                .radio input:checked ~ .checkround {
                background-color: #fff;
                }
                
                /* Create the indicator (the dot/circle - hidden when not checked) */
                .checkround:after {
                content: "";
                position: absolute;
                display: none;
                }
                
                /* Show the indicator (dot/circle) when checked */
                .radio input:checked ~ .checkround:after {
                display: block;
                }
                
                /* Style the indicator (dot/circle) */
                .radio .checkround:after {
                 left: 2px;
                top: 2px;
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background:#F33652;
                
                
                }
                h2{
                  color:#F33652;
                  margin-left:40%;
                }
                
        </style>
    </head>
<!-------------------------------Start Form-------------------------------------->
<body>
                         <div class="sufee-login d-flex align-content-center flex-wrap">
                            <div class="container">
                                <div class="login-content">
                                    <div class="login-logo">
                                        <a href="dashboard.php">
                                           
                                        </a>
                                    </div>
                                    <div class="login-form">
                                    
                                    <form action="" method="post" class="page">
                                          <div class="form-group"> 
                                             
                                           <h2>Login</h2>
                                               <label class="radio ">Admin 
                                               <input type="radio" class="form-control" value="admin"  name="usertype">
                                                  <span class="checkround"></span>
                                              </label>  
                                              <label class="radio">Sub-Admin
                                               <input type="radio" class="form-control" value="sub-admin"  name="usertype">
                                                  <span class="checkround"></span>
                                              </label><br>
                                          </div>  
                    
                                          <div class="form-group question ">    
                                             <input type="text" name="user" class="form-control" required/>
                                             <label><i class='fa fa-user' style='font-size:20px '></i>&nbsp;Username</label>
                                          </div>
                                          <div class="form-group question "> 
                                            <input type="password" name="pass" class="form-control" required/>
                                              <label><i class="fa fa-lock"></i>&nbsp;Password</label>
                                        <center> 
                                          <div>
                                            <button type="submit" name="submit" class="form button">Submit</button>
                                          </div><center>
                                       </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
        
<!-------------------------------End of form with dtabase------------------------------------>

                    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
                    <script src="assets/js/popper.min.js"></script>
                    <script src="assets/js/plugins.js"></script>
                    <script src="assets/js/main.js"></script>
   
            
        </body>
        </html>
        
    

