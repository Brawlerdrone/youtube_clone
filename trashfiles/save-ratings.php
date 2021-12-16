<?php


$video_id = $_POST["video_id"];
$rating = $_POST["rating"];

$con = mysqli_connect("localhost","root","", "login");

mysqli_connect($con,"INSERT INTO ratings(videoid, rating) VALUES('$videoid','$rating')") or die(mysqli_error($con));

echo "Saved";


?>