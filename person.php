<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: logout.php"); 
    }
    else{

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/iiitm.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Student Portal</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body style="background-color: #5d4257; background-image: linear-gradient(315deg, #5d4257 0%, #a5c7b7 74%);">

<div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Student Portal
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="acad.html">
                        <i class="pe-7s-note2"></i>
                        <p>Academics</p>
                    </a>
                </li>
                <li>
                    <a href="library.html">
                        <i class="pe-7s-notebook"></i>
                        <p>Library</p>
                    </a>
                </li>
                <li>
                    <a href="hostel.html">
                        <i class="pe-7s-home"></i>
                        <p>Hostel</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Main Gate</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				    
            </ul>
    	</div>
    </div>

    <div class="main-panel" >
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="user.php">Student Details</a>
                    <a class="navbar-brand" href="person.php">Personal Details</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <!-- <a href="hostelprofile.html" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a> -->
                        </li>
                        
                        <!-- <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li> -->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li> -->
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li> -->
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

<?php

	$sid=$_SESSION['sid'];
	//echo htmlentities($sid);
	$query="SELECT * from personal_details where sid=$sid";
	$stmt = $dbh->prepare($query);
  //  $stmt-> bindParam(':uname', $uname, PDO::PARAM_STR);
    $stmt-> execute();
	$rrow=$stmt->fetch(PDO::FETCH_OBJ);
	if($stmt->rowCount() > 0)
	{
?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <!-- <div class="header">
                                <h4 class="title">Student Details</h4>
                            </div> -->
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <!-- <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Batch</label>
                                                <input type="text" class="form-control" disabled placeholder="Batch" value="B.Tech CSE">
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Father's Name</label>
                                                <input type="text" class="form-control" placeholder="Father's Name" value="<?php echo htmlentities($rrow->fname);?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mother's Name</label>
                                                <input type="text" class="form-control" placeholder="Mother's Name" value="<?php echo htmlentities($rrow->mname);?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Mobile No.</label>
                                                <input type="number" class="form-control" placeholder="Mobile No." value="8919018797" disabled>
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Personal E-mail</label>
                                                <input type="email" class="form-control" placeholder="pemail" value="<?php echo htmlentities($rrow->email);?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Aadhar Card No.</label>
                                                <input type="text" class="form-control" placeholder="Aadhar" value="<?php echo htmlentities($rrow->aadhar);?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Blood Group</label>
                                                <input type="text" class="form-control" placeholder="Blood Group" value="<?php echo htmlentities($rrow->blood);?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group"> 
                                                <label>Caste</label>
                                                <input type="text" class="form-control" placeholder="Caste" value="<?php echo htmlentities($rrow->caste);?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group"> 
                                                <label>Subcaste</label>
                                                <input type="text" class="form-control" placeholder="Subcaste" value="<?php echo htmlentities($rrow->subcaste);?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>PAN Card No.</label>
                                                <input type="text" class="form-control" placeholder="PAN" value="<?php echo htmlentities($rrow->pancard);?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                    <label>Bank Name</label>
                                                    <input type="text" class="form-control" placeholder="Bank Name" value="<?php echo htmlentities($rrow->bank_name);?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Branch Name</label>
                                                    <input type="text" class="form-control" placeholder="Branch Name" value="<?php echo htmlentities($rrow->branch_name);?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Account No.</label>
                                                    <input type="number" class="form-control" placeholder="Account No." value="<?php echo htmlentities($rrow->account_number);?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>IFSC CODE</label>
                                                    <input type="text" class="form-control" placeholder="IFCS Code" value="<?php echo htmlentities($rrow->ifsc);?>" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                    <label>Guardian Name (if any)</label>
                                                    <input type="text" class="form-control" placeholder="Ex. Somesh Dahiya" value="<?php echo htmlentities($rrow->guardian);?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Place of stay (if any)</label>
                                                    <input type="text" class="form-control" placeholder="Ex. Gwalior" value="<?php echo htmlentities($rrow->place);?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Mobile No. (if any) </label>
                                                    <input type="number" class="form-control" placeholder="Ex. 751XXXXX11" value="<?php echo htmlentities($rrow->number);?>" disabled>
                                                </div>
                                            </div>
                                    </div>

                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button> -->
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php

	$sid=$_SESSION['sid'];
	//echo htmlentities($sid);
	$query="SELECT image,rollno from user_details where sid=$sid";
	$stmt = $dbh->prepare($query);
  //  $stmt-> bindParam(':uname', $uname, PDO::PARAM_STR);
    $stmt-> execute();
	$rrow=$stmt->fetch(PDO::FETCH_OBJ);
	?>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://www.iiitm.ac.in/images/about-iiitm.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                	<?php $a=$rrow->image;
                                    $x=strval($a);
                                    $z="assets/img/faces/";
                                    $y=$z.$x;
                                    echo '<img class="avatar border-gray" alt="..."/ src="'.$z.$x.'">';?>
                                    <!-- <img class="avatar border-gray" src="assets/img/faces/face-8.jpg" alt="..."/> -->

                                      <h4 class="title"><?php echo htmlentities($rrow->name);?><br>
                                         <small><?php echo htmlentities($rrow->rollno);?></small><br>
                                         <!-- <small>bcs_201722</small> -->
                                      </h4>
                                </div>
                                <!-- <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p> -->
                            </div>
                            <!-- <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

<?php } ?>
       <!--  <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer> -->

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
<?php } ?>