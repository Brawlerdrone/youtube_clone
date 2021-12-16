<?php
include('./header.php');
$videoid = $_GET['videoid'];

$check  = mysqli_query($con,"SELECT * FROM videos WHERE video_id = '$videoid' ");

if(mysqli_num_rows($check) == 1){
	while($row = mysqli_fetch_assoc($check))
	{
		$id = $row['id'];
		$video_title = $row['vid_title'];
		$video_description = $row['vid_description'];
		$video_keywords = $row['video_keys'];
		$uploader = $row['uploader'];
		$privacy = $row['privacy'];
		$date_uploaded = $row['date'];
		$views = $row['views'];
		$video_id = $row['video_id'];
		$videosrc = $row['file_location'];
		$newViews = $views + 1;
		$updateViews = mysqli_query($con,"UPDATE videos SET views ='$newViews' WHERE video_id='$videoid' " ) or die(mysqli_error($con));
		
		}
	
	
	}
	

	?>
<div style = "float: left">
<video width = "853" height = "320" controls>
	<source src="<?php echo $videosrc; ?>" type ="video/mp4">
Your browser doesn't support the HTML5 video tag.
</video>
<?php
$check_l= mysqli_query($con, "SELECT * FROM likendisklikes WHERE videoid='$videoid' AND username ='$user'");

if(mysqli_num_rows($check)){
	while($rating = mysqli_fetch_assoc($check_l)){
		$videoid_l = $rating['videoid'];
		$type  = $rating['type'];
		$user_l = $rating['username'];
 		
		$d = "";
		$d2 = "";
	}
	if($type == 'like'){
		
		$d = 'disabled';
	}else {
		$d2 = 'disabled';
		
	}
	
	/*if(isset($_POST['like'])){
		mysqli_query($con, "UPDATE likendisklikes SET  type= 'likes' WHERE videoid='$videoid' AND username = '$user'");
		
		header("Location: watch.php?videoid=$videoid");
		
		}
		if(isset($_POST['dislike'])){
		mysqli_query($con, "UPDATE likendisklikes SET  type= 'likes' WHERE videoid='$videoid' AND username = '$user'");
		
		header("Location: watch.php?videoid=$videoid");
		
		}*/
	
	
}else{
	$d ="";
	$d2 ="";
	
}

?>

<?php
/*if(isset($_POST['like'])){
		mysqli_query($con, "UPDATE likendisklikes SET type = 'like' WHERE videoid= '$videoid' AND username ='$user'");
		
		header("Location: watch.php?videoid=$videoid");
		
		}
		if(isset($_POST['dislike'])){
		mysqli_query($con, "UPDATE likendisklikes SET type = 'dislike' WHERE videoid= '$videoid' AND username ='$user'");
		
		header("Location: watch.php?videoid=$videoid");
		
		}*/
	if(isset($_POST['like'])){
		mysqli_query($con, "INSERT INTO likendisklikes VALUES ('','$videoid','like','$user')");
		
		header("Location: watch.php?videoid=$videoid");
		
		}
		if(isset($_POST['dislike'])){
		mysqli_query($con, "INSERT INTO likendisklikes VALUES ('','$videoid','dislike','$user')");
		
		header("Location: watch.php?videoid=$videoid");
		
		}

	$total_width = 180;
	$green = 0;
	$red = 0;
	
	$get_likes = mysqli_query($con,"SELECT * FROM likendisklikes WHERE videoid ='$videoid' AND type= 'like'");
	$num_of_likes = mysqli_num_rows($get_likes);
	
	
	$get_dislikes = mysqli_query($con,"SELECT * FROM likendisklikes WHERE videoid ='$videoid' AND type='dislike'");
	$num_of_dislikes = mysqli_num_rows($get_dislikes);
	
	$total_num = $num_of_likes + $num_of_dislikes;
	
	$width_of_one = $total_width / $total_num;
	
	$green = $width_of_one * $num_of_likes;
	$red = $width_of_one * $num_of_dislikes;
	
	
	
	
		
?>





<div style = "float: left; width: 100%; margin: 10px 5px 0px 5px">
	<div style= "float: left; height: 25px; width: 800px;">
	<div style= "float: left; width: 50%">
		<form action= 'watch.php?videoid=<?php echo $videoid; ?>' method= 'POST'>
		<input type = 'submit' name = 'like' value = 'Like'<?php echo $d; ?> >
		<input type = 'submit' name = 'dislike' value = 'Dislike'<?php echo $d2; ?> >
		
		</form>
	</div>
		<div style = "float: right; width: <?php echo $total_width; ?>;">
		<div style = "float: right; width: <?php echo $green; ?>%; height: 5px; background-color:green;"></div>
		<div style = "float: right; width: <?php echo $red; ?>%; height: 5px; background-color:red;"></div>
		
	</div>
	</div>
</div>