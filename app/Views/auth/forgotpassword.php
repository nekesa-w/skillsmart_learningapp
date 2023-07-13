<?php 
session_start();
$error = array();

require "mail.php";

	if(!$conn = mysqli_connect("127.0.0.1:3306", "root", " ", "cs_project_i")){

		die("could not connect");
	}

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}

	//something is posted
	if(count($_POST) > 0){

		switch ($mode) {
			case 'enter_email':
				// code...
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}elseif(!valid_email($email)){
					$error[] = "That email was not found";
				}else{

					$_SESSION['forgot']['email'] = $email;
					send_email($email);
					header("Location: forgot.php?mode=enter_code");
					die;
				}
				break;

			case 'enter_code':
				// code...
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "the code is correct"){

					$_SESSION['forgot']['code'] = $code;
					header("Location: forgot.php?mode=enter_password");
					die;
				}else{
					$error[] = $result;
				}
				break;

			case 'enter_password':
				// code...
				$password = $_POST['password'];
				$password2 = $_POST['password2'];

				if($password !== $password2){
					$error[] = "Passwords do not match";
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: forgot.php");
					die;
				}else{
					
					save_password($password);
					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}

					header("Location: login.php");
					die;
				}
				break;
			
			default:
				// code...
				break;
		}
	}

	function send_email($email){
		
		global $conn  ;

		$code = rand(10000,99999);
		$email = addslashes($email);

		$query = "insert into tbl_codes (email,code,expire) value ('$email','$code')";
		mysqli_query($conn  ,$query);

		//send email here
		send_mail($email,'Password reset',"Your code is " . $code);
	}
	
	function save_password($password){
		
		global $conn  ;

		$password = password_hash($password, PASSWORD_DEFAULT);
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "update tbl_users set password = '$password' where email = '$email' limit 1";
		mysqli_query($conn  ,$query);

	}
	
	function valid_email($email){
		global $conn  ;

		$email = addslashes($email);

		$query = "select * from tbl_users where email = '$email' limit 1";		
		$result = mysqli_query($conn  ,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}

		return false;

	}

	function is_code_correct($code){
		global $conn  ;

		$code = addslashes($code);
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "select * from tbl_codes where code = '$code' && email = '$email' order by id desc limit 1";
		$result = mysqli_query($conn  ,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['expire'] > $expire){

					return "the code is correct";
				}
			}else{
				return "the code is incorrect";
			}
		}

		return "the code is incorrect";
	}

	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/0e4ad45b15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="registerlogin/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="registerlogin/css/style.css">
    <title>Forgot Password</title>
</head>
<body>


		<?php 

			switch ($mode) {
				case 'enter_email':
					// code...
					?>
						<form method="post" action="forgot.php?mode=enter_email"> 
							<h1>Forgot Password</h1>
							<h3>Enter your email below</h3>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>
							<input class="textbox" type="email" name="email" placeholder="Email"><br>
							<br style="clear: both;">
							<input type="submit" value="Next">
							<br><br>
							<div><a href="login.php">Login</a></div>
						</form>
					<?php				
					break;

				case 'enter_code':
					// code...
					?>
						<form method="post" action="forgot.php?mode=enter_code"> 
							<h1>Forgot Password</h1>
							<h3>Enter your the code sent to your email</h3>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							<input class="textbox" type="text" name="code" placeholder="12345"><br>
							<br style="clear: both;">
							<input type="submit" value="Next" style="float: right;">
							<a href="forgot.php">
								<input type="button" value="Start Over">
							</a>
							<br><br>
							<div><a href="login.php">Login</a></div>
						</form>
					<?php
					break;

				case 'enter_password':
					// code...
					?>
						<form method="post" action="forgot.php?mode=enter_password"> 
							<h1>Forgot Password</h1>
							<h3>Enter your new password</h3>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							<input class="textbox" type="text" name="password" placeholder="Password"><br>
							<input class="textbox" type="text" name="password2" placeholder="Retype Password"><br>
							<br style="clear: both;">
							<input type="submit" value="Next" style="float: right;">
							<a href="forgot.php">
								<input type="button" value="Start Over">
							</a>
							<br><br>
							<div><a href="login.php">Login</a></div>
						</form>
					<?php
					break;
				
				default:
					// code...
					break;
			}

		?>


</body>
</html>