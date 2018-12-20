
<?php
	include("tourist_project_connection.php");
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("Location: login.php");
	}
	$sql = "select * from travel_cost;";
	$result= mysqli_query($con,$sql);
	
	
	?>


<!DOCTYPE html>
<html>
<head>
<title>VIEW Travel cost form</title>
<link rel="stylesheet" type="text/css" href="Site_design0.css">
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
				<li><a href="user_page.php">Previous</a></li>
				</ul>
			</div>
		
		
		</div>
		
		
		
	</div>
	<div class="welcome_page">
	<h2>Travel cost table </h2>
	<p>Welcome user!!!. You can see about all type of travel cost information here.</p>
	</div>
	<div class="table_options">
		
		<table>
		
		<tr>
			<td style="background-color:#FFE4C4">Travel Name</td>
			
			<td style="background-color:#FFE4C4">COST</td>
			<td style="background-color:#FFE4C4">Travel Class</td>
		</tr>
		<?php
			while($assoc = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?php echo($assoc['t_name'])?></td>
			<td><?php echo($assoc['cost'])?></td>
			
			<td><?php 
			if($assoc['class']==0)
				{
					echo("A class");
				} 
				else if($assoc['class']==1) {
					echo("B class");
				}
				else{
					echo("C class");
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