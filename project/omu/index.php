<?php
  
?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="images/omu.png" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/studetails.css">
	
</head>


<body>
	
<div id="limiter" class="limiter">
	<div class="container-login100" >
		<div class="wrap-login100 p-t-80 p-b-30">
			<div class="" >

				<div class="login100-form-avatar">
					<img src="images/omu.png" alt="Logo">
				</div>

				<span class="login100-form-title p-t-20 p-b-45">
					Ondokuz Mayis Üniversitesi  
				</span>

				<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
					<input class="input100 " type="text" name="username" id="username" placeholder="Username"  > 
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-user"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
					<input class="input100 " type="password" name="password" id="password"  placeholder="Password" >
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock"></i>
					</span>
				</div>

				<div class="container-login100-form-btn p-t-10">
					<button class="login100-form-btn" id="login">
						Login
					</button>
				</div>
				<br>
				<input type="radio" name="type" value="admin" > Admin
				<input type="radio" name="type" value="teacher" checked> Teacher
			</div>
		</div>
	</div>
</div>
	

<script >
$(document).on('keypress',function(e) {
    if(e.which == 13) {
			$("#login").click();
    }
});
	$( "#login" ).click(function() {

	  var username = $("#username").val(); 
		var password = $("#password").val(); 
		var radioValue = $("input[name='type']:checked").val();
		var ctrl = 1 ;

		if( username=="" || password=="" ){
			$('#username').addClass('form-control');
			$('#password').addClass('form-control');
			$("#username").attr("placeholder", "Please Write Username Here");
			$("#password").attr("placeholder", "Please Write Password Here");
		}else{
			$.ajax({url: "controller.php?method=login&password="+password+"&username="+username+"&radioValue="+radioValue , async: true, success: function(data){
					var duce = jQuery.parseJSON(data);
					if(String(duce) =="1"){
							window.location.href='homeadmin.php';
					}else if(String(duce) == "2"){
							window.location.href='home.php';
					}else{
						alert("no no no no where you are going" );
					}
			}});
		}
	});

  
</script>

</body>
</html>

		