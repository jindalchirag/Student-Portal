<?php
session_start();
error_reporting(0);
include('includes/config.php');
require('textlocal.class.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
//unset($_SESSION['user']);
$sql="SELECT * from admin";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowcount()>0)
{
	foreach($results as $result)
	{
		if($result->current==1)
		$_SESSION['user']=$result->UserName;
	}
}
if(isset($_POST['login']))
{
	$uname=$_SESSION['user'];
	$sql1 ="SELECT * FROM admin WHERE UserName=:uname";
	$query1= $dbh -> prepare($sql1);
	$query1-> bindParam(':uname', $uname, PDO::PARAM_STR);
	$query1-> execute();
	$row1=$query1->fetch(PDO::FETCH_OBJ);
	$a=$row1->sid;
	$x=$row1->status;
	if($x==0)
	{
		$error="You'r card is blocked. Go to admin to unlock your card .";
	}
	else
	{
	 if (!empty($_POST["password"]))
	 {
		if (!isset($_SESSION['attempts']))
		$_SESSION['attempts'] = 1;
		if (isset($_SESSION['attempts']))
		{
			if($_SESSION['attempts'] <= 3)
			{
				$password=md5($_POST['password']);
				$sql ="SELECT * FROM admin WHERE UserName=:uname and Password=:password";
				$query= $dbh -> prepare($sql);
				$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
				$query-> bindParam(':password', $password, PDO::PARAM_STR);
				$query-> execute();
				//$row=$query->fetchAll(PDO::FETCH_OBJ)
				$row=$query->fetch(PDO::FETCH_OBJ);
				if($query->rowCount() > 0)
				{
					unset($_SESSION['attempts']);
					$_SESSION['sid']=$row->sid;
					$_SESSION['alogin']=$_SESSION['user'];
					


	// $apiKey = urlencode('Your_API_Key');
	
	// // Message details
	// $numbers = array('Your_Mobile_No');
	// $sender = urlencode('TXTLCL');
	// $otp=9874456;
	// $message = rawurlencode('Your OTP is 9874456');
 
	// $numbers = implode(',', $numbers);
 
	// // Prepare data for POST request
	// $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// // Send the POST request with cURL
	// $ch = curl_init('https://api.textlocal.in/send/');
	// curl_setopt($ch, CURLOPT_POST, true);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// $response = curl_exec($ch);
	// curl_close($ch);
	
	// // Process your response here
	// echo $response;
// ******************************************************************************
					$textlocal = new Textlocal(false, false, 'Your_API_Key');

					$numbers = array('Your_Mobile_No');
					$sender = 'TXTLCL';
					$otp=mt_rand(1000,9999);
					$message = "Your OTP is :" .$otp;

					try {
					    $result = $textlocal->sendSms($numbers, $message, $sender);
					    setcookie('otp',$otp);
					    echo "sent successfully....";
					} catch (Exception $e) {
					    die('Error: ' . $e->getMessage());
					}
					echo "<script type='text/javascript'> document.location = 'verify.php'; </script>";
				}
				else
	            {
	            	$error="Please fill correct password.";
	            	$_SESSION['attempts']+=1;
	            	if($_SESSION['attempts'] ==4)
	            	{
	            		$error="You've failed too many times ! You'r card is blocked . Go to admin to unlock your card .";
	            		unset($_SESSION['attempts']);
	            		$access=0;
						$sql="update admin set status=:access where sid=$a";
						$query = $dbh->prepare($sql);
						$query->bindParam(':access',$access,PDO::PARAM_STR);
						$query->execute();
	            	}
	            }
        	}
		}
	 }
 	 else
 	 {
 		$error="Please fill password first.";
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
					Please scan your <span id="enter">identity card</span> to login.<br>The username will be entered automatically.
				</p>
			</div>
			<form class="form-inline" method="post">
					<div class="form-row align-items-center">
					  <div class="col-auto">
						<label class="sr-only" for="inlineFormInput">Userame</label>
						<input type="password" name="username" class="form-control" id="inlineFormInput" placeholder="Username" value="<?php echo $_SESSION['user'];?>" disabled="">
					  </div><br>
					  <div class="col-auto">
						<label class="sr-only" for="inlineFormInputGroup">Password</label>
						<input type="password" name="password" class="form-control" id="inlineFormInputGroup" placeholder="Password">
					</div><br>
					  <div class="col-auto">
					  	<!-- <a href="dashboard/dashboard.html"> -->
					  <button type="submit" name="login" class="btn btn-success mb-2">Submit</button>
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
