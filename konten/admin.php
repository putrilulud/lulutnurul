<?php 
	if ($_SESSION["username"] == "admin")
	{
		echo "Selamat datang ". $_SESSION["username"];
	}
 ?>