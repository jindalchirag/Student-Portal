<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: logout.php"); 
    }
else{
	if(isset($_POST['login1']))
		{
		if(!empty($_POST["otp"]))
		{
			$otp=$_POST['otp'];
			if($_COOKIE['otp']==$otp)
			echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
			else
			$error="Please enter correct otp.";
		}
		else
		{
			$error="Please fill OTP first.";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Portal</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
</head>
<body>
	<h1 class = "text-uppercase" id = "righteous"><center>IIITM student portal</center></h1>
	<div class = "container" id="pulse">
			<div>
				<p id="space">
					<a href="https://www.iiitm.ac.in" target="_blank">
						<img src="https://upload.wikimedia.org/wikipedia/en/b/b3/Atal_Bihari_Vajpayee_Indian_Institute_of_Information_Technology_and_Management%2C_Gwalior_logo.jpg" style= "width:20%">
					</a>
				</p>
				<p>	
					Please type the <span id="enter">OTP</span>we just sent to your registered mobile number to login.
				</p>
			</div>
			<form class="form-inline" method="post">
					<div class="form-row align-items-center">
					  <div class="col-auto">
						<label class="sr-only" for="inlineFormInputGroup">OTP</label>
						<input type="password" name="otp" class="form-control" id="inlineFormInputGroup" placeholder="otp">
					</div><br>
					  <div class="col-auto">
					  <button type="submit" name="login1" class="btn btn-success mb-2">Submit</button>
					  </div>
					</div>
			</form>
			<div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error;?></div>
	</div>
	<footer>
		<a href="https://github.com/cjindal013">Chirag Jindal</a>	<a href="https://github.com/ner-aim">Pradyumn Pottapatri</a><span id="right">  &copy Copyright 1997</span>
	</footer>
</body>
</html>