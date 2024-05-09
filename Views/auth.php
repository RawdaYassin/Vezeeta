<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/Style.css">
	
    <title>Shefaa-Hospital</title>
</head>
<body>
    <h2></h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form  id="form1" action="../Controllers/register.php" method="post">
			<h1>Create Account</h1>
			<input type="text" id="firstName" placeholder="First name" name="firstName" required />
			<input type="text" placeholder="lastName" id="Last name" name="lastName" required>
			<div class="error"></div>
			<input type="email" id="email" placeholder="Email"name="email"required />
			<div class="error"></div>
			<input type="password" id="password" placeholder="Password" name="password"required/>
			<div class="error"></div> 
			<input type="tel" placeholder="Phone number" id="phoneNumber" name="phoneNumber">
			<div class="error"></div> 
			<input type="Date" placeholder="Select Date of birth" name="dateOfBirth">
			<select class="styled-select" name="gender" id="gender">
			<option value="">Select Gender</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			</select>
			<div class="error"><br></div>

			<button name="submit">Register</button>
			
		
		</form>
		
	</div>
	<div class="form-container sign-in-container">
		<form action="../Controllers/login.php" method="post">
			<h1>Sign in</h1>
			<span>Or use your account</span>
			<input type="email" placeholder="Email" name="email" required/>
			<input type="password" placeholder="Password" name="password" required/>
			<input type="text" placeholder="User Role (Doctor/Admin/Clinic/Patient)" name="userType" required/>
			<a href="#">Forgot your password?</a>
			<button name="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script src="../js/script.js"></script>

</body>
</html>