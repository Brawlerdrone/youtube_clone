<?php
session_start();
if(isset($_POST["submit1"])){
session_destroy();
header('Location:header.php');
}
?>




<form name = "form1" action ="logout.php" method= "POST" >

<input type ="submit" name = "submit1" value="redirect">
<form>