<?php
	include ( './header.php' );
	$error = "";
	if (@$_POST ['register']){
		$firstname = strip_tags($_POST ['firstname']);
		$lastname = strip_tags($_POST ['lastname']);
		$username = strip_tags($_POST ['username']);
		$email = strip_tags($_POST ['email']);
		$password1 = strip_tags($_POST ['password']);
		$password2 = strip_tags($_POST ['passwordrepeat']);
		
		
		/*if ($firstname == ""){
			$error = "empty field/ fields.";
		}
		else if ($lastname == ""){
			$error = "empty field/ field.";
		}
		else if ($username == ""){
			$error = "empty field/ fields.";
		}
		else if ($email == ""){
			$error = "empty field/ fields.";
		}
		else if ($password1 == ""){
			$error = "empty field/ fields.";
		}
		else if ($password2 == ""){
			$error = "empty field/ fields.";
		}*/
		
		$check_username = mysqli_query($con,"SELECT username FROM users where username = '$username'");
		$numrows_username = mysqli_num_rows($check_username);
		
		if($numrows_username != 0 ){
			$error = 'That username already excists';
			
		}else {
			$check_email = mysqli_query($con,"SELECT email FROM users where email = '$email'");
				$numrows_email = mysqli_num_rows($check_username);
		
			if($numrows_email != 0 ){
			$error = 'That email already excists';
			
			}
			else{
				$register = mysqli_query($con, "INSERT INTO users VALUES('','$firstname','$lastname','$username','$email','$password1','','')")or die(mysqli_error($con));
				die("registerd sucessfully");	
				}
			
		}
			
			
			
		
	}
?>
<br /><br />
<div class = "forms">
<form action ='join.php' method='POST'>


<input type= 'text' name='firstname' value='firstname...' onclick='value=""' required><p />
<br /><br />
<input type= 'text' name='lastname' value='lastname...' onclick='value=""' required><p />
<br /><br />
<input type= 'text' name='username' value='Username...' onclick='value=""' required><p />
<br /><br />
<input type= 'text' name='email' value='email...' onclick='value=""' required><p />
<br /><br />
<input type= 'text' name='password' value='password...' onclick='value=""' required><p />
<br /><br />
<input type= 'text' name='passwordrepeat' value='pasword...' onclick='value=""' required><p />
<br /><br />
<input type= 'submit' name= 'register' class = "register" value = 'Create your account' />
<br /><br  />


</form>
</div>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/>


<div class= "Login">
<p>Already have an account. <a href= "login_test.php">Signin<a/>.<p>
</div>
<?php
/*else{
			$salt1 = "francis";
			$salt1 = md5($salt1);
			$salt2 = "cookie";
			$salt2 = md5($salt2);
			$salt3 = "php";
			$salt3 = md5($salt3);
			
			$password1 = $salt1.$password1.$salt3;
			$password1 = md5($password1.$salt2);
			$password2 = $salt1.$password2.$salt3;
			$password2 = md5($password2.$salt2);
			
			if($password1 != $password2){
				$error = 'The passwords don\'t match'
				
			}*/
?>