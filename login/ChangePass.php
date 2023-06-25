<?php 
   include('../db/connection.php');
   session_start();
   
 if(isset($_SESSION['EmailToChange'])){
	$email = $_SESSION['EmailToChange'];
	}else{
		header('Location: login.php');
	}
$msg='';

    if(isset($_POST['Change']))
  {
	if(!empty($_POST['pass1']) && !empty($_POST['pass2'])){
    
	$pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
		
	$email = $_SESSION['EmailToChange'];

    $sql="update login set password='$pass1' where username='$email'";

	if($conn->query($sql)){
		header("Location: login.php");
    }
    else{
		$msg="Somethig went wrong!";
    }
  }else{
		$msg="Somethig went wrong!";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Free Web tutorials" />
	<meta name="keywords" content="HTML, CSS, JavaScript" />
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0" />
	<title> Change Password </title>


	<!--Font Awesome-->
	<link rel="stylesheet" href=
		"https://use.fontawesome.com/releases/v5.7.0/css/all.css"
		integrity=
"sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
		crossorigin="anonymous" />

	<!--Style CSS-->
	<link rel="stylesheet" href="style.css" />

</head>
<body>
	<form name="ps" method="post">
	<div class="container">
		<h2>JobExpert<span>
			<i class="fab fa-linkedin"></i>
		</span></h2>
		<div class="text">
			<h1>Change Password</h1>
		</div>
		<p style='color:red;text-align:center;'>
        <?php
		echo $msg;
		?></p>
		<div class="your-input">
			<div class="input">
				<input 
				type="password" 
				name="pass1"
				id="pass1" 
				onchange="passwordCheck()"
				onkeypress="return AvoidSpace(event)"
				required />
				<label for="email">Password</label>
			</div>
			<div class="input">
				<input type="password" name="pass2"
					id="pass2" 
					onchange="passwordCheck()"
                    onkeypress="return AvoidSpace(event)"
					required />
				<label for="password">
				Confirm Password
				</label>
			</div>            
            <!---Second Section -->
		</div>
		<button 
		name="Change"
		id="Change"
		> Change Password</button>
	</div>
</form>
</body>
<script>
   

   function AvoidSpace(event) {
            var k = event ? event.which : window.event.keyCode;
            if (k == 32) return false;
    }

	const redisplay = () => {
			document.getElementById('Change').style.visibility = 'visible';
	}
	const hide = () => {
			document.getElementById('Change').style.visibility = 'hidden';
	}

    
		function passwordCheck() {
		let pass1  = document.forms["ps"]["pass1"].value;
		let pass2  = document.forms["ps"]["pass2"].value;
		if(pass1!='' && pass2 !=''){
		if (pass1 != pass2) {
			 hide();
			 alert("Passwords Does not Match!")
		  }
		  else{
			redisplay();
		}
	 }
	}

	
</script>
</html>
