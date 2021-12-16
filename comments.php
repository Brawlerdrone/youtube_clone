<?php

include('./header.php');

$comment = $_POST['comment'];

mysqli_query($con,"INSERT INTO comments (user_commented, comment) VALUES ('$user','$comment')");

?>