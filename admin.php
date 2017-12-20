<!DOCTYPE html>
<html>
<head>
	<title>UAS WEB</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<div id="container">
				<div id="banner">
				<div class="banner-info">
				<h3>KNOWLEDGE <span>|</span> PIETY <span>|</span> INTEGRITY</h3>
				<h4><span>UIN SYARIF HIDAYATULLAH</span> JAKARTA</h4>
				</div>
				<div id="sidebar">
				<ul id="navmenu">
					<li><a href="index.php">Home </a></li>
					<li><a href="?module=akun#pos">Daftar Akun</a></li>
					<li><a href="?module=konfirakun#pos">Konfirmasi Akun</a></li>
					<li><a href="?module=Logout#pos">Logout</a></li>
					<p>Status :  
					<?php 
						echo $_SESSION["status"];
					?>
					</p>
				</ul>
							</div>
					<div id="page">
					<?php if(isset($_GET['module']))
						include "konten/$_GET[module].php";
						else
						include "konten/home.php";?>
				</div>
				<div id="clearfooter"></div>
					</div>
	
	<div id="clearfooter"></div>
	<div id="footer">
		<p>&copy; 2015 Lulut dan Nurul <i>All Right Reserved</i></p>
	</div>
</div>

</body>
</html>