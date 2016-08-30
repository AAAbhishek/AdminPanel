<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

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
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Tables</a></h1>
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
	                          <li><a href="profile.html">Profile</a></li>
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
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="calendar.php"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li class="current"><a href="tables.php"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
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
		
			<?php	
				include 'connect.php';
				$sql = "SELECT * FROM emp;";
				$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
				
					
				echo '<div class="content-box-large">';
				echo '<div class="panel-heading">';
					echo'<div class="panel-title">Bootstrap dataTables</div>';
				echo '</div>';
					echo '<div class="panel-body">';
						echo'<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">';
						echo'<thead>';
							echo'<tr>';
								echo'<th>Employee Id</th>';
								echo'<th>Role</th>';
								echo'<th>Employee Name</th>';
								echo'<th>Age</th>';
								echo'<th>Address</th>';
								echo'<th>E-mail</th>';
							echo'</tr>';
						echo'</thead>';
						echo'<tbody>';
							$count = mysqli_num_rows($result);
							// If result matched $myusername and $mypassword, table row must be 1 row
							if($count>=1){
								while($row = mysqli_fetch_assoc($result)){
									echo'<tr>';
									echo '<td>'.$row['empid'].'</td>';
									echo '<td>'.$row['role'].'</td>';
									echo '<td>'.$row['empname'].'</td>';
									echo '<td>'.$row['age'].'</td>';
									echo '<td>'.$row['address'].'</td>';
									echo '<td>'.$row['email'].'</td>';
									echo'</tr>';
								}
							}	
							echo'</tbody>';
						echo'</table>';
					echo'</div>';
				echo'</div>';
			?>

		  </div>
		  <div class="col-md-10">
		
			<?php	
				require 'connect.php';
				$sql = "SELECT * FROM schedule";
				$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
				
					
				echo '<div class="content-box-large">';
				echo '<div class="panel-heading">';
					echo'<div class="panel-title">Task assigned to Managers</div>';
				echo '</div>';
					echo '<div class="panel-body">';
						echo'<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">';
						echo'<thead>';
							echo'<tr>';
								echo'<th>Employee Id</th>';
								echo'<th>Date</th>';
								echo'<th>Description</th>';
							//	echo'<th>Age</th>';
							//	echo'<th>Address</th>';
							//	echo'<th>E-mail</th>';
							echo'</tr>';
						echo'</thead>';
						echo'<tbody>';
							$count = mysqli_num_rows($result);
							// If result matched $myusername and $mypassword, table row must be 1 row
							if($count>=1){
								while($row = mysqli_fetch_assoc($result)){
									echo'<tr>';
									echo '<td>'.$row['empid'].'</td>';
									echo '<td>'.$row['empdate'].'</td>';
									echo '<td>'.$row['description'].'</td>';
								//	echo '<td>'.$row['age'].'</td>';
								//	echo '<td>'.$row['address'].'</td>';
								//	echo '<td>'.$row['email'].'</td>';
									echo'</tr>';
								}
							}	
							echo'</tbody>';
						echo'</table>';
					echo'</div>';
				echo'</div>';
			?>

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

      <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>
  </body>
</html>