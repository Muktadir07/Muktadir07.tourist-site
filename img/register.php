<?php include "tourist_project_connection.php" ?>
<?php
	
	$error = array();
	$success = "";
	if($_POST){
		if(empty($_POST["id"])){
			$error['id']="*id can not be empty";
			echo('bug');
		}
		if(empty($_POST['password'])){
			$error['password']="*password field can not be empty";
			echo('bug');
		}
		if(empty($_POST['conpassword'])){
			$error['conpassword']="*confirm password field can not be empty";
			echo('bug');
		}
		if(empty($_POST['name'])){
			$error['name']="*name field can not be empty";
			echo('bug');
		}
		if(empty($_POST['email'])){
			$error['email']="*email field can not be empty";
			echo('bug');
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
			$sql = "insert into user(user_id,password,name,email,is_admin) values ('$user_id','$password','$name','$email','$utype');";
			echo($utype);
			$result = mysqli_query($con,$sql);
			if($result){
				
				header("Location: successfullyreg.php");
				
			} else {
				echo(mysqli_error($con));
			}
		}
	}
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
	
	<div class="login_options">
	
	<form action="register.php" method="post">
		
			<div class="label_box">
			
			<input type="text" placeholder="Enter User ID" value="<?php if(isset($_POST['id'])){ echo($_POST['id']);}?>" name="id">
			<p ><?php if( isset($error['id']) ){ echo($error['id']);} ?> </p>
			
			<input type="password" name="password"><p style="font-weight: bold; color: red;"><?php if( isset($error['password']) ){ echo($error['password']);} ?> </p><br>
			
			<input type="password" name="conpassword"><p style="font-weight: bold; color: red;"><?php if( isset($error['conpassword']) ){ echo($error['conpassword']);} ?> </p>
			
			<input type="text" value="<?php if(isset($_POST['name'])){ echo($_POST['name']);}?>" name="name"><p style="font-weight: bold; color: red;"><?php if( isset($error['name']) ){ echo($error['name']);} ?> </p><br>
			
			<input type="email" value="<?php if(isset($_POST['email'])){ echo($_POST['email']);}?>" name="email"><p style="font-weight: bold; color: red;"><?php if( isset($error['email']) ){ echo($error['email']);} ?> </p><br>
			<h3>User Type</h3>
			<select name="u_type">
				<option value="user" selected>User</option>
				<option value="admin" >Admin</option>
			</select>
			<div class="sign_in_button">
			<input type="submit" name="submit" value="Register">
			
			</div>
			</div>
		
	</form>
	</div>
	<p style="color: red"><?php echo($success)?></p>
</body>
</html>