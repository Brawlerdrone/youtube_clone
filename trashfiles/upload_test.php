<?php
include ( './header.php' ); 

if(isset ($_FILES ['video'])){
	
	if (($_FILES['video']['type']=='video/mp4'))
		
	{
		$title = $_POST['video_title'];
		$desc = $_POST['video_description'];
		$keywords = $_POST['video_keywords'];
		$privacy = @$_POST['privacy'];
		
		
	if (!empty ($title) || ($desc)|| ($keywords) || ($privacy) ) {
			$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			$video_id = substr(str_shuffle($chars),0,15);
			$video_id = md5($video_id);
			
		
		}else {
			die("empty fields");
		
	}
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$random_directory = substr(str_shuffle($chars),0,15);
	
	
	if (file_exists ('Assets/vids' .$random_directory.''. $_FILES['video']['name'])){
		echo 'video excists';
		}else {
			
		
			move_uploaded_file ($_FILES ['video']['tmp_name'],'Assets/Vids/mp4' .$random_directory.''.$_FILES['video']['name']);
			$img_name = $_FILES['video']['name'];
			$filename = "Assets/Vids/mp4".$random_directory.$_FILES['video']['name'];
			$md5_file=md5_file($filename);
			$check_md5 = mysqli_query($con,"SELECT file_md5 FROM videos WHERE file_md5='$md5_file'");
			if(mysqli_num_rows($check_md5) !=0){
				unlink($filename);
				die ("This is duplicate");
				
				
			}else{
			$date = date ("F j, Y");
			$insert = mysqli_query ($con, "INSERT INTO videos VALUES('','$title','$desc','keywords', 
			'$user', '$privacy','$date',0,'$video_id', '','$filename')");
			mysqli_query($con, "UPDATE videos SET file_md5='$md5_file' WHERE video_id = '$video_id'");
			die('Video was uploaded sucessfully');
			}
			//md5_file = md5_file($filename));
			//mysqli_query($con, "UPDATE videos SET file_md5= 'md5_file' WHERE video_id = video_id");
			//$profile_pic = $random_directory.$img_name;
			//$assoc_profile_pic =(mysqli_query($con,"UPDATE users SET profile_pic= '$profile_pic' WHERE username = '$user'"));
			
		}
	}
}


?>
<h2>Upload a video</h2>
<div class = "uploadContainer">
<form action = 'upload_test.php' method = 'POST' enctype = 'multipart/form-data'>

<label for = "video_title">Title: </label>
<input type = 'text' name= 'video_title' value = ''/><br/>

<label for = "video Description">Video Decription :</label> <br/>
<textarea rows = '10' cols = '40' name = 'video_description'></textarea><br/>

<label for = "video_keywords">Video keywords: </label>
<input type = 'text' name= 'video_keywords' value = ''/><br/>

Privacy : 
<input type ='radio' name = 'privacy' value = 'IT'/> Computer_Science&nbsp; &nbsp;
<input type ='radio' name = 'privacy' value = 'Engineering'/>Engineering<br/><br/>



<input type = 'file'    name = 'video' value = 'Upload your video'>
<input type = 'submit'  name ='submit' value = 'Upload'>
<div>
</form>


