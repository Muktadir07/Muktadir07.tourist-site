<?php include "tourist_project_connection.php" ?>
<?php
	
	$error = array();
	$success = "";
	if($_POST){
		if(empty($_POST["id"])){
			$error['id']="*id can not be empty";
			
		}
		if(empty($_POST['password'])){
			$error['password']="*password field can not be empty";
			
		}
		if(empty($_POST['conpassword'])){
			$error['conpassword']="*confirm password field can not be empty";
			
		}
		if(empty($_POST['name'])){
			$error['name']="*name field can not be empty";
			
		}
		if(empty($_POST['email'])){
			$error['email']="*email field can not be empty";
			
		}
		if(isset($_POST['password']) && isset($_POST['conpassword']) ){
			if($_POST['password'] != $_POST['conpassword']){
				$error['conpassword']="*Both Field must be same";
				$error['password']="*Both Field must be same";
			}
		}
		if(count($error)==0){
			if($_POST['u_type']=='user'){
				$utype = 0;
			} else {
				$utype = 1;
			}
			$user_id = $_POST['id'];
			$name = $_POST['name'];
			$password = $_POST['password'];
			$email =$_POST['email'];
			$sql = "insert into user_table(user_id,password,name,email,is_admin) values ('$user_id','$password','$name','$email','$utype');";
			echo($utype);
			$result = mysqli_query($con,$sql);
			if($result){
				
				header("Location: successful.php");
				
			} else {
				echo(mysqli_error($con));
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>REGISTER form</title>
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
				<li><a href="#about">About</a></li>
				</ul>
			</div>
		
		
		</div>
		
		
		
	</div>
	<div class="welcome_page">
	<h2>Register Page !!!</h2>
	<p> You can login to visit your profile and change your ID or password.</p>
	</div>
	
	<div class="register_opt">
	
	<form action="register.php" method="post">
		
			<div class="lab_box">
			
			<input type="text" placeholder="Enter User ID" value="<?php if(isset($_POST['id'])){ echo($_POST['id']);}?>" name="id">
			<p ><?php if( isset($error['id']) ){ echo($error['id']);} ?> </p>
			
			<input type="password" name="password" placeholder="Enter password">
			<p><?php if( isset($error['password']) ){ echo($error['password']);} ?> </p>
			
			<input type="password" name="conpassword" placeholder="Confirm password">
			<p><?php if( isset($error['conpassword']) ){ echo($error['conpassword']);} ?> </p>
			
			<input type="text" placeholder="Enter user name" value="<?php if(isset($_POST['name'])){ echo($_POST['name']);}?>" name="name">
			<p><?php if( isset($error['name']) ){ echo($error['name']);} ?> </p>
			
			<input type="email"placeholder="Enter email" value="<?php if(isset($_POST['email'])){ echo($_POST['email']);}?>" name="email">
			<p ><?php if( isset($error['email']) ){ echo($error['email']);} ?> </p>
			<h3>User Type</h3>
			<select name="u_type">
				<option value="user" selected>User</option>
				<option value="admin" >Admin</option>
			</select>
			<div class="sign_button">
			<input type="submit" name="submit" value="Register">
			
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