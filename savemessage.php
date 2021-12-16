<?php
include('./header.php');
$message = $_GET['message'];

	if(isset($_POST['submit'])){
		$message = $_POST['message'];
		
		$insert_message = mysqli_query($con,"INSERT INTO messages(sent_by,sent_to,message) 
		VALUES('','$user','$Uploader','$message')")or die(mysqli_error($con));
		
	}

?>