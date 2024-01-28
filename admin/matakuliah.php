<form action="" method="post">
<?php
echo $_SESSION['ket2'];
$_SESSION['ket2']=" ";
?>
<table width="100%" border="1" cellspacing="0" cellpadding="10px" bgcolor="#FFFFFF">
  <tr>
    <td colspan="6">DATA MATAKULIAH</td>
  </tr>
  <tr>
    <td>NO</td>
    <td>KODE MATAKULIAH</td>
    <td>NAMA MATAKULIAH</td>
    <td>OPSI</td>
  </tr>
  <?php
	$no=1;
	$sql2=mysqli_query($con,"select * from matakuliah");
	while($r2=mysqli_fetch_array($sql2))
	{
		?>
  <tr>
    <td width="5%"><?php echo $no; ?></td>
    <td width="40%"><?php echo $r2['kd_mk']; ?></td>
    <td width="40%"><?php echo $r2['nm_mk']; ?></td>
    <td width="15%">
    <a href="admin.php?page=matakuliah&amp;status=ubah&amp;kd_mk=<?php echo $r2['kd_mk']; ?>"><img src="../gambar/edit.png" width="18" height="18" alt="UBAH" /> </a>UBAH<br />
    <a href="admin.php?page=matakuliah&amp;status=hapus&amp;kd_mk=<?php echo $r2['kd_mk']; ?>"><img src="../gambar/delete.png" width="16" height="19" alt="HAPUS" /> </a>HAPUS</td>
  </tr>
  <?php
	$no++;
	}
  ?>
</table>
<table width="100%" cellspacing="0" cellpadding="10px">
  <tr>
    <td width="85%">&nbsp;</td>
    <td><input type="submit" name="btntambah" id="btntambah" value="Tambah" /></td>
  </tr>
</table>
<?php
if(isset($_POST['btntambah']) || $_GET['status']=='ubah'){
	$kata="TAMBAH";
	$kata2="Simpan";
	$kd_mku=$_GET['kd_mk'];
	if($_GET['status']=='ubah'){
		$sql3=mysqli_query($con,"select * from matakuliah where kd_mk='$kd_mku'");
		$r3=mysqli_fetch_array($sql3);
		$kata="UBAH";
		$kata2="Edit";
	}
?>
<table width="100%" border="1" cellspacing="0" cellpadding="10px" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php echo $kata," DATA"; ?></td>
    </tr>
  <tr>
    <td>KODE MATAKULIAH</td>
    <td><input type="text" name="kd_mk" id="kd_mk" value= "<?php echo $r3['kd_mk'] ; ?>" /></td>
  </tr>
  <tr>
    <td>NAMA MATAKULIAH</td>
    <td><input type="text" name="nm_mk" id="nm_mk" value= "<?php echo $r3['nm_mk'] ; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="<?php echo "btn",$kata2; ?>" id="<?php echo "btn",$kata2; ?>" value="<?php echo $kata2; ?>" /></td>
  </tr>
</table>
<?php
	$kd_mk2=$_POST["kd_mk"];
	$nm_mk2=$_POST["nm_mk"];
	
	if(isset($_POST['btnSimpan'])){
		$sql4=mysqli_query($con,"insert into matakuliah values('$kd_mk2','$nm_mk2')");
		
		$sql5=mysqli_query($con,"select * from user");
		while($r5=mysqli_fetch_array($sql5)){
			$nim2=$r5['nim'];
			if($nim2=='admin'){}
			else{
				$sql6=mysqli_query($con,"insert into mhs_mk values('$nim2','$kd_mk2','','')");
			}
		}
		
		$sql6=mysqli_query($con,"insert into pembobotan values('$kd_mk2','','')");
		$keterangan2="Data Berhasil Disimpan";
		$_SESSION['ket2']=$keterangan2;
		header('location:admin.php?page=matakuliah');
		die();
		
	}else if(isset($_POST['btnEdit'])){
		$kd_mk3=$_POST["kd_mk"];
		$nm_mk3=$_POST["nm_mk"];
		
		$sql7=mysqli_query($con,"update matakuliah set kd_mk='$kd_mk3', nm_mk='$nm_mk3' where kd_mk='$kd_mk3'");
		$keterangan2="Data Berhasil Diubah";
		$_SESSION['ket2']=$keterangan2;
		header('location:admin.php?page=matakuliah');
		die();
	}
}else if($_GET['status']=='hapus'){
	$kd_mk=$_GET['kd_mk'];
	$sql8=mysqli_query($con,"delete from matakuliah where kd_mk='$kd_mk'");
	$keterangan2="Data Berhasil Dihapus";
	$_SESSION['ket2']=$keterangan2;
	header('location:admin.php?page=matakuliah');
	die();
}
?>
</form>