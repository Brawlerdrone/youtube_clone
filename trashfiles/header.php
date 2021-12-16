

<?php
 session_start();
 include ( './functions.php' );
 include ( './connect_to_mysql.php' );
 
 $user = "";
  if (isset ($_SESSION ['username'])){
	$user = $_SESSION['username'];  
	  
	  
  }else{
	$user = "";  
	  
  }
 ?>
<html>

	<head>
		<meta name = "viewport" content="width=device-width, initial-scale=1">
		<link rel= "stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type ="text/css" href="">
		 
		
	</head>
	<body>
	<div class="menu_bg"></div>
		<div id = "tab">
			<ul>
					<li><a href = "#">FEATURED</a></li>
					<li><a href = "#">POPULAR VIDEOS</a></li>
					<li class  = "tablinks" ><a href = "#">LATEST</a></li>
					<?php if ($user == ""){ echo '  
                     <li class="menu_login"><a href="login.php">LOGIN</a></li>
                        <li class="menu_join"><a href="join.php">CREATE AN ACCOUNT</a></li>
						
						 ';  
						}
						else{
						 echo '<li class="menu_login"><a href="user.php">MEMBERS</a></li>	
						 <li class="menu_login"><a href="logout.php">LOGOUT</a></li>';
						}
					    ?>
						
					
			</ul>		
		</div>
		
		


		</div>
		
		
		


	</body>
</html>
