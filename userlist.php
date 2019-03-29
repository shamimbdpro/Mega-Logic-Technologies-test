<?php session_start();
?>
	  

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
  
  <br />
  
       <!-- top navigation -->
        <div class="container">
        <div class="top_nav customnav">
          <div class="nav_menu">
            <nav>
              
				<a class="btn btn-info" href="./#signin">Login</a>
				<a class="btn btn-info" href="./#signup">Register</a>
				<a class="btn btn-info" href="userlist.php">Userlist</a>
               
            
            </nav>
          </div>
        </div>
        </div>
        <!-- /top navigation -->

		<br />
		<br />
		<br />
		<br />
  
  
  

  
  
  <?php 
  

  
   $jsonString = file_get_contents('user.json');
   $data = json_decode($jsonString, true);
  
   
   ?>
  
 <!-- page content -->
        <div class="" role="main">
              <div class="col-md-10 col-md-offset-1 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
					  
                        <tr>
                          <th>Sirial Number</th>
                          <th>Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
						   <?php if(!empty($_SESSION['id'])){ ?>
                          <th>Action</th>
						  <?php  }?>
                        </tr>
                      </thead>
                      <tbody>
					
					<?php 
					
					   foreach ($data as $innerArray) {
						//  Check type
						if (is_array($innerArray)){
							//  Scan through inner loop
							 $x=0;
							foreach ($innerArray as $value) { $x++; ?>
						<tr>
                          <th scope="row"><?php echo $x;?></th>
                          <td><?php echo $value['name'];?></td>
                          <td><?php echo $value['username'];?></td>
                          <td><?php echo $value['email'];?></td>
						  <?php if(!empty($_SESSION['id'])){ ?>
							   <td>
							<a id="<?php echo $value['id'];?>" class="edit" href="#" data-toggle="modal" data-target="#edit" data-whatever="@mdo" style="padding-right:5px"><i class="fa fa-edit"></i></a>		   
                               <a style="color:red" href="#" class="trash" id="<?php echo $value['id'];?>" href="#" data-toggle="modal" data-target="#delete" data-whatever="@mdo"><i class="fa fa-trash"></i><a/></td>
						<?php  }?>
                         
						
                        </tr>
						
								
						<?php	}
						}
					}
					
					?>
					
                        
                       
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
          </div>
        <!-- /page content -->



<!-- edit data -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="edit">New message</h4>
      </div>
      <div class="modal-body">
        <form id="updateform" method="post" action="updateuser.php">
		  <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="name" class="control-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="username" class="control-label">Username:</label>
             <input type="text" class="form-control" id="username" name="username">
          </div>

		  <div class="form-group">
            <label for="email" class="control-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
          </div> 

		  <div class="form-group">
            <label for="password" class="control-label">Password:</label>
            <input type="text" class="form-control" id="password" name="password">
          </div>
		  
		  
		   <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <input type="submit" class="btn btn-primary" name="update"></input>
		
        </form>
      </div>
     
      </div>
    </div>
  </div>
</div>


<!-- Delete data -->

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form id="updateform" method="post" action="delete.php">
		  <input type="hidden" name="deleteid" id="deleteid">
		  <center><h4 class="modal-title" id="edit">Are you sure want to delete data!</h4></center>
		   <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
           <input type="submit" class="btn btn-primary" name="delete" value="yes"></input>
		    </div>
        </form>
     
     
      </div>
    </div>
  </div>
</div>










    <!-- jQuery -->
    <script src="admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
	
	
	
	
	
	 <!-- edit data -->
  <script>
    $('.edit').click(function(){
        var id=$(this).attr('id');
        // edit
         $.ajax({
            url:'edituser.php',
            method:'get',
		    data   :{id:id},
            dataType:'json',
            success:function(data){
              $('#name').val(data.name);
              $('#username').val(data.username);
              $('#email').val(data.email);
              $('#password').val(data.password);
              $('#id').val(data.id);
            }

        });
      });
  </script>	
  
	 <!-- edit data -->
  <script>
    $('.trash').click(function(){
        var id=$(this).attr('id');
		 $('#deleteid').val(id);
        // edit
         $.ajax({
            url:'delete.php',
            method:'get',
		    data   :{id:id},
            dataType:'json',
            success:function(data){
             alert(data);
            }

        });
      });
  </script>
	
	
	
	
  </body>
  
  </head>