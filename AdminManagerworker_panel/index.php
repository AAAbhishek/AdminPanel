<?php
	session_start();
	$email = $_SESSION['email'];
	$pwd = $_SESSION['pwd'];
	$name = $_SESSION['name'];
	$role = $_SESSION['role'];
	$role = $_SESSION['empid'];
	
	if(!isset($_SESSION['email'])){
		header("location:login.php");
	}
	if($_SESSION['role']!= "admin" && $_SESSION['role']!="Admin"){
		header("location:login.php");
	}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script> 
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  </head>
  <body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  -->
  <script src = "AsyncTask.js"></script>
<script>
$(function() {
    $( "#id1" ).autocomplete({
        source: 'addEmpFetch.php'
    });
});
</script>
<script>
$(function(){
    $( "#id2" ).autocomplete({
        source: 'addEmpFetch2.php'
    });
});
</script>
<script>
$(function(){
    $( "#iid1" ).autocomplete({
        source: 'assignT1.php'
    });
});
</script>
<script>
$(function(){
    $( "#updateEmpId" ).autocomplete({
        source: 'addEmpFetch.php'
    });
});
</script>
<script>
$(function(){
    $( "#ename" ).autocomplete({
        source: 'addEmpFetch2.php'
    });
});
</script>  
  <script>
function validate(){
	  var address = document.getElementById('address').value;	
	  var tag = document.getElementById('empName').value;
	  if(isNaN(tag)){
		  return true;
	  }else{
		 document.getElementById('em').innerHTML = "enter number only";
	  }
	  if(tag == ''){
		  document.getElementById('em').innerHTML = "Please enter data";  
	  }else{
		  return true;
	  }
	  if(isNaN(address)){
		  return true;
	  }else{
		 document.getElementById('em').innerHTML = "enter number only";
	  }
	  if(tag == ''){
		  document.getElementById('em').innerHTML = "Please enter data";  
	  }else{
		  return true;
	  }
  }  
  </script>
  <script>
function suspend(){
	var tag = document.getElementById('empid').value;
	var days = document.getElementById('days').value;
	if(isNaN(days)){
		p.document.getElementById('para').innerHTML = "Enter only number";
	}
}
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

  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Admin Panel</a></h1>
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
                    <li class="current"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="calendar.php"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li><a href="tables.php"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
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
		  		<div class="col-md-6">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title"><h3>Remove Employee form</h3></div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
						<form role="form" action = "removeEmp.php" method = "POST" target = "_self">
							<div class="form-group">
								<label for="id">Employee ID</label>
								<input type="number" class="form-control"  name = "id" id="id1">
								<p id = "em"></p>							
							</div>
							<div class="form-group">
								<label for="name">Employee Name</label>
								<input type="text" class="form-control" id="id2"  name = "name">
							</div>
							<button type="submit" class="btn btn-default" onclick = "validate()">Remove</button>
						</form>		
		  				</div>
		  			</div>
		  		</div>

		  		<div class="col-md-6">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Assign Manager Task</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  		<form role="form" action = "assignMan.php" method = "post" target = "_self">
							<div class="form-group">
								<label for="empid">Employee ID</label>
								<input type="number" class="form-control"  name = "empid" id="iid1">
								<p id = "em"></p>
							</div>
							<div class="form-group">
								<label for="date">Date (yyyy-mm-dd) format</label>
								<input type="text" class="form-control" id="date"  name = "date">
							</div>
							<div class="form-group">
								<label for="role">Description</label>
								<input type="text" class="form-control" id="description"  name = "description">
							</div>
							<button type="submit" class="btn btn-default" name = "assign" onclick = "validate()">Assign Task</button>
						</form>
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>

		  	<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Update the information</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						</div>
		  			</div>
								
					<div class="content-box-large box-with-header">
						<form role="form" action = "updateEmp.php" method = "POST" target = "_self">
							<div class="form-group">
								<label for="empid">Employee ID</label>
								<input type="number" class="form-control"  name = "id" id="updateEmpId">
								<p id = "em"></p>
							</div>
							<div class="form-group">
								<label for="role">Role</label>
								<input type="text" class="form-control" id="role"  name = "role">
							</div>
							<div class="form-group">
								<label for="empname">Employee Name</label>
								<input type="text" class="form-control" id="role"  name = "name">
							</div>
							<div class="form-group">
								<label for="role">Age :</label>
								<input type="text" class="form-control" id="id"  name = "age">
								<p id = "em"></p>
							</div>
							<div class="form-group">
								<label for="role">Address</label>
								<input type="text" class="form-control" id="role"  name = "addr">
							</div>
							<div class="form-group">
								<label for="email">E-mail :</label>
								<input type="email" class="form-control" id="email"  name = "email">
							</div>
							<button type="submit" class="btn btn-default" onclick = "validate()">Update Info</button>
						</form>
		  
					</div>
		  		</div>
		  	</div>

		  	<div class="content-box-large">
			<div><h3>Add Freshers	</h3></div>
				<form role="form" action = "addEmp.php" method = "POST" target = "_self">
					<div class="form-group">
						<label for="email">Employee ID</label>
						<input type="number" class="form-control"  name = "id" id="id" required = "required" >
						<p id = "em"></p>
					</div>
					<div class="form-group">
						<label for="role">Role</label>
						<input type="text" class="form-control" id="role"  name = "role" required = "required">
					</div>
					<div class="form-group">
						<label for="role">Employee Name</label>
						<input type="text" class="form-control" id="empName"  name = "name" required = "required">
					</div>
					<div class="form-group">
						<label for="role">Age :</label>
						<input type="number" class="form-control" id="age"  name = "age" required = "required">
					</div>
					<div class="form-group">
						<label for="role">Address</label>
						<input type="text" class="form-control" id="address"  name = "addr" required = "required">
					</div>
					<div class="form-group">
						<label for="email">E-mail :</label>
						<input type="email" class="form-control" id="email"  name = "email" required = "required">
					</div>
					<button type="submit" name = "submit" class="btn btn-default" onclick = "validate()">Add Employee</button>
					<div id = "em">
						
					</div>
				</form>
		  	</div>
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
							<input id="send" name="send" type="submit" value="Send" class="btn btn-primary" onclick = "formSubmit()">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2" id = "confirm">
							<! Will be used to display an alert to the user>
						</div>
					</div>
				</div>	
		<!--		</form>      -->
		  	</div>
			
				<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Suspension Panel</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
								<form role="form" action = "suspendEmp.php" method = "post" target = "_self">
									<div class="form-group">
										<label for="empid">Employee ID</label>
										<input type="text" class="form-control"  name = "empid" id="empid">
									</div>
									<div class="form-group">
										<label for="days">Employee Name</label>
										<input type="text" class="form-control"  name = "days" id="empName">
									</div>	
									<button type="submit" class="btn btn-default" name = "assign">Suspend</button>
								</form>
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
 <!--   <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!--  <script src="bootstrap/js/bootstrap.min.js"></script> -->
    <script src="js/custom.js"></script>
  </body>
</html>>