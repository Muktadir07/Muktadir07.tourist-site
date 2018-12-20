
<!DOCTYPE html>
<?php
	include("tourist_project_connection.php");
	session_start();

	$error = array();
	$success = array();
	$assoc = $_SESSION['assoc'];
	if(!isset($_SESSION['assoc'])){
		header('Location: login.php');
	}
	if($_POST)
	{

		if(empty($_POST['u_password']))
        {
            $errors['2_password'] = "Please enter your password";
        }
		if(empty($_POST['new_password']))
        {
            $errors['new_password'] = "Enter new password";
        }
		if(empty($_POST['new_password2']))
        {
            $errors['new_password2'] = "Confirm new password";
        }
		
		if(($_POST['new_password']) != ($_POST['new_password2']))
		{
			$errors['password3']="Password doesn't match";
		}
		if( ($_POST['u_password'])!= ($assoc['password']))
		{
			$errors['password4']="Current Password doesn't match";
		}
		if(count($error)==0){
			$newPass = $_POST['new_password2'];
			$id = $assoc['user_id'];
			$sql = "Update user_table set password='$newPass' where user_id ='$id';";
			if(mysqli_query($con,$sql)){
				$success['done'] = "Password Changed Successfully";
				$assoc['password'] = $newPass;
				$_SESSION['assoc']=$assoc;
			} else {
				echo(mysqli_error($con));
			}
		}
	}
	
	
	?>



<html>
<head>
<title>Change_password form</title>
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
	<h2>Change Password </h2>
	<p>You can change your password in this page.</p>
	</div>
			<div class="register_options">
		
			
			<form method="post" action="<?php echo($_SERVER['PHP_SELF'])?>">
			
			    
				  <div class="label2_box">
				  <input type="password" name="u_password"   placeholder="Enter your current password">
				  <p><?php if(isset($errors['2_password'])) echo $errors['2_password']; ?></p>
				  <p><?php if(isset($errors['password4'])) echo $errors['password4']; ?></p>
				  
				  <input type="password" name="new_password"   placeholder="Enter New password">
				  <p><?php if(isset($errors['new_password'])) echo $errors['new_password']; ?></p>
				  
				  <input type="password" name="new_password2"  placeholder="Confirm New password">
				  <p><?php if(isset($errors['new_password2'])) echo $errors['new_password2']; ?></p>
				  <p><?php if(isset($errors['password3'])) echo $errors['password3']; ?></p>
				  
				  
				 
				<div class="sign_in_button">
				<input type="submit" name="submit" value="Change">
				
				</div>
				<p style="color: green"><?php
			if(isset($success['done'])){
				echo($success['done']);
			}
			?></p>
				</div>
				
	
				
		</form>
		
		
		</div>
		<div class="Footer">
		<footer>Copyright &copy; East-West University, 2016. All Rights Reserved</footer>
		</div>
		
	
</body>
</html>