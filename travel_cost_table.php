<?php include "tourist_project_connection.php" ?>
<?php
	
	$error = array();
	$success = "";
	if($_POST){
		if(empty($_POST["travel_name"])){
			$error['travel_name']="Travel name can not be empty";
			
		}
		if(empty($_POST['t_cost'])){
			$error['t_cost']="Cost can not be empty";
			
		}
		
		if(count($error)==0){
			if($_POST['u_type']=='a'){
				$utype = 0;
			} else if($_POST['u_type']=='B') {
				$utype = 1;
			}
			else{
				$utype=2;
			}
			$tr_name = $_POST['travel_name'];
			
			$travel_cost = $_POST['t_cost'];
			
			$sql = "insert into travel_cost(t_name,class,cost) values ('$tr_name','$utype','$travel_cost');";
			echo($utype);
			$result = mysqli_query($con,$sql);
			if($result){
				
				header("Location: successfu.php");
				
			} else {
				echo(mysqli_error($con));
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>COst form</title>
<link rel="stylesheet" type="text/css" href="Site_design1.css">
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
				<li><a class="first" href="login.php">Login</a></li>
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
	<h2>Travel table Page !!!</h2>
	<p> You can insert travel transportation in here.</p>
	</div>
	
	<div class="register_opt">
	
	<form action="travel_cost_table.php" method="post">
		
			<div class="lab_box">
			
			<input type="text" placeholder="Enter transport name " value="<?php if(isset($_POST['travel_name'])){ echo($_POST['travel_name']);}?>" name="travel_name">
			<p ><?php if( isset($error['travel_name']) ){ echo($error['travel_name']);} ?> </p>
			
			<input type="number" name="t_cost" placeholder="Enter travel cost ">
			<p><?php if( isset($error['t_cost']) ){ echo($error['t_cost']);} ?> </p>
			

			<h3>Class Type</h3>
			<select name="u_type">
				<option value="a" selected>A</option>
				<option value="b" >B</option>
				<option value="c" >C</option>
			</select>
			<div class="sign_button">
			<input type="submit" name="submit" value="insert">
			
			</div>
		</div>
		
	</form>
	</div>
	<p style="color: red"><?php echo($success)?></p>
	
	<div class="footer">
	<footer>Copyright &copy; East-West University, 2016. All Rights Reserved</footer>
	</div>
</body>
</html>