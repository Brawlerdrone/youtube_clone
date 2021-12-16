<?php
include('./header.php');



?>
<br /><br /> <br />
<?php
$get_videos = mysqli_query($con, "SELECT * FROM videos where uploader ='$user'");

$numrows = mysqli_num_rows($get_videos);

echo "<h1> Videos You Have Uploaded";
if($numrows == 0){
	
	//die("You haven't uploaded a video");
	
}else {
	while($row = mysqli_fetch_assoc($get_videos)){
		$id = $row['id'];
		$video_title = $row ['vid_title'];
		$video_description = $row ['vid_description'];
		$video_keywords = $row ['video_keys'];
		$uploader = $row ['uploader'];
		$privacy = $row ['privacy'];
		$date_uploaded = $row ['date'];
		
		echo "<h4><a href='test_watch?id=$id'>".$video_title. "</a></h4>";
		?>
		
		<?php
	}
	
	
}
?>