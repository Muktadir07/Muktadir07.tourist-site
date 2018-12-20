
<?php
	include("tourist_project_connection.php");
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("Location: login.php");
	}
	$sql = "select * from user_table;";
	$result= mysqli_query($con,$sql);
	
	
	?>


<!DOCTYPE html>
<html>
<head>
<title>VIEW_USER form</title>
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
				<li><a href="user_page.php">Prev</a></li>
				</ul>
			</div>
		
		
		</div>
		
		
		
	</div>
	<div class="welcome_page">
	<h2>User Table </h2>
	<p>Welcome Admin!!!. You can see about all type of user information in a table here.</p>
	</div>
	<div class="table_options">
		
		<table>
		
		<tr>
			<td style="background-color:#FFE4C4">ID</td>
			<td style="background-color:#FFE4C4">NAME</td>
			<td style="background-color:#FFE4C4">EMAIL</td>
			<td style="background-color:#FFE4C4">USER TYPE</td>
		</tr>
		<?php
			while($assoc = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?php echo($assoc['user_id'])?></td>
			<td><?php echo($assoc['name'])?></td>
			<td><?php echo($assoc['email'])?></td>
			<td><?php 
			if($assoc['is_admin']==1)
				{
					echo("Admin");
				} else {
					echo("User");
				}
				?></td>
		</tr>
		<?php
			}
		?>
		</table>
		
		
	</div>
		<div class="Footer">
		<footer>Copyright &copy; East-West University, 2016. All Rights Reserved</footer>
		</div>
		
	
</body>
</html>