<?php
	session_start();


	$isPost = $_SERVER["REQUEST_METHOD"]=="POST";
	$isValid = TRUE;

	$name = isset($_SESSION["name"])?$_SESSION["name"]:"";
	$email = isset($_SESSION["email"])?$_SESSION["email"]:"";
	$username = isset($_SESSION["username"])?$_SESSION["username"]:"";
	$pwd = isset($_SESSION["pwd"])?$_SESSION["pwd"]:"";
	$conpwd = isset($_SESSION["conpwd"])?$_SESSION["conpwd"]:"";
	$city = isset($_SESSION["city"])?$_SESSION["city"]:"";
	$postalcode = isset($_SESSION["postalcode"])?$_SESSION["postalcode"]:"";
	$homephone = isset($_SESSION["homephone"])?$_SESSION["homephone"]:"";
	$mobphone = isset($_SESSION["mobphone"])?$_SESSION["mobphone"]:"";
	$ccno = isset($_SESSION["ccno"])?$_SESSION["ccno"]:"";
	$monthlysalary= isset($_SESSION["monthlysalary"])?$_SESSION["monthlysalary"]:"";
	$url = isset($_SESSION["url"])?$_SESSION["url"]:"";
	$gpa = isset($_SESSION["gpa"])?$_SESSION["gpa"]:"";
	$address = isset($_SESSION["address"])?$_SESSION["address"]:"";
	$ccexdate = isset($_SESSION["ccexdate"])?$_SESSION["ccexdate"]:"";
	$dateofbirth = isset($_SESSION["dateofbirth"])?$_SESSION["dateofbirth"]:"";

	$namePattern = "/^\D{2,}$/";
	$emailPattern = "/^\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b$/";
	$usernamePattern = "/^\w{5,}$/";
	$pwdPattern = "/^\w{8,}$/";
	$conpwdPattern = "/^\w{8,}$/";
	$postalcodePattern = "/\d{6}/";
	$pwdPattern = "/^\w{8,}$/";
	$homephonePattern = "/\d{2}\s\d{7}/";
	$mobphonePattern = "/\d{2}\s\d{7}/";
	$ccnoPattern = "/\d{4}\s\d{4}\s\d{4}\s\d{4}/";
	$monthlysalaryPattern = "/^UZS [1-9]\d{0,2}(,\d{3})*\.\d{2}$/";
	$gpaPattern = "/^[0-4]{1}\.((5){1}|[0-4]{1}[0-9]{1})$/";




	if($isPost) {
		$name = $_REQUEST["name"];
		$email = $_REQUEST["email"];
		$username = $_REQUEST["username"];
		$pwd = $_REQUEST["pwd"];
		$conpwd = $_REQUEST["conpwd"];
		$city = $_REQUEST["city"];
		$postalcode = $_REQUEST["postalcode"];
		$homephone = $_REQUEST["homephone"];
		$mobphone = $_REQUEST["mobphone"];
		$ccno = $_REQUEST["ccno"];
		$monthlysalary = $_REQUEST["monthlysalary"];
		$url = $_REQUEST["url"];
		$gpa = $_REQUEST["gpa"];
		$address = $_REQUEST["address"];
		$ccexdate = $_REQUEST["ccexdate"];
		$dateofbirth = $_REQUEST["dateofbirth"];


		$_SESSION["email"] = $email;
		$_SESSION["state"] = $state;
		$_SESSION["username"] = $username;
		$_SESSION["pwd"] = $pwd;
		$_SESSION["conpwd"] = $conpwd;
		$_SESSION["city"] = $city;
		$_SESSION["postalcode"] = $postalcode;
		$_SESSION["homephone"] = $homephone;
		$_SESSION["mobphone"] = $mobphone;
		$_SESSION["monthlysalary"] = $monthlysalary;
		$_SESSION["url"] = $url;
		$_SESSION["gpa"] = $gpa;
		$_SESSION["address"]= $address;
		$_SESSION["ccexdate"]= $address;
		$_SESSION["dateofbirth"]= $address;
		


	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<h1>Registration Form</h1>

		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
		<dl>
		<form action="index.php" method="post">
			<dt>Name</dt>
			<dd>
				<input type="text" name="name"> 
					<?php if($isPost && !preg_match($namePattern, $name)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide name.</span>
					<?php } ?>				
			</dd>
			<dt>Email</dt>
			<dd>
				<input type="text" name="email"> 
					<?php if($isPost && !preg_match($emailPattern, $email)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide email.</span>
					<?php } ?>					

			</dd>
			<dt>Username</dt>
			<dd>
				<input type="text" name="username"> 
					<?php if($isPost && !preg_match($usernamePattern, $username)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide username.</span>
					<?php } ?>	
			</dd>
			<dt>Password</dt>
			<dd>
				<input type="password" name="pwd" >
					<?php if($isPost && !preg_match($pwdPattern, $pwd)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide password.</span>
					<?php } ?>	
			</dd>
			<dt>Confirm Password</dt>
			<dd>
				<input type="password" name="conpwd"  >
					<?php if(!($_POST["pwd"] == $_POST["conpwd"])) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide correct confirm password.</span>
					<?php } ?>
			</dd>
			<dt>Date of birth</dt>
				<dd><input type="date" name="dateofbirth" value="<?= $dateofbirth ?>" />
				
      				<?php if (empty($_POST["dateofbirth"])) {
        					$isValid = FALSE;
      					?>
      					<span class="error">Please, enter date of birth</span>
      				<?php } ?>
			</dd>
			<dt>Gender</dt>
			<dd>
				<input type="radio" name="name" value="gender"/>Male   
				<input type="radio" name="name" value="gender"/>Female
			</dd>
			<dt>Marital Status</dt>
			<dd>
				<input type="radio" name="name" value="gender"/>Single   
				<input type="radio" name="name" value="gender"/>Married
				<input type="radio" name="name" value="gender"/>Divorced  
				<input type="radio" name="name" value="gender"/>Widowed
			</dd>
			<dt>Address</dt>
			<dd>
				<input type="text" name="address" value="<?= $address ?>"/>
					<?php if (empty($_POST["address"])) {
        					$isValid = FALSE;
      					?>
      					<span class="error">Please, enter address</span>
      				<?php } ?>
					
			</dd>
			<dt>City</dt>
			<dd>
				<input type="text" name="city" value="<?= $city ?>"/>
				<?php if (empty($_POST["city"])) {
        					$isValid = FALSE;
      					?>
      					<span class="error">Please, enter city</span>
      				<?php } ?>
							
			</dd>
			<dt>Postal Code</dt>
			<dd>
				<input type="text" name="postalcode" > 
					<?php if($isPost && !preg_match($postalcodePattern, $postalcode)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide correct Postal Code.</span>
					<?php } ?>	
			</dd>
			<dt>Home Phone</dt>
			<dd>
				<input type="text" name="homephone" >
					<?php if($isPost && !preg_match($homephonePattern, $homephone)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide Home Phone.</span>
					<?php } ?>
			</dd>
			<dt>Mobile Phone</dt>
			<dd>
				<input type="text" name="mobphone">
					<?php if($isPost && !preg_match($mobphonePattern, $mobphone)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide Mobile phone.</span>
					<?php } ?>
			</dd>
			<dt>Credit Card Number</dt>
			<dd>
				<input type="text" name="ccno" >
					<?php if($isPost && !preg_match($ccnoPattern, $ccno)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide  Credit Card Number .</span>
					<?php } ?>
			</dd>
			<dt>Credit Card Expiry Date</dt>
			<dd>
				<input type="date" name="ccexdate" value="<?= $ccexdate ?>">
				<?php if (empty($_POST["ccexdate"])) {
        					$isValid = FALSE;
      					?>
      					<span class="error">Please, enter Credit Card Expiry Date </span>
      				<?php } ?>
			</dd>
			<dt>Monthly Salary</dt>
			<dd>
				<input type="text" name="monthlysalary" >
					<?php if($isPost && !preg_match($monthlysalaryPattern, $monthlysalary)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide Monthly Salary .</span>
					<?php } ?>
			</dd>
			<dt>Web Site URL</dt>
			<dd>
				<input type="url" name="url" value="<?= $url ?>">
					<?php if (empty($_POST["url"])) {
        					$isValid = FALSE;
      					?>
      					<span class="error">Please, enter correct URL</span>
      				<?php } ?>
			</dd>
			<dt>Overall GPA</dt>
			<dd>
				<input type="text" name="gpa">
					<?php if($isPost && !preg_match($gpaPattern, $gpa)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, enter GPA .</span>
					<?php } ?>
			</dd>
		</dl>
		
		<div>
			<input type="submit" name="register" value="Register" />
		</div>
		</form>
	</body>
</html>