<?php
include "prosesspk.php";

if ($nilai4[1]==$nilai4[2]){
	$hasil=$minat;
}else if ($nilai4[1]>$nilai4[2]){
	$hasil="Rekayasa Perangkat Lunak";
}else { $hasil="Jaringan"; }
$query=mysqli_query($con,"update peminatan set hasil ='".$hasil."', nrpl='".$nilai4[1]."', njrg='".$nilai4[2]."' where nim ='".$nim."' ");
?>
<div>
<table width="100%" border="1" cellspacing="0" cellpadding="10px">
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
</table>
</div>
<br />
<?php
	if ($nilai4[1]==0 && $nilai4[2]==0){
		echo "Silahkan input nilai terlebih dahulu";
	}else{
		echo "<h3>Berdasarkan penilaian, ",strtoupper($nama)," lebih baik memilih jalur peminatan ",strtoupper($hasil);
	}
?>