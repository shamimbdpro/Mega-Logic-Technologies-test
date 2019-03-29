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
        <div class="top_nav">
          <div class="nav_menu customnav">
            <nav>
				<a class="btn btn-info" href="#signin">Login</a>
				<a class="btn btn-info" href="#signup">Register</a>
				<a class="btn btn-info" href="userlist.php">Userlist</a>
            </nav>
          </div>
        </div>
        </div>
        <!-- /top navigation -->
		
		
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content"> <!--Start Login  --> 
            <form action="" method="post">
			
			       	<?php
			include_once('config.php');
		   if(isset($_POST['submit'])){
		     	$email = $_POST["email"];
			    $password = $_POST["password"];
			  if(empty($email) || empty($password)){
				    $error = "<h5 style='color:red'>Fields Must Not Empty.<h5>";
			} else {
				$sql = "SELECT  * FROM user WHERE email='$email' AND password='$password'";
        	$result = mysqli_query($conn,$sql);
				if($result->num_rows == 1){
					$row =mysqli_fetch_assoc($result);
					Session_start();
                      $_SESSION['id'] =$row['id'];
                      $_SESSION['username'] =$row['username'];
                      $_SESSION['email'] =$row['email'];
					  $_SESSION['img'] =$row['img'];
					  $error = "You Can Login";
					   header("location: admin/index.php");
					   
				} else {
					$error = "<h5 style='color:red'>Email or Password Incorrect.<h5>";
				}
			}
			echo "<p>$error</p>";
		}
		?>
			
			
			
              <h1>Login Form</h1>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
				<input type="submit" value="Login" name="submit" class="btn btn-default submit">
				
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                 
                </div>
              </div>
            </form>
          </section>
        </div><!--End Login  --> 
			<!--Start register  --> 
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="#">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

               
              </div>
            </form>
          </section>
        </div><!--end register  --> 
      </div>
    </div>
  </body>
</html>

