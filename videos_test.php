<?php
include ( './header.php' ); 



$res = mysqli_query($con,"SELECT * from videoss ORDER BY  total_rating DESC" );

echo "<h1>MyVideos<h1>";

while($row = mysqli_fetch_assoc($res)) {
	$id = $row['id'];
	$name = $row['name'];
	
	
	echo "<h4><a href='test_watch.php?id=$id'>".$name."</a></h4>";
	
	
}

?>
