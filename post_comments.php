<?php

include('./header.php');

	$name = @$_POST['name'];
	$comment = @$_POST['comment'];

	mysqli_query($con,"INSERT INTO comments VALUES ('$name','$comment')");
	//header("location: test_watch.php?id=$id");

?>