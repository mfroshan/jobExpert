<?php 
   include('../db/connection.php');
   session_start();
   error_reporting(0);
   $msg="";
    if(isset($_POST['login']))
  {
	if(!empty($_POST['email']) && !empty($_POST['password'])){
    
	$email=$_POST['email'];
    $password=$_POST['password'];

    $sql=$conn->query("select * from login where username= '$email' && password='$password' && status=0");
	
	$result =  $sql->fetch_assoc();

	if(($sql->num_rows)>0){
      if ($result['type'] == "jobseeker"){
        $_SESSION["authenticated"] = 'true';
		$_SESSION['susername'] = $result['username'];
		$sql=$conn->query("select jsID from jobseeker where jusername= '$email'");
		$result =  $sql->fetch_assoc();
		$_SESSION['jsid'] = $result['jsID'];
        header('location: ../index.php'); 
      }
      elseif ($result['type'] == "admin"){
        $_SESSION['username'] = $result['username'];
        $_SESSION["authenticated"] = 'true';
        header('location: ../../jobExpert/Admin/index.php');
      }
	  elseif ($result['type'] == "company"){
        $_SESSION['username'] = $result['username'];
        $_SESSION["authenticated"] = 'true';
        header('location: ../../jobExpert/company/index.php');
      }
    }
    else{
		$msg="Invalid Credentials!";
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
	<title> Login </title>


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
	<form name="login" method="post">
	<div class="container">
		<h2>JobExpert<span>
			<i class="fab fa-linkedin"></i>
		</span></h2>
		<div class="text">
			<h1>Login</h1>
			<p>Stay updated on your professional world</p>
		</div>
		<p style='color:red;text-align:center;'><?php
		echo $msg;
		?></p>
		<div class="your-input">
			<div class="input">
				<input 
				type="text" 
				name="email"
				id="email" 
				onblur="validateForm()"
				required />
				<label for="email">Email</label>
			</div>
			<div class="input">
				<input type="password" name="password"
					id="password" 
					onblur="passwordCheck()"
					required />
				<label for="password">
					Password
				</label>
			</div>
		</div>
		<button 
		name="login"
		id="login"
		>Sign in</button>
		<p class="join-link">
			New ?
			<a href="signup.php" class="join-now">
				Join now
			</a>
		</p>
	</div>
</form>
</body>
<script>
	const redisplay = (email) => {
		    email.style.borderColor="black";
			document.getElementById('login').style.visibility = 'visible';
	}
	const display = (cnt) => {
			document.getElementById('login').style.visibility = 'hidden';
			cnt.style.borderColor="red";
	}
	const d = (dn) => {
		    document.getElementById('login').style.visibility = 'hidden';
			dn.style.borderColor="red";
	}
		function validateForm() {
		let x = document.forms["login"]["email"].value;
		var mailFormat =  /\S+@\S+\.\S+/;
		var input = document.getElementById("email");
		if (x == "") {
			console.log("email:"+x);
			display(input);
		  }else{
			redisplay(input);
		}
	}

		const passwordCheck = () => {
		let p = document.forms["login"]["password"].value;	
		var input = document.getElementById("password");
		if (p == "") {
			console.log("password:"+p);
			d(input)
		  }else{
			redisplay(input);
		}
	}
</script>
</html>
