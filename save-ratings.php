<?php
include('./header.php');

	$video_id = $_POST["video_id"];
	$file_name = $_POST["file_name"];
	$rating = $_POST["rating"];

	//$con=mysqli_connect("localhost","root","","login");

	mysqli_query($con,"INSERT INTO ratings (video_id, name, rating) VALUES ('$video_id','$file_name','$rating')");
	//or die(mysqli_error($con);

	//echo "Saved";


?>