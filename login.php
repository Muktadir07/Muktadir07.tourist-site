
<?php
	include('tourist_project_connection.php');
	session_start();

	
	if(isset($_SESSION['user_id']))
	{
		header("Location:user_page.php");
	}
	if($_POST){
		
		$error = array();
		if(empty($_POST['id']))
        {
            $errors['id'] = "Please valid User Id";
        }
		if(empty($_POST['password']))
        {
            $errors['password'] = "Please enter valid password";
        }
		if(count($error)==0){
			$userid = $_POST['id'];
			$password = $_POST['password'];
			$sql = "select * from user_table where user_id = '$userid' and password='$password';";
			$result = mysqli_query($con,$sql);
			$numrow = mysqli_num_rows($result);
			if( $numrow >0){
			if(isset($_POST['remember_me'])){
					setcookie("user_id",$_POST['user_id'],time()+86400);
				}
				$_SESSION['user_id']= $userid;
				header("Location: user_page.php");
			} else {
				$error['no_user']="true";
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
	<h2>Login Page !!!</h2>
	<p> You can login to visit your profile and change your ID or password.</p>
	<p style="color:red; text-align:center;" ><marquee width="50%">Please register an account if you don't have</marquee></p><br>
	</div>
			<div class="login_options">
		
			
			<form method="post" action="<?php echo($_SERVER['PHP_SELF'])?>">
			
			    
				  <div class="label_box">
				  <input type="text" name="id"  placeholder="Enter User ID"/>
				  <p><?php if(isset($errors['id'])) echo $errors['id']; ?><p>
				  
				  
				  <input type="password" name="password"   placeholder="Enter your password"/>
				  <p><?php if(isset($errors['password'])) echo $errors['password']; ?></p>
			
                
                
				<div class="remember_opt"> 
				 
                <input type="checkbox" name="remember_me"  /><p style="font-weight: bold; color: black;">Remember me</p>
                
				</div>
				<div class="sign_in_button">
				<input type="submit" name="submit" value="Sigh in"/>
				</div>
				
				<!--
				<p>
                  <input type="submit" name="send" value="Login" id="inputid"  />
				  <a href="Register.html">Register</a>
                </p>-->
				
		</form>
		
		</div>
		
	<p style="color: red"><?php if(isset($error['no_user'])){echo("User ID or password doesn't match");}?></p>
	</div>
	<div class="Footer">
	<footer>Copyright &copy; East-West University, 2016. All Rights Reserved</footer>
	</div>
	
</body>
</html>