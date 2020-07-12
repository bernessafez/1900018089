<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style type="text/css">
		body{
			background-color: snow;
		}
		.error{color:#FF0000;}
		input[type=text]{
			width: 50%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 1px solid #555;
			outline: none;
		}
		input[type=text]:focus{
			background-color: lightgrey;
		}
		input[type=email]{
			width: 50%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 1px solid #555;
			outline: none;
		}
		input[type=email]:focus{
			background-color: lightgrey;
		}
		input[type=password]{
			width: 50%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 1px solid #555;
			outline: none;
		}
		input[type=password]:focus{
			background-color: lightgrey;
		}
		input[type=date]{
			width: 50%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 1px solid #555;
			outline: none;
		}
		input[type=date]:focus{
			background-color: lightgrey;
		}
	</style>
</head>
<body>
	<?php
	$mobile_numberErr = $emailErr = $passwordErr = $confirm_passwordErr = $nameErr = $dateofbirthErr = $genderErr = "";
	$mobile_number = $email = $password = $confirm_password = $name = $dateofbirth = $gender = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["mobile_number"])) {
	    $mobile_numberErr = "required";
	  } else {
	    $mobile_number = test_input($_POST["mobile_number"]);
	  }
	  
	  if (empty($_POST["email"])) {
	    $emailErr = "required";
	  } else {
	    $email = test_input($_POST["email"]);
	  }
	    
	  if (empty($_POST["password"])) {
	    $passwordErr = "required";
	  } else {
	    $password = test_input($_POST["password"]);
	  }

	  if (empty($_POST["confirm_password"])) {
	    $confirm_passwordErr = "required";
	  } else {
	    $confirm_password = test_input($_POST["confirm_password"]);
	  }

	  if (empty($_POST["name"])) {
	    $nameErr = "required";
	  } else {
	    $name = test_input($_POST["name"]);
	  }

	  if (empty($_POST["dateofbirth"])) {
	    $dateofbirthErr = "required";
	  } else {
	    $dateofbirth = test_input($_POST["dateofbirth"]);
	  }

	  if (empty($_POST["gender"])) {
	    $genderErr = "required";
	  } else {
	    $gender = test_input($_POST["gender"]);
	  }
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<h1>Create a Suncoffee Account</h1>
	<p><span class="error">Required*</span></p>
	<label for="mobile_number">Mobile Number</label>
	<span class="error">* <?php echo $mobile_numberErr;?></span>
	<p><input type="text" id="mobile_number" name="mobile_number"></p>
	<input type="submit" name="submit" value="SEND OTP">
	<label for="otp"></label>
	<p><input type="text" id="otp" name="otp" placeholder="Input OTP number"></p>
	<p>Verify your mobile number with OTP via SMS</p>
	<br>
	<h1>Input Your Email and Password</h1>
	<p>You'll need these to sign in to your Suncoffee account</p>
	<label for="email">Email Address</label>
	<span class="error">* <?php echo $emailErr;?></span>
	<p><input type="email" id="email" name="email"></p>
	<label for="password">Password</label>
	<span class="error">* <?php echo $passwordErr;?></span>
	<p><input type="password" id="password" name="password"></p>
	<p>Must be 8-12 characters. It must contains at least 1 each of Uppercase later, Number and a Speceial character</p>
	<label for="confirm_password">Confirm Password</label>
	<span class="error">* <?php echo $confirm_passwordErr;?></span>
	<p><input type="password" id="confirm_password" name="confirm_password"></p>
	<br>
	<h1>Provide Your Contact Information</h1>
	<p>Please tell us how to reach you in the future</p>
	<label for="name">Member Name</label>
	<span class="error">* <?php echo $nameErr;?></span>
	<p><input type="text" id="name" name="name"></p>
	<label for="dateofbirth">Date of Birth</label>
	<span class="error">* <?php echo $dateofbirthErr;?></span>
	<p><input type="date" id="dateofbirth" name="dateofbirth"></p>
	<p>(*date of birth cannot be changed after submission)</p><br>
	<p>Gender<span class="error">* <?php echo $genderErr;?></span>
	<label><input type="radio" name="gender" value="male">Male</label>
	<label><input type="radio" name="gender" value="female">Female</label></p><br>
	<p><label for="favbeverage">Favorite Beverage</label></p>
	<p><input type="text" id="favbeverage" name="favbeverage"></p>
	<br>
	<h1>Choose Your Registration Type</h1>
	<label><input type="radio" name="regtype" value="donthave">I DONT HAVE A SUNCOFFEE CARD</label>
	<label><input type="radio" name="regtype" value="have">I HAVE A SUNCOFFEE CARD</label>
	<br>
	<p>
	<label><input type="checkbox" name="first" value="dont">I do not wish to receive any direct marketing communications from Suncoffee Indonesia. Please note that if you are a Suncoffee member and you opt out of receiving direct marketing communications from us, we will still send you membership communications (including but not limited to information about membership program, Suncoffee Rewards and membership renewal)</label>
	</p>
	<p>
	<label><input type="checkbox" name="second" value="agree">I agree to Terms & Conditions</label>
	</p>
	<p>
		<button type="submit" name="submit">Sign Up</button>
	</p>
	<p>
		<a href="tabel.php">See Data</a>
	</p>
	</form>
	<div>
		<?php
		$fp = fopen("register1.txt", "a+");
		$mobile_number = $_POST['mobile_number'];
		$email = $_POST['email'];
		$name = $_POST['name'];
		$dateofbirth = $_POST['dateofbirth'];
		$gender = $_POST['gender'];

		fputs($fp,"$name|$dateofbirth|$gender|$email|$mobile_number\n");
		fclose($fp);
		?>
	</div>
</body>
</html>
