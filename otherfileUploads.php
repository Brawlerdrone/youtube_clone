<?php
include ( './header.php' ); 

if(isset ($_FILES ['file'])){
	
	$name = $_FILES['file']['name'];
	$tmp = $_FILES['file']['tmp_name'];
	
	move_uploaded_file($tmp,"Assets/Other_Files/".$name);
	
	$privacy = @$_POST['privacy'];
	
	$res = mysqli_query($con,"INSERT INTO files(name,privacy,uploader) 
	VALUES('$name','$privacy','$user')") or die(mysqli_error($con));
	
	if($res == 1){
		echo "<h1>file uploaded sucessfully</h1>";
		header("Location: user.php");
		
	}
	
	
}

?>
<br/><br/>
<form method = 'POST' action = 'otherfileuploads.php'  enctype = 'multipart/form-data'>


Privacy : 
<input type ='radio' name = 'privacy' value = 'IT'/> Computer_Science&nbsp; &nbsp;
<input type ='radio' name = 'privacy' value = 'Engineering'/>Engineering<br/><br/>


<input type = 'file'  name ='file' >
<input type = 'submit'  name ='upload' value = 'UPLOAD'>

</form>