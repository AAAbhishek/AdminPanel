<?php
	session_start();
	$email = $_SESSION['email'];
	$pwd = $_SESSION['pwd'];
	$name = $_SESSION['name'];
	$role = $_SESSION['role'];
	
	if(!isset($_SESSION['email'])){
		header("location:login.php");
	}
	if($_SESSION['role']!= "manager"){
		header("location:login.php");
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Management Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap--> 
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed--> 
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<style>
h1 {
	font-family: Helvetica;
	font-weight: 100;
}
body {
	color:#333;
	text-align:center;
}
</style>
  </head>
  
  <script src = "AsyncTask.js"></script>
  <script>
  function formSubmit(){
	var name = document.getElementById('ename').value;
	var email = document.getElementById('eemail').value;
	var subject = document.getElementById('subject').value;
	var message = document.getElementById('message').value;
	var confirm = document.getElementById('confirm');
	//e.preventDefault();
	var obj = new AsyncTask(
		function(){
			confirm.innerHTML = "Sending....";
		},
		{
			url: "mailTo.php",
			method: "POST",
			data:  {
				'name': name,
				'email': email,
				'subject': subject,
				'message': message,				
				}
		},
		function(status,response){
			if(status == true){
				confirm.innerHTML = response;
			}
		}
	);
	obj.execute();
	return false;
}

</script>
</script>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Manager Panel</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="login.php">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="indexM.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="calendar.php"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
            
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="row">
		  		<div class="col-md-10">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Dashboard</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  			<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<div class="content-box-header">
									<div class="panel-title">Your Task</div>
									
									<div class="panel-options">
										<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
										<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
									</div>
								</div>
								<div class="content-box-large box-with-header">
									<?php
										require 'connect.php';										
										$sql = "SELECT * FROM schedule where empid in(select empid from emp where email = '$email')";
										$result = mysqli_query($conn,$sql);
										echo '<div class="content-box-large">';
											echo '<div class="panel-body">';
												echo '<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">';
												echo '<thead>';
													echo '<tr>';
														echo'<th>Employee Id</th>';
														echo'<th>Date</th>';
														echo'<th>Description</th>';
													echo '</tr>';
												echo '</thead>';
												echo '<tbody>';
													$count = mysqli_num_rows($result);
													if($count>=1){
														while($row = mysqli_fetch_assoc($result)){
															echo '<tr>';
															echo '<td>'.$row['empid'].'</td>';
																$empid = $row['empid'];
														
															echo '<td>'.$row['empdate'].'</td>';
															echo '<td>'.$row['description'].'</td>';
															echo'</tr>';
														}
													}	
													echo'</tbody>';
													//echo "<form id = 'hidden3' method = 'post' action = 'datePick3.php'><input type = 'hidden' name = 'empid' value = '$empid'></form>";
													//echo "<script>window.onload = function(){document.getElementById('hidden3').submit();}</script>";
												echo'</table>';
											echo'</div>';
										echo'</div>';
									?>							
								</div>
							</div>
						</div>
		  			</div>
		  			</div>
		  		</div>
			<div class = "row">
			<div class = "col-md-10">		
				<div class="content-box-large">
					<div><h3>Mailing System</h3></div>
				<div class = "form-horizontal">	
			<!--	<form class="form-horizontal" role="form" method="post" action="mailTo.php" onsubmit = "javascript:formSubmit();return false;">  -->
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="ename" name="name" placeholder="First & Last Name" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="eemail" name="email" placeholder="example@domain.com" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="Subject" class="col-sm-2 control-label">Subject</label>
						<div class="col-sm-10">
							<input type ="text" class = "form-control" name="subject" id = "subject" placeholder = "subject">
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message" id = "message"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="send" name="send" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2" id = "confirm">
							<! Will be used to display an alert to the user>
						</div>
					</div>
				</div>	
					</form>
				</div>	
				</div>

		  		<div class="col-md-10">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Supply data here</div>
									
									<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
							<form  action = "indexM.php" method = "post">
							<div class = "form-horizontal">	
						<!--	<form class="form-horizontal" role="form" method="post" action="mailTo.php" onsubmit = "javascript:formSubmit();return false;">  -->
								<div class="form-group">
									<label for="date" class="col-sm-2 control-label">Start Date</label>
									<div class="col-sm-10">
										<input type="date" class="form-control" name="datepicker1" placeholder="Pick start date">
									</div>
								</div>
								<div class="form-group">
									<label for="date" class="col-sm-2 control-label">End date</label>
									<div class="col-sm-10">
										<input type="date" class="form-control" name="datepicker2" placeholder="Pick end date">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-2">
										<input id="set" name="set" type="submit" value = "send" class="btn btn-primary">
									</div>
									<?php
										echo "<input type = 'hidden' name = 'empid' value = '$empid' id = 'hidden'>";
									?>
								</div>
								<div class="form-group">
								
									<div class="col-sm-10 col-sm-offset-2" id = "msg">
											<?php
											$msg = '';
											require 'connect.php';
											$updated = '';
										if(isset($_POST['set'])){	
											$empid = mysqli_real_escape_string($conn,$_POST["empid"]);
											$date1 = mysqli_real_escape_string($conn,$_POST["datepicker1"]);
											$date2 = mysqli_real_escape_string($conn,$_POST["datepicker2"]);
											if($date2>$date1){		
												$sql = "insert into timesheet values ('$empid','$date1','$date2')"
													or die(mysqli_error($conn));
												$result= mysqli_query($conn,$sql);
												echo "Timesheet updated";
											}
										}	
									?>	
									</div>
								
								</div>
							</div>	
							</form>
							</div>
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Supply data here</div>

								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
			
		  	<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">New vs Returning Visitors</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						</div>
		  			</div>
		  			<div class="content-box-large box-with-header">
					
					</div>
		  		</div>
		  	</div>

		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

  </body>
</html>