<?php 
   include('../db/connection.php');
   session_start();

$msg='';

    if(isset($_POST['forgotPass']))
  {
	if(!empty($_POST['email']) && !empty($_POST['mobile'])){
    
	$email = $_POST['email'];
    $num = $_POST['mobile'];

    $sql=$conn->query("select * from jobseeker where jusername='$email' && phonenumber='$num'");
	
	$result =  $sql->fetch_assoc();

	if(($sql->num_rows)>0){
		// echo json_encode($result);
		$_SESSION['EmailToChange'] = $result['jusername'];
		header('Location: ChangePass.php');
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
	<form name="ps" method="post">
	<div class="container">
		<h2>JobExpert<span>
			<i class="fab fa-linkedin"></i>
		</span></h2>
		<div class="text">
			<h1>Forgot Password ?</h1>
		</div>
		<p style='color:red;text-align:center;'>
        <?php
		echo $msg;
		?></p>
		<div class="your-input">
			<div class="input">
				<input 
				type="text" 
				name="email"
				id="email" 
				onkeypress="return AvoidSpace(event)"
				onchange="validateEmail()"
				required />
				<label for="email">Email</label>
			</div>
			<div class="input">
				<input type="number" name="mobile"
					id="mobile" 
                    pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                    onkeypress="return AvoidSpace(event)"
					onblur="number()"
					required />
				<label for="password">
					Mobile Number
				</label>
			</div>            
            <!---Second Section -->
		</div>
		<button 
		name="forgotPass"
		id="forgotPass"
		> Forgot Password</button>
		<p class="join-link">
			Back to ?
			<a href="login.php" class="join-now">
				Login
			</a>
		</p>
	</div>
</form>
</body>
<script>
   
   function AvoidSpace(event) {
            var k = event ? event.which : window.event.keyCode;
            if (k == 32) return false;
    }

	const redisplay = (email) => {
		    email.style.borderColor="black";
			document.getElementById('forgotPass').style.visibility = 'visible';
	}
	const display = (cnt) => {
			document.getElementById('forgotPass').style.visibility = 'hidden';
			cnt.style.borderColor="red";
	}
	const d = (dn) => {
		    document.getElementById('forgotPass').style.visibility = 'hidden';
			dn.style.borderColor="red";
	}

    const isValidEmail = email => {
				const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(String(email).toLowerCase());
			}
		function validateEmail() {
		let x = document.forms["ps"]["email"].value;
		var input = document.getElementById("email");
		if (x == "") {
			console.log("email:"+x);
			display(input);
		  }else if(!isValidEmail(x)){
				alert("Enter valid Email!");
				document.getElementById("email").value="";
				return false;
		}else{
			redisplay(input);
		}
	}

		const number = () => {
		let p = document.forms["ps"]["mobile"].value;	
		var input = document.getElementById("mobile");
		if (p == "") {
			console.log("mobile:"+p);
			d(input)
		  }else if(input.value.length<10){
            alert("Enter a valid mobile number!");
           d(input);
           false;     
          }
          else{
			redisplay(input);
		}
	}
</script>
</html>
