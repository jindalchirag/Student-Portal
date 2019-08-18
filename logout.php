<?php
session_start();
error_reporting(0);
include('includes/config.php');
    $curr=0;
    $a=$_SESSION['sid'];
    $sql="update admin set current=:curr where sid=$a";
    $query = $dbh->prepare($sql);
    $query->bindParam(':curr',$curr,PDO::PARAM_STR);
    $query->execute();
    unset($_SESSION['user']);
    unset($_SESSION['alogin']);
?>

<!DOCTYPE html>
<html>
<head>
  	<!-- <link rel="stylesheet" type="text/css" href="css/auroral.css"> -->
	<title>Logout</title>
	<link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
</head>
<body>
		<div class="container">
			<!-- <div class="auroral-northern">
				<div class="auroral-stars"> -->
					<center><img src="rocket.png" style="width: 30%"></center>
					<center style = "font-family: 'Blinker', sans-serif; font-size: 30px ">Thank you visiting the IIITM Student Portal. If you have any queries please contact the administrator.<br><br>
					Click <a href="login.php">here</a> to login again.</center>
				<!-- </div>
			</div> -->
		</div>
</body>
</html>