<div id="banner">
		<div class="banner-info">
				<h3>KNOWLEDGE <span>|</span> PIETY <span>|</span> INTEGRITY</h3>
				<h4><span>UIN SYARIF HIDAYATULLAH</span> JAKARTA</h4>
			</div>
	</div>
	<div id="sidebar">
		<ul id="navmenu">
			<li><a href="index.php">Home </a></li>
			<li><a href="?module=nilai#pos">Daftar Nilai</a></li>
			<li><a href="?module=input#pos">Input Nilai</a></li>
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