<h1 align="center"><font color="#07324E" size="5px"><br></br><br></br>Hasil Pencarian</font></h1>
<?php
include "koneksi/koneksi.php";
$username=$_POST['username'];
$select="select * from user where username like '%$username%'";
$hasil=mysql_query($select);
?>
<div class="customers">
<table>
    	<tr>
            <td width="100">Username</td>
            <td width="100">Status</td>
		</tr>

<?php
while($buff=mysql_fetch_array($hasil)){
?>
<tr><td align="center"><?php echo $buff['username']; ?></td>
    <td align="center"><?PHP echo $buff['status'];	?></td> 
</tr>

<?php
};
?>
</table>
</div>