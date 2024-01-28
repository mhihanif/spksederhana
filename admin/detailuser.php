<?php
$nim=$_GET['nim'];
$sql4=mysqli_query($con,"select * from user where nim='$nim'");
$res4=mysqli_fetch_array($sql4);
$nimd=$res4['nim'];
$namad=$res4['nama'];

$nilai=array(array());
$nilai2=array(array());
$nilai3=array(array());
$nilai4=array();
$sql=array();
$res=array();
$sql2=array();
$res2=array();
	
for($i=0;$i<=2;$i++){
	$sql[$i]=mysqli_query($con,"select nm_mk,rpl,jaringan from matakuliah inner join pembobotan on matakuliah.kd_mk=pembobotan.kd_mk");
	for($j=1;$res[$i]=mysqli_fetch_array($sql[$i]);$j++){
		$nilai[$i][$j]=$res[$i][$i];
	}
}
$k=count($nilai[0]);

for($j=1;$j<=$k;$j++){
	$nilai2[0][$j]=$nilai[0][$j];
	$nilai2[3][$j]=max($nilai[1][$j],$nilai[2][$j]);
}
for($i=1;$i<=2;$i++){
	for($j=1;$j<=$k;$j++){
		$nilai2[$i][$j]=$nilai[$i][$j]/$nilai2[3][$j];
	}
}

for($i=1;$i<=2;$i++){
	$sql2[$i]=mysqli_query($con,"select * from matakuliah inner join mhs_mk on matakuliah.kd_mk=mhs_mk.kd_mk where nim='".$nim."'");
	
	$nilai4[$i]=0;
	for($j=1;$res2[$i]=mysqli_fetch_array($sql2[$i]);$j++){
		$nilai3[0][$j]=$res2[$i]["nm_mk"];
		$nilai3[1][$j]=$res2[$i]["nilai"];
		$nilai3[2][$j]=$res2[$i]["bobot"];
		$nilai4[$i]=$nilai4[$i]+($nilai2[$i][$j]*$nilai3[2][$j]);
	}
}

$sql3=mysqli_query($con,"select * from peminatan where nim='".$nim."'");
$res3=mysqli_fetch_array($sql3);
$minat=$res3["minat"];
$hasil=$res3["hasil"];
?>
<div>
<h3>Data Mahasiswa</h3>
<table width="100%" bgcolor="#FFFFFF">
    <td>NIM</td>
    <td>:
      <input type="text" name="nim" id="nim" value="<?php echo $nimd; ?>" disabled="disabled"/></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:
      <input type="text" name="nama" id="nama" value="<?php echo $namad; ?>" disabled="disabled"/></td>
  </tr>
</table>
</div>
<div>
<h3>Tabel Nilai Mahasiswa</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="10px" bgcolor="#FFFFFF">
  <tr>
    <td>&nbsp;</td>
    <?php
	for($j=1;$j<=$k;$j++){
		echo "<td>".$nilai3[0][$j]."</td>";
	}
	?>
  </tr>
  <tr>
    <td>Nilai Huruf</td>
    <?php
	for($j=1;$j<=$k;$j++){
		echo "<td>".$nilai3[1][$j]."</td>";
	}
	?>
  </tr>
  <tr>
    <td>Bobot</td>
    <?php
	for($j=1;$j<=$k;$j++){
		echo "<td>".$nilai3[2][$j]."</td>";
	}
	?>
  </tr>
</table>
</div>
<br />
<div>
<h3>Tabel Hasil</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="10px" bgcolor="#FFFFFF">
  <tr>
    <td>&nbsp;</td>
    <td>Hasil Akhir Pembobotan</td>
  </tr>
  <tr>
    <td>Rekayasa Perangkat Lunak</td>
    <td><?php echo $nilai4[1]; ?></td>
  </tr>
  <tr>
    <td>Jaringan</td>
    <td><?php echo $nilai4[2]; ?></td>
  </tr>
  <tr>
    <td>Pilihan Minat</td>
    <td><?php echo $minat; ?></td>
  </tr>
  <tr>
    <td>Hasil Sistem</td>
    <td><?php echo $hasil; ?></td>
  </tr>
</table>
</div>