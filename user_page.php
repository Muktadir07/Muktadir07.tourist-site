<?php 
	include "tourist_project_connection.php";
	session_start();
	$userId="";
	if(!isset($_COOKIE['user_id']) && !isset($_SESSION['user_id'])){
		header("Location : login.php");
	} else {
		if(isset($_SESSION['user_id'])){
			$userId =$_SESSION['user_id'];
		}
		if(isset($_COOKIE['user_id'])){
			$userId =$_COOKIE['user_id'];
		}
	}
	

		
	
	$sql = "select * from user_table where user_id='$userId';";
	$result = mysqli_query($con,$sql);
	$assoc = mysqli_fetch_assoc($result);
	$_SESSION['assoc'] = $assoc;
	
?>
<!DOCTYPE html>
<html>
<head>
<title>LOGIN form</title>
<link rel="stylesheet" type="text/css" href="Site_design.css">
<link href='https://fonts.googleapis.com/css?family=Lily Script One'rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Great Vibes' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet'>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	<div class="top_page">
		<div class="site_name">
		<h1>Tourist site</h1>
			<div class="register_to_login">
				<ul>
				<li><a class="first" href="logout.php">Log out</a></li>
				<li><a href="register.php">Register</a></li>
				</ul>
			</div>
			<div class="top_navigation_bar">
				<ul>
				<li><a class="active" href="index01.php">Home</a></li>
				<li><a href="#news">News</a></li>
				<li><a href="#contact">Contact</a></li>
				<li><a href="#about">About</a></li>
				</ul>
			</div>
		
		
		</div>
		
		
		
	</div>
	<div class="welcome_page">
	<h2>Hello "<?php echo($assoc['name']);?> "</h2>
	<p> Here you can take a look at your profile. You can also change, update or delete from here.</p>
	
	</div>
		<div class="user_options">
			<div class="menubar">
			<a href="change_password.php">Change password</a>
			</div>
			<div class="menubar">
			<a href="transport_table.php">Transports</a>
			</div>
			<div class="menubar">
			<a href="update.html">Show chart</a>
			</div>
			
			
			<?php
			$showDivFlag=false;
			if($assoc['is_admin']==1){
				
			$showDivFlag=true;
			}
			
			?>
			
			<div class="menubar"<?php if ($showDivFlag===false){?>style="display:none"<?php } ?>>
			<a href="travel_cost_table.php">Insert Transport</a>
			</div>
			<div class="menubar"<?php if ($showDivFlag===false){?>style="display:none"<?php } ?>>
			<a href="view_users.php">View User</a>
			</div>
			
		</div>
	<div class="Footer">
	<footer>Copyright &copy; East-West University, 2016. All Rights Reserved</footer>
	</div>
	
</body>
</html>