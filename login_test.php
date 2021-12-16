<?php
include ( './header.php' );



if (isset($_POST['username'])&& ($_POST['password'])){
	$username =  strip_tags($_POST['username']);
	$password= strip_tags($_POST['password']);
		echo $username;
	$check_username = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
	$numrows = mysqli_num_rows($check_username);
	if ($numrows !=1) {
		echo 'That user doesn\'t exist';
	}
	else {
		$check_password = mysqli_query($con,"SELECT password FROM users WHERE password='$password' && username='$username'");
		while($row = mysqli_fetch_assoc($check_password)){
			$password_db = $row ['password'];
			
			if($password_db == $password){
				 $_SESSION['username'] = $username;
				header("Location: user.php");
				
				
				
			}
			
		}
		
		
	}
	
	
}
?>
<br /><br /><br />

<div class = "center">
<form action='login_test.php' method='POST'>
<div class = 'container2'>
	<input type= 'text' name='username' value='Username...' onclick='value=""' required><p />
	<input type= 'text' name='password' value='password...' onclick='value=""' required><p />
	<input type= 'submit' class = "register" name='submit' value='Login to my account'>
</div>


</form>	
</div>