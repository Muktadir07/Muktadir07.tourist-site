<?php include "tourist_project_connection.php" ?>
<?php
	$error = array();
	
    if($_POST)
	{

        if(empty($_POST['t_name']))
        {
            $errors['t_name'] = "Please enter transport name";
        }
		if(empty($_POST['cost']))
        {
            $errors['cost'] = "Cost can not be empty";
        }
		
		
		if(count($error)==0){
			if($_POST['class_type']=='A_class'){
				$c_type = 0;
		} 
			else{
				$c_type =1;
			}
			
			$t_Name = $_POST['t_name'];
			$cost = $_POST['cost'];
			$sql = "insert into travel_cost(t_name,class,cost) values ('$t_Name','$c_type','$cost');";
			echo($c_type);
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
<title>REGISTRATION form</title>
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
	<h2>Transportation !!!</h2>
	<p> Transport cost is maintained here.</p>
	</div>
			<div class="register_options">
		
			
			<form action="register.php" method="post" name="insertform">
			
			    
				  <div class="label2_box">
				  <input type="text" placeholder="Transfer Name" name="t_name" />
				  <p><?php if(isset($errors['t_name'])) echo $errors['t_name']; ?></p>
				  
				 <input type="number" min="1" max="50000" placeholder="Cost" name="cost">
				  <p><?php if(isset($errors['cost'])) echo $errors['cost']; ?></p> 
				  
				  <h3>Class Type</h3>
				<select name="class_type">
					<option value="A_class" selected>A class</option>
					<option value="B_class" >B class</option>
					<option value="C_class" >C class</option>
				</select>
				
                
				<div class="sign_in_button">
				<input type="submit" name="submit" value="Insert"/>
				
				</div>
				</div>
				
				<!--
				<p>
                  <input type="submit" name="send" value="Login" id="inputid"  />
				  <a href="Register.html">Register</a>
                </p>-->
				
		</form>
		
		</div>
		<div class="Footer">
		<footer>Copyright &copy; East-West University, 2016. All Rights Reserved</footer>
		</div>
		
	
</body>
</html>