<link rel= "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel= "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel= "stylesheet" href = "css/starrr.css">
<script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src= "starrr.js"></script>

<?php
include('./header.php');


if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$res = mysqli_query($con,"SELECT * from videoss WHERE id='$id'");
	
	$row = mysqli_fetch_object($res);
	

	
	
	$result_ratings = mysqli_query($con,"SELECT * FROM ratings WHERE video_id = '". $row->id ."'");
		
		$total_ratings = 0 ;
		while($row_ratings = mysqli_fetch_object($result_ratings))
		{
			$total_ratings += $row_ratings->rating;
			
		}
		
		$average_ratings = 0;
		//$rounded_off_rating = 0;
		if($total_ratings > 0){
			
			$average_ratings = $total_ratings/ mysqli_num_rows($result_ratings);
			$rounded_off_rating = round($average_ratings,2);
			
			
			
		}
		
			$updateRatings = mysqli_query($con,"UPDATE videoss SET total_rating ='$rounded_off_rating' 
			WHERE id='$id' " ) or die(mysqli_error($con));
	
			$Uploader = $row->uploader;
			$name = $row->name;
			
			
			if(isset($_POST['post_comment'])){
				
				 
				$file_id = $row->id;
				$comment_text = $_POST['write_comment'];
				mysqli_query($con,"INSERT INTO comments VALUES('','$comment_text','$file_id')");
				
				
				
			}
			
			
			
			
			
			
			
			
	?>
<div class = "display">
<video class = "filetab" width = "750" height = "400" controls >
	<source src="Assets/videos/<?php echo $row->name; ?>" type="video/mp4">
		Your browser doesn't support the HTML5 video tag.
</video>
<form method = "POST" onsubmit = "return saveRatings(this);">
	<input type = "hidden" name ="video_id" value ="<?php echo $row->id; ?>">
	<input type = "hidden" name ="file_name" value ="<?php echo $row->name; ?>">
	<p>
		<div class="starrr"></div>
		
		
	</p>
	<br /><br />
	<input type="submit" class = "register">
</form>
</div>
	

<?php 
	}
	
	?>
	<br /><br />
	<br/>
	
	<div class = "comment_input_section">
		<form action = "test_watch.php?id=<?php echo $row->id; ?>" method = "POST">
		
			<textarea name ="write_comment" rows="7" cols = "50"></textarea>
			<div class= "btn">
			<input type ="submit" class= "btnn" name = "post_comment"  value="comment" >
			
			</div>
			</form>
			
	</div>
	<div class = "comment_section">
		<?php
			$select_comment = mysqli_query($con,"SELECT * FROM  comments where file_id = ".$row->id." ");
				while($r = mysqli_fetch_assoc($select_comment))
				{	
					$comment= $r['comment'];
					
					echo "<p>". $comment ."</p> <br />";
					
				}
	
	
		?>
		
	</div>
	

<script>
var rating = 0;
	$(function (){
		$(".starrr").starrr().on("starrr:change", function (event,value){
			rating = value;
			
			});
		
				});
			function saveRatings(form){
				var video_id = form.video_id.value;
				var file_name = form.file_name.value;
				
			$.ajax({
				url: "save-ratings.php",
				method: "POST",
				data: {
					"video_id": video_id,
					"file_name" : file_name,
					"rating" : rating
				},
				success: function (response){
					//alert(response);
					
				}
				
			});
			
			}		
	
</script>
	

