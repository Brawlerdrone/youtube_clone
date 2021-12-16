<?php
include ( './header.php' );

$get_user_details = mysqli_query($con,"SELECT * FROM users WHERE username='$user'");
$numrows_user_details = mysqli_num_rows($get_user_details);

if($numrows_user_details == 1){
	while($row = mysqli_fetch_assoc($get_user_details)){
		$id = $row['id'];
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$username = $row['username'];
		$email = $row['email'];
		
		
	}
	
	
}else{
	die ("unknown error");
	
}
?>


<br />	<br /> <br /> <br /> <br />


<div class = "card">
	<br /><br />
	<p class = "userDetails">Firstname: <?php echo $firstname; ?></p>
	<br /><br />
	<p class = "userDetails">LastName:<?php echo $lastname; ?></p>
	<br /><br />
	<p class = "userDetails">Username: <?php echo $username; ?></p>
	<br /><br />
	<p class = "userDetails">email : <?php echo $email;?></p>
	<br /><br />
	<p>Wish to share content?:</p>
		<br /><br />

	<p>Upload a video <a href = "upload_videos.php"> here </a></p>
	<br /><br />
	<p>Upload a video <a href = "OtherFileUploads.php"> here </a></p>
		<br /><br />

</div>