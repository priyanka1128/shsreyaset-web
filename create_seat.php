<!----------------included Files---------------------------->
<?php
include('header.php');
include('connection.php');
 
 @ob_start();
 @session_start();
/*---------------------Start of Session--------------------*/
/*
    session_start();
    if($_SESSION["username"]==true)
    {
     
    }
    else
    {
    	 header('location:index.php');
    }*/
    ?>
    
<!----------------style the Table-------------------------->    

<head> 
        <meta charset=utf-8 /> 
        
       <style type="text/css"> 
        body {margin: 30px;} 
        .page{


  width: 50px;
  padding: 35px;
  border-spacing: 15px;
  margin: 10px;
  -webkit-column-gap: 100px; /* Chrome, Safari, Opera */
  -moz-column-gap: 70px; /* Firefox */
  column-gap: 70px;
        }
       .selected {background: coral;}
	   
	   
        </style> 
        </head>


<!--------------------------Horizontal Sub-navbar------------------------->
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
                                <li class="active">Create Seats</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-------------------------Start Of Form-----------------------------------> 

    <div class="content pb-0">
        
      
      
       
        
        <div class="row">
            <div class="col-md-12">
                    <center>
                        	<form>
                                <input type="button" onclick="createTable()" value="Create the table"> 
                            </form>
                                         
                        <table id="myTable" class="page" border="1"> </table>
                                    	
                    </center>     
            </div>
        </div> 
        
<!---------------------------End Of Form---------------------------------->
 
<!-----------------------Footer------------------------------------------->
         <?php
            include('footer.php');
         ?>
    </div>
    
   
<!-----------------------------Script For Create Theator--------------------------> 
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <script>

        function createTable()
            {
            
                hn = window.prompt("Hall Name",1);
                
                rn = window.prompt("Input number of rows", 1);
                
                cn = window.prompt("Input number of columns",1);
                 
                 
                 
                    for(var r=0;r<parseInt(rn,10);r++)  
                 {
                    
                           var x=document.getElementById('myTable').insertRow(r);
                           for(var c=0;c<parseInt(cn,10);c++)  
                        {
                    		 
                         var y=  x.insertCell(c);
                    	
                         y.innerHTML=
                    	 "<input  type='checkbox' id='chair' style='height:30px; width:30px;' value='' onclick='' />";
                	//seat(""+r+""+c);
            	 
                }
 
             } 
   
               var ru=rn;
             
              var cu=cn;

  
  
            $.ajax({
                
                dataType: 'text',
                data: {'ru':ru,'cu':cu,'hn':hn},
                method: "POST",
                url: 'insert.php',
                success: function (data) {
        			//alert(data);
        
                },
                error: function (error) {
                  return false;
                }
              });
          
         
        }
        
        $(document).on('change', '[type=checkbox]', function (e) {
        
        	 $(this).closest('td').toggleClass('selected', this.checked);
        if(this.checked==true){
        	var rowIndex = $(this).closest('tr').index();
          var columnIndex = $(this).closest('td').index();
         // alert(rowIndex+''+''+columnIndex);
         
          var rowI=rowIndex;
         
          var columnI=columnIndex;
        
          
          
            $.ajax({
                
                dataType: 'text',
                data: {'rowI':rowI,'columnI':columnI},
                method: "POST",
                url: 'insert1.php',
                success: function (data) {
        		//	alert(data);
        
                },
                error: function (error) {
                  return false;
                }
              });
          
          
        }
         $(this).closest('td').toggleClass('selected', this.checked);
         
         if(this.checked==false){
        	var rowIndex = $(this).closest('tr').index();
          var columnIndex = $(this).closest('td').index();
         alert(rowIndex+''+''+columnIndex);
         
          var rowI=rowIndex;
         
          var columnI=columnIndex;
        
          
          
            $.ajax({
                
                dataType: 'text',
                data: {'rowI':rowI,'columnI':columnI},
                method: "POST",
                url: 'insert2.php',
                success: function (data) {
        		//	alert(data);
        
                },
                error: function (error) {
                  return false;
                }
              });
          
        }
        
        }).find(':checkbox').trigger('change');
        
        
        
        
        </script>
<!---------------------------------End Of Code------------------------------------>      
        
        

           
 