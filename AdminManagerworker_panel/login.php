<?php
/*php script for login 
and validation of users	
*/
	session_start();
	require 'connect.php';
	$tbl_name="emp"; 
	$power = $empid = $role = $name = $status = '';
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		if (!$_POST['email']) {
			$errName = 'Please enter your Email';
		}

		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		if(!$_POST['pwd']){
			$errPwd = "Please enter your Password";
		}
		
		$email = stripslashes($email);
		$pwd = stripslashes($pwd);
		$email = mysqli_real_escape_string($conn,$email);
		$pwd = mysqli_real_escape_string($conn,$pwd);
		$pwd = md5($pwd);
		$sql = "SELECT * FROM $tbl_name WHERE email='$email' and pwd='$pwd'";
		$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
		
		$count = mysqli_num_rows($result);
			
		if($count>=1){
			while($row = mysqli_fetch_assoc($result)){
				$power = $row['role'];
				$role = $row['role'];
				$empid = $row['empid'];
				$email = $row['email'];
				$name = $row['empname'];
				$status = $row['status'];
			}
		}
		$_SESSION['email'] = $email;
		$_SESSION['pwd'] = $pwd;
		$_SESSION['name'] = $name;
		$_SESSION['empid'] = $empid;
		$_SESSION['role'] = $role;
		$_SESSION['status'] = $status;
		$power = strtolower($power);
		if($power == "manager"){	
			header("location:indexM.php");
			
		}else if($power == "admin"){ 
			header("location:index.php");
			
		}else if($power == "worker"){
			header("location:indexW.php");
		}
		else{
			$err = "Wrong Username or Password";
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Login Page</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Sign In</h6>
			                <div class="social">
	                            <a class="face_login" href="#">
	                                <span class="face_icon">
	                                    <img src="images/facebook.png" alt="fb">
	                                </span>
	                                <span class="text">Sign in with Facebook</span>
	                            </a>
	                            <div class="division">
	                                <hr class="left">
	                                <span>or</span>
	                                <hr class="right">
	                            </div>
	                        </div>
							<form class = "form-horizontal" role="form" action="login.php" method="post">
								<div class = "form-group">
									<input class="form-control" type = "email" name = "email" placeholder="E-mail address">
								</div>
								<div class = "form-group">
									<input class="form-control" type="password" name = "pwd" placeholder="Password">
								</div>
								<div class="form-group">
									<div class="col-md-4 col-md-offset-2">
										<input id="submit" name="submit" type="submit" value="Sign in" class="btn btn-primary">
									</div>
									<div class = "col-md-4 col-md-offset-2">
										<div class ="alert alert-danger"><div>
									</div>
								</div>
							</form>		
			            </div>
			        </div>

			        <div class="already">
			            <p>Don't have an account yet?</p>
			            <a href="signup.html">Sign Up</a>
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>