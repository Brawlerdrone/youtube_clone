<?php 

include('./header.php');


?>
<br/><br/>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id = "defaultOpen">All</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">IT</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Engineering</button>
</div>

<div id="London" class="tabcontent">
<?php
$get_videos = mysqli_query($con, "SELECT * FROM videos where privacy ='private'");

$numrows = mysqli_num_rows($get_videos);

if($numrows == 0){
	
	
	
}else {
	while($row = mysqli_fetch_assoc($get_videos)){
		$id = $row['id'];
		
		$video_title = $row ['vid_title'];
		$video_description = $row ['vid_description'];
		$video_keywords = $row ['video_keys'];
		$uploader = $row ['uploader'];
		$privacy = $row ['privacy'];
		$date_uploaded = $row ['date'];
		
		?>
		<div class = "videosdiv"> 
			<?php echo $video_title; ?>
		<div> <a href= "watch.php?video_id=<?php echo $video_id?>">Watch</a></div>	
		
		</div>
		<?php
	}
	
	
}
?>
</div>

<div id="Paris" class="tabcontent">

<?php
$get_videos = mysqli_query($con, "SELECT * FROM videos where privacy ='public'");

$numrows = mysqli_num_rows($get_videos);

if($numrows == 0){
	
	
	
}else {
	while($row = mysqli_fetch_assoc($get_videos)){
		$id = $row['id'];
		
		$video_title = $row ['vid_title'];
		$video_description = $row ['vid_description'];
		$video_keywords = $row ['video_keys'];
		$uploader = $row ['uploader'];
		$privacy = $row ['privacy'];
		$date_uploaded = $row ['date'];
		
		?>
		<div class = "videosdiv"> 
			<?php echo $video_title; ?>
		<div> <a href= "watch.php?video_id=<?php echo $video_id?>">Watch</a></div>	
		
		</div>
		<?php
	}
	
	
}
?>
</div>

<div id="Tokyo" class="tabcontent">
  <?php
$get_videos = mysqli_query($con, "SELECT * FROM videos where privacy ='public'");

$numrows = mysqli_num_rows($get_videos);

if($numrows == 0){
	
	
	
}else {
	while($row = mysqli_fetch_assoc($get_videos)){
		$id = $row['id'];
		
		$video_title = $row ['vid_title'];
		$video_description = $row ['vid_description'];
		$video_keywords = $row ['video_keys'];
		$uploader = $row ['uploader'];
		$privacy = $row ['privacy'];
		$date_uploaded = $row ['date'];
		
		?>
		<div class = "videosdiv"> 
			<?php echo $video_title; ?>
		<div> <a href= "watch.php?video_id=<?php echo $video_id?>">Watch</a></div>	
		
		</div>
		<?php
	}
	
	
}
?>
</div>

<script>
	document.getElementById("defaultOpen")

</script>
<script>
	function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the link that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>