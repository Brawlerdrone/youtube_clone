<?php
include ( './header.php' ); 



?>

<h2>Upload a video</h2>
<form method = 'POST' action = 'uploadtest2.php'  enctype = 'multipart/form-data'>

<input type = 'file'  name ='file' >
<input type = 'submit'  name ='upload' value = 'UPLOAD'>

</form>
<?php
if(isset($_POST['upload'])){
	
	$name = $_FILES['file']['name'];
	$tmp = $_FILES['file']['tmp_name'];
	
	move_uploaded_file($tmp,"Assets/videos/".$name);
	
	$res = mysqli_query($con,"INSERT INTO videoss(name) VALUES('$name')") or die(mysqli_error($con));
	
	if($res == 1){
		echo "<h1>video inserted successfully</h1>";
		
	}
	
}
	

?>