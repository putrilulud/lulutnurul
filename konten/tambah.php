<?php
	session_start();
	if(!isset($_SESSION['id'])){ header("location: index.php"); }
	include "../koneksi/koneksi.php"; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>UAS WEB</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<div id="container">
			<div id="banner">
				<div class="banner-info">
				<img src="../image/test.gif" width="100%">
			</div>	
			
<?php if(@$_SESSION['status'] == "Admin"){ ?>
				</div>
		
		<div id="cssmenu">
					<ul>
				<li><a href="../index.php"><span>Home</span></a></li>
				<li class='active has-sub'><a href='#'><span>Menu</span></a>
				<ul>
					<li><a href="../index.php?module=Mahasiswa#pos"><span>Mahasiswa</span></a></li>
					<li><a href="../index.php?module=dosen#pos"><span>Dosen</span></a></li>
					<li class='last'><a href="../index.php?module=matkul#pos"><span>Mata Kuliah</span></a></li>
				</ul>
				</li>
				<li><a href="http://www.uinjkt.ac.id"><span>Website UIN</span></a></li>
				<li class='last'><a href="../index.php?module=Logout#pos"><span>Logout</span></a></li>
					
	<?php }?>
	
	<?php if(@$_SESSION['status'] == "Dosen"){ ?>
				</div>
		<div id="cssmenu">
			<ul>
				<li><a href="index.php"><span>Home</span></a></li>
				<li class='active has-sub'><a href='#'><span>Menu</span></a>
				<ul>
					<li><a href="../index.php?module=mahasiswa_do#pos"><span>Daftar Mahasiswa</span></a></li>
					<li><a href="../index.php?module=input#pos"><span>Input Nilai</span></a></li>
				</ul>
				</li>
				<li><a href="http://www.uinjkt.ac.id"><span>Website UIN</span></a></li>
				<li><a href="../index.php?module=about#pos"><span>About Us</span></a></li>
				<li class='last'><a href="../index.php?module=Logout#pos"><span>Logout</span></a></li>
	<?php }?>
	
	<?php if(@$_SESSION['status'] == "Mahasiswa"){ ?>
				</div>
		<div id="cssmenu">
			<ul>
					<li><a href="index.php"><span>Home</span></a></li>
				<li class='active has-sub'><a href='#'><span>Menu</span></a>
				<ul>
					<li><a href="../index.php?module=mnilai#pos"><span>Lihat Nilai</span></a></li>
				</ul>
				</li>
				<li><a href="http://www.uinjkt.ac.id"><span>Website UIN</span></a></li>
				<li><a href="../index.php?module=about#pos"><span>About Us</span></a></li>
				<li class='last'><a href="../index.php?module=Logout#pos"><span>Logout</span></a></li>
	<?php }?>
	
	<?php if(@$_SESSION['status']){ ?>
			<li><a><u>Status :  
					<?php 
						echo $_SESSION["status"];
					?></u></a></li>
			<div id="menucari">
			<form method="post" action="?module=cari#pos">
				</label><input class="inputfield" name="username" type="text"  id="username" placeholder=" Search Username.." />
				<input class="button" type="submit" name=" Search " value=" Search " style="background-color:white" />
				</form>
			</div><?php }?>
				</ul>
							</div>
		
		<div id="page">
		<h1 align="center"><br></br><br>TAMBAH <?php echo strtoupper("$_GET[status]"); ?></br></font></h1>
		<form action="tambah_proses.php" method="post">
		<p>&nbsp;</p><table border="0" align="center">
			<?php if($_GET['status'] == "matkul"){ ?>
				<input type="text" name="status" value="Matkul" hidden/>
				<tr>
					<td>Mata Kuliah</td>
					<td>:</td>
					<td><input type="text" name="nama" required/></td>
				</tr>
				<tr>
			    	<td>SKS</td>
					<td>:</td>
					<td><input type="text" name="sks" required/></td>
			    </tr>
			<?php } else { ?>
				<tr>
					<td width="150">ID</td>
					<td>:</td>
					<td width="170"><input type="text" name="id_user" required/></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="nama" required/></td>
				</tr>
				<tr>
			    	<td>Username</td>
					<td>:</td>
					<td><input type="text" name="username" required/></td>
			    </tr>
			    <tr>
			        <td>Password</td>
					<td>:</td>
					<td><input type="password" name="password" required/></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="email" name="email" required/></td>
				</tr>
			<?php } ?>			
			<tr>
		    <?php if($_GET['status'] == "dosen"){ ?>
			    <tr>
			    	<td>Status</td>
			        <td>:</td>
			        <td><select name="status">
			 		<option value="Dosen" style="width:115px" selected>Dosen</option>
			        </select></td>
			    </tr>
		    	  <td>Mata Kuliah</td>
		          <td>:</td>
		          <td><select name="matkul"> 
		        <?php  
		    	  $query = "SELECT * FROM matkul";
		    	  $hasil = mysql_query($query);
		    	  while ($data = mysql_fetch_array($hasil)) {
		    		?><option value="<?php echo "$data[id_matkul]";?>"><?php echo "$data[nama_matkul]";?></option><?php
		    	  }
		    	?>
		    	</select></td>
		    	</tr>
		    <?php } ?>
		    <?php if($_GET['status'] == "mahasiswa"){ ?>
		    	<input type="text" name="status" value="Mahasiswa" hidden/>
				<tr>
			    	<td>Fakultas</td>
					<td>:</td>
					<td><input type="text" name="fakultas" required/></td>
			    </tr>
				<tr>
			    	<td>Jurusan</td>
					<td>:</td>
					<td><input type="text" name="jurusan" required/></td>
			    </tr>
		    	  <td>Pengajar</td>
		          <td>:</td>
		          <td><select name="dosen"> 
		        <?php  
		    	  $query = "SELECT * FROM user JOIN matkul on user.id_matkul = matkul.id_matkul WHERE status = 'Dosen'";
		    	  $hasil = mysql_query($query);
		    	  while ($data = mysql_fetch_array($hasil)) {
		    		?><option value="<?php echo "$data[id_user]";?>"><?php echo "$data[nama]";?> (<?php echo "$data[nama_matkul]";?>)</option><?php
		    	  }
		    	?>
		    	
		    	</select></td>
		    	</tr>
		    <?php } ?>
			<tr height="68">
				<td  align="right"><input class="button" type="submit" value="Tambah" style="background-color:white"/></td>
				<td> </td>
				<td><input class="button" type="reset" value="Reset" style="background-color:white"/></td>
			</tr>
		</table>
		<br></br><br></br>
		</form>
		</div>
	<div id="clearfooter"></div>
	<div id="footer">
		<p>&copy; 2015 Lulut dan Nurul <i>All Right Reserved</i></p>
	</div>
</div>

</body>
</html>