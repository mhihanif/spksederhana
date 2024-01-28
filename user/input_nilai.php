<?php
echo $_SESSION['ket'];
$_SESSION['ket']="";
?>
<form action="" method="post">
<table width="100%">
  <tr>
    <td colspan="2"><strong>INPUT NILAI MAHASISWA</strong></td>
    </tr>
  <tr>
    <td>NIM</td>
    <td>:
      <input type="text" name="nim" id="nim" value="<?php echo $nim; ?>" disabled="disabled"/></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:
      <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>" disabled="disabled"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
		$sql=mysqli_query($con,"select * from matakuliah");
		while($res=mysqli_fetch_array($sql)){
	?>
  <tr>
    <td><?php echo $res["nm_mk"]; ?></td>
    <td>:
      <input type="text" name="<?php echo $res["kd_mk"]; ?>" id="<?php echo $res["kd_mk"]; ?>" /></td>
  </tr>
  <?php 
	}
  ?>
  <tr>
    <td>Minat</td>
    <td>: 
      <select name="minat" id="minat">
      <option value="empty">&nbsp;</option>  
      <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
      <option value="Jaringan">Jaringan</option>  
      </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btnsimpan" id="btnsimpan" value="Simpan" /></td>
  </tr>
</table>
</form>
<?php
function hitungbobot($nilai){
	if ($nilai=='A'){
		$bobot=4;
	}else if ($nilai=='B'){
		$bobot=3;
	}else if ($nilai=='C'){
		$bobot=2;
	}else if ($nilai=='D'){
		$bobot=1;
	}else if ($nilai=='E'){
		$bobot=0;
	}else {
    $bobot = $nilai;
  }
	return $bobot;
}

if(isset($_POST["btnsimpan"])){
	$sql=mysqli_query($con,"select * from matakuliah");
	while($res=mysqli_fetch_array($sql)){
		$kd_mk=$res["kd_mk"];
		$nilai=$_POST["$kd_mk"];
		$bobot=hitungbobot($nilai);
		$query1=mysqli_query($con,"update mhs_mk set nilai ='".$nilai."', bobot ='".$bobot."' where kd_mk ='".$kd_mk."' and nim = '".$nim."' ");
	}
	$minat=$_POST["minat"];
	$sql2=mysqli_query($con,"update peminatan set minat ='".$minat."' where nim ='".$nim."' ");
	$ket="Nilai Berhasil Disimpan";
	$_SESSION['ket']=$ket;
	header('location:awal.php?page=input_nilai');
}
?>