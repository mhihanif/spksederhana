<form action="" method="post">
<?php
echo $_SESSION['ket3'];
$_SESSION['ket3']=" ";
?>
<table width="100%" border="1" cellspacing="0" cellpadding="10px" bgcolor="#FFFFFF">
  <tr>
    <td colspan="6">DATA BOBOT</td>
  </tr>
  <tr>
    <td>NO</td>
    <td>KODE MATAKULIAH</td>
    <td>RATING REKAYASA PERANGKAT LUNAK</td>
    <td>RATING JARINGAN</td>
    <td>&nbsp;</td>
  </tr>
  <?php
	$no=1;
	$sql=mysqli_query($con,"select * from pembobotan inner join matakuliah on pembobotan.kd_mk=matakuliah.kd_mk");
	while($res=mysqli_fetch_array($sql))
	{
		?>
  <tr>
    <td width="5%"><?php echo $no; ?></td>
    <td width="40%"><?php echo $res['nm_mk']; ?></td>
    <td width="20%"><?php echo $res['rpl']; ?></td>
    <td width="20%"><?php echo $res['jaringan']; ?></td>
    <td width="15%">
    <a href="admin.php?page=bobot&amp;status=ubah&amp;kd_mk=<?php echo $res['kd_mk']; ?>"><img src="../gambar/edit.png" width="18" height="18" alt="UBAH" /></a>
    UBAH</td>
  </tr>
  <?php
	$no++;
	}
  ?>
</table>
<?php
if($_GET['status']=='ubah'){
		$kd_mk=$_GET['kd_mk'];
		$sql6=mysqli_query($con,"select * from pembobotan where kd_mk='$kd_mk'");
		$res6=mysqli_fetch_array($sql6);
		$kata="UBAH";
		$kata2="Edit";
?>
<table width="100%" border="1" cellspacing="0" cellpadding="10px" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php echo $kata," DATA"; ?></td>
    </tr>
  <tr>
    <td>KODE MATAKULIAH</td>
    <td><input type="text" name="kd_mk" id="kd_mk" value= "<?php echo $res6['kd_mk'] ; ?>" /></td>
  </tr>
  <tr>
    <td>RATING REKAYASA PERANGKAT LUNAK</td>
    <td><input type="text" name="rpl" id="rpl" value= "<?php echo $res6['rpl'] ; ?>" /></td>
  </tr>
  <tr>
    <td>RATING JARINGAN</td>
    <td><input type="text" name="jaringan" id="jaringan" value= "<?php echo $res6['jaringan'] ; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="<?php echo "btn",$kata2; ?>" id="<?php echo "btn",$kata2; ?>" value="<?php echo $kata2; ?>" /></td>
  </tr>
</table>
<?php
}
	if(isset($_POST['btnEdit'])){
		$kd_mk3=$_POST["kd_mk"];
		$rpl3=$_POST["rpl"];
		$jaringan3=$_POST["jaringan"];
		
		$sql7=mysqli_query($con,"update pembobotan set kd_mk='$kd_mk3', rpl='$rpl3', jaringan='$jaringan3' where kd_mk='$kd_mk3'");
		$keterangan3="Data Berhasil Diubah";
		$_SESSION['ket3']=$keterangan3;
		header('location:admin.php?page=bobot');
		die();
	}
?>
</form>