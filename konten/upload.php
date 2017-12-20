
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
	include "../koneksi/koneksi.php";
	$mhs = $_SESSION['id']; $i=1;
	$hasil=mysql_query("SELECT * FROM mhs JOIN user on mhs.id_mhs = user.id_user WHERE mhs.id_mhs = '$mhs'");
	$aray = mysql_fetch_array($hasil)?>
<?php
/* JPEGCam Test Script */
/* Receives JPEG webcam submission and saves to local file. */
	
/* Make sure your directory has permission to write files as your web server user! 
	*/

$filename =  $mhs.'.png';
$result = file_put_contents( 'images/'.$filename, file_get_contents('php://input') );
if (!$result) {
	print "ERROR: Failed to write data to $filename, check permissions\n";
	exit();
}

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/images/' . $filename;
print "$url\n";

?>
</body>
</html>
