<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Free Web tutorials" />
	<meta name="keywords" content="HTML, CSS, JavaScript" />
	<meta name="author" content="John Doe" />
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0" />
	<title>Sign Up</title>


	<!--Font Awesome-->
	<link rel="stylesheet" href=
		"https://use.fontawesome.com/releases/v5.7.0/css/all.css"
		integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
		crossorigin="anonymous" />

	<!--Style CSS-->
	<link rel="stylesheet" href="style.css" />

</head>

<body>
<form method="POST"  enctype="multipart/form-data">
	<div class="container">
		<h2>JobExpert<span>
			<i class="fab fa-linkedin"></i>
		</span></h2>
		<div class="text">
			<h1>Sign in</h1>
			<p>Stay updated on your professional world</p>
		</div>
		<div class="your-input">
			<div class="input">
				<input type="text" 
				name="fname"
				id="fname" 
				required 
				onchange="fnameCheck()"
				onkeypress="return AvoidSpace(event)"
				/>
				<label for="fname">First Name</label>
				<div class="error"></div>
			</div>
			<div class="input">
				<input type="lname" 
				name="lname"
				id="lname"
				onchange="lnameCheck()" 
				onkeypress="return AvoidSpace(event)"
				required />
				<label for="lname">Last Name</label>
			</div>
			<div class="input">
				<input type="text" name="email"
					id="email" 
					onchange="check(this.value)"
					onkeypress="return AvoidSpace(event)"
					required />
				<label for="email">Email</label>
			</div>
			<div class="input">
				<input type="number" 
				name="mobile"
				id="mobile" 
				pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
				onchange="CheckNum()"
				onKeyPress="if(this.value.length==10) return false;"
				required />
				<label for="number">Number</label>
			</div>
			<div class="input">
				<input type="password" name="password"
					id="password" 
					onkeypress="return AvoidSpace(event)"
					required />
				<label for="password">
					Password
				</label>
			</div>
			<div class="input">
					<select name="type" 
					id="type" 
					>
					<option value="jobseeker">Student</option>
					<option value="company">Company</option>
					</select>
					<label for="role">
					Type of Account
				</label>
			</div>
			<input type="hidden" name="role" id="role" />
			<div class="input">
             <input 
			 type="file" 
			 name="image" 
			 id="image"
			 accept="image/x-png,image/gif,image/jpeg,image/jpg" 
			 required>
			 <label for="role">
					Image Upload
				</label>
			</div>
		</div>
		<button type="submit" id="register" name="register">Sign up</button>
		<p class="join-link">
			<a href="login.php" class="join-now">
				login
			</a>
		</p>
	</div>
	</form>
</body>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="./register.js"></script>
<script>
	

	const check = (email) => {
            $.ajax({
                type: "POST",
                url: "./CheckEmail.php",
                data:{
                    'email': email,
                },
                success: function(res){
                    if(res==1){
						alert("Email Exist");
						document.getElementById("email").value="";
					}
                }
            })

			const isValidEmail = email => {
				const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(String(email).toLowerCase());
			}

			if(!isValidEmail(email)){
				alert("Enter valid Email!");
				document.getElementById("email").value="";
				return false;
			}

        }
			
</script>
</html>
<?php 
include('../db/connection.php');
include('functions.php');

		if(isset($_POST['register'])){
			        $fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$phone = $_POST['mobile'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					$role = $_POST['type'];
					$image = imageConvert($_FILES['image'],'images/'); 

					if($role=='jobseeker'){
						$sql = "insert into login(username,password,type,status) values('$email','$password','jobseeker',0)";
						if($conn->query($sql)){
							$conn->query("
								insert into jobseeker(jusername,fname,lname,phonenumber,image) 
								value (
									'$email',
									'$fname',
									'$lname',
									'$phone',
									'$image'
								)
							");
						}
					}else{
						$sql = "insert into login(username,password,type,status) values('$email','$password','company',0)";
						if($conn->query($sql)){
							$conn->query("
								insert into company(Cusername,cName,cNum,cImage) 
								value (
									'$email',
									'$fname $lname',
									'$phone',
									'$image'
								)
							");
					}
					
				}
				header('Location: login.php');
		}
?>