<?php

include( './header.php');
if(isset($_FILES['channel_pic'])){
	if(($_FILES['channel_pic']['type']=='image/jpeg')||($_FILES['channel_pic']['type']=='image/png')
		||($_FILES['channel_pic']['type']=='image/gif')){
			$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			$random_directory = substr(str_shuffle($chars),0,15);
			
			//mkdir('Assets/Images/Profiles' . $random_directory . '');
			if(file_exists('Assets/Images/Profiles' . $random_directory . ''. $_FILES['channel_pic']['name'])){
				echo 'image exist';
				
			}else{
				move_uploaded_file($_FILES['channel_pic']['tmp_name'],'Assets/Images/Profiles' . $random_directory . ''
				. $_FILES['channel_pic']['name']);
				$img_name = $_FILES['channel_pic']['name'];
				$profile_pic = $random_directory.$img_name;
				$assoc_profile_pic = mysqli_query($con,"UPDATE users SET profile_pic='$profile_pic' WHERE username = '$user'");
				
				die('The image was uploaded succesfully');
				
			}
		}
	if(($_FILES['channel_pic']['type']!='image/jpeg')||($_FILES['channel_pic']['type']!='image/png')
		||($_FILES['channel_pic']['type']!='image/gif')){
			//die('invalid file');
		
	}
	
}

?>
<br /><br />
<form action = 'upload_image.php' method = 'POST' enctype = 'multipart/form-data'>
<input type = 'file' name = 'channel_pic' value = 'Upload your image'>
<input type= 'submit' name='submit' value= 'Upload_image'>
</form>