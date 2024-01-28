<form action="" method="post">
<?php
echo $_SESSION['ket'];
$_SESSION['ket']=" ";
ob_start();
?>
<table width="100%" border="1" cellspacing="0" cellpadding="10px" bgcolor="#FFFFFF">
  <tr>
    <td colspan="6">DATA MAHASISWA</td>
  </tr>
  <tr>
    <td>NO</td>
    <td>NIM</td>
    <td>NAMA</td>
    <td>PASSWORD</td>
    <td>STATUS</td>
    <td>OPSI</td>
  </tr>
  <?php
	$no=1;
	$sql2=mysqli_query($con,"select * from user");
	while($r2=mysqli_fetch_array($sql2))
	{
		?>
  <tr>
    <td width="5%"><?php echo $no; ?></td>
    <td width="15%"><?php echo $r2['nim']; ?></td>
    <td width="30%"><?php echo $r2['nama']; ?></td>
    <td width="20%"><?php echo $r2['password']; ?></td>
    <td width="15%"><?php echo $r2['status']; ?></td>
    <td width="15%">
    <a href="admin.php?page=user&amp;status=ubah&amp;nim=<?php echo $r2['nim']; ?>"><img src="../gambar/edit.png" width="18" height="18" alt="UBAH" /> </a>UBAH<br />
    <a href="admin.php?page=user&amp;status=hapus&amp;nim=<?php echo $r2['nim']; ?>"><img src="../gambar/delete.png" width="16" height="19" alt="HAPUS" /> </a>HAPUS<br />
    <a href="admin.php?page=detailuser&amp;nim=<?php echo $r2['nim']; ?>"><img src="../gambar/preview.png" width="22" height="21" alt="DETAIL" /> </a>DETAIL</td>
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
	if(isset($_POST['btntambah'])){
		$kata="TAMBAH";
		$kata2="Simpan";
	}else if($_GET['status']=='ubah'){
		$nimu=$_GET['nim'];
		$sql3=mysqli_query($con,"select * from user where nim='$nimu'");
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
    <td>NIM</td>
    <td><input type="text" name="nim" id="nim" value= "<?php echo $r3['nim'];?>" /></td>
  </tr>
  <tr>
    <td>NAMA</td>
    <td><input type="text" name="nama" id="nama" value= "<?php echo $r3['nama'];?>" /></td>
  </tr>
  <tr>
    <td>PASSWORD</td>
    <td><input type="text" name="password" id="password" value= "<?php echo $r3['password'];?>" /></td>
  </tr>
  <tr>
    <td>STATUS</td>
    <td><input type="text" name="status" id="status" value= "<?php echo $r3['status'];?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="<?php echo "btn",$kata2; ?>" id="<?php echo "btn",$kata2; ?>" value="<?php echo $kata2; ?>" /></td>
  </tr>
</table>
<?php
	$nim2=$_POST["nim"];
	$nama2=$_POST["nama"];
	$password2=$_POST["password"];
	$status2=$_POST["status"];
		
	if(isset($_POST['btnSimpan'])){
		
		$sql4=mysqli_query($con,"insert into user values('$nim2','$nama2','$password2','$status2')");
		
		$sql5=mysqli_query($con,"select * from matakuliah");
		while($r5=mysqli_fetch_array($sql5)){
			$kd_mk=$r5['kd_mk'];
			$sql6=mysqli_query($con,"insert into mhs_mk values('$nim2','$kd_mk','','')");
		}
		
		$sql7=mysqli_query($con,"insert into peminatan values('$nim2','','','','')");
		$keterangan="Data Berhasil Disimpan";
		$_SESSION['ket']=$keterangan;
		header('location:admin.php?page=user');
		die();
	}else if(isset($_POST['btnEdit'])){
		$sql8=mysqli_query($con,"update user set nim='$nim2', nama='$nama2', password='$password2', status='$status2' where nim='$nimu'");
		$keterangan="Data Berhasil Diubah";
		$_SESSION['ket']=$keterangan;
		header('location:admin.php?page=user');
		die();
	}
}else if($_GET['status']=='hapus'){
	$nimu=$_GET['nim'];
	$sql9=mysqli_query($con,"delete from user where nim='$nimu'");
	$keterangan="Data Berhasil Dihapus";
	$_SESSION['ket']=$keterangan;
	header('location:admin.php?page=user');
	die();
}
?>
</form>