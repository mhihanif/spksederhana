<?php include "prosesspk.php"; ?>
<div>
<h3>Alternatif Pilihan</h3>
A1 = Rekayasa Perangkat Lunak<br />
A2 = Jaringan
</div>
<br />
<div>
<h3>Kriteria</h3>
<?php
for($j=1;$j<=$k;$j++){
	echo "C".$j." = ".$nilai[0][$j]."<br/>";
}
?>
</div>
<br />
<div>
<h3>Rating Kecocokan Setiap Alternatif Pada Setiap Kriteria</h3>
<table border="1" cellspacing="0" cellpadding="10px">
  <tr>
    <td>Sangat Berpengaruh</td>
    <td>3</td>
  </tr>
  <tr>
    <td>Berpengaruh</td>
    <td>2</td>
  </tr>
  <tr>
    <td>Kurang Berpengaruh</td>
    <td>1</td>
  </tr>
</table>
<br />
Untuk lebih jelasnya, rating dapat dilihat pada tabel berikut :<br />
<table width="100%" border="1" cellspacing="0" cellpadding="10px">
  <tr>
    <td>&nbsp;</td>
	<?php
	for($j=1;$j<=$k;$j++){
		echo "<td>".$nilai[0][$j]."</td>";
	}
	?>
  </tr>
  <tr>
    <td>Rekayasa Perangkat Lunak</td>
    <?php
	for($j=1;$j<=$k;$j++){
		echo "<td>".$nilai[1][$j]."</td>";
	}
	?>
  </tr>
  <tr>
    <td>Jaringan</td>
    <?php
	for($j=1;$j<=$k;$j++){
		echo "<td>".$nilai[2][$j]."</td>";
	}
	?>
  </tr>
</table>
<br />
Matriksnya :<br />
<table cellspacing="0" cellpadding="10px">
  <tr>
    <?php
	for($j=1;$j<=$k;$j++){
		echo "<td>".$nilai[1][$j]."</td>";
	}
	?>
  </tr>
  <tr>
    <?php
	for($j=1;$j<=$k;$j++){
		echo "<td>".$nilai[2][$j]."</td>";
	}
	?>
  </tr>
</table>
</div>
<br />
<div>
<h3>Matriks Ternormalisasi</h3>
Diperoleh dari rumus :<br />
<img src="../gambar/normalisasi.png" alt="" width="465" height="101" /><br /><br />
dimana :<br />
<table width="100%" cellspacing="0" cellpadding="10px">
  <tr>
    <td width="3%">r<sub>ij</sub></td>
    <td>= rating kinerja ternormalisasi</td>
  </tr>
  <tr>
    <td>x<sub>ij</sub></td>
    <td>= baris dan kolom dari matriks</td>
  </tr>
  <tr>
    <td>Max<sub>i</sub></td>
    <td>= nilai maksimum dari setiap baris dan kolom</td>
  </tr>
  <tr>
    <td>Min<sub>i</sub></td>
    <td>= nilai minimum dari setiap baris dan kolom</td>
  </tr>
</table><br />
Hasilnya :<br />
<table cellspacing="0" cellpadding="10px">
  <tr>
    <?php
	for($j=1;$j<=$k;$j++){
		echo "<td>".$nilai2[1][$j]."</td>";
	}
	?>
  </tr>
  <tr>
    <?php
	for($j=1;$j<=$k;$j++){
		echo "<td>".$nilai2[2][$j]."</td>";
	}
	?>
  </tr>
</table>
</div>
<br />
<div>
<h3>Rating Nilai</h3>
<table border="1" cellspacing="0" cellpadding="10px">
  <tr>
    <td>Nilai Angka</td>
    <td>Nilai Huruf</td>
    <td>Bobot</td>
  </tr>
  <tr>
    <td>80 - 100</td>
    <td>A</td>
    <td>4</td>
  </tr>
  <tr>
    <td>65 - 79</td>
    <td>B</td>
    <td>3</td>
  </tr>
  <tr>
    <td>55 - 64</td>
    <td>C</td>
    <td>2</td>
  </tr>
  <tr>
    <td>45 - 54</td>
    <td>D</td>
    <td>1</td>
  </tr>
  <tr>
    <td>0 - 44</td>
    <td>E</td>
    <td>0</td>
  </tr>
</table>
</div>
<br />
<div>
<h3>Tabel Nilai Mahasiswa</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="10px">
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
<div>
<h3>Hasil Akhir</h3>
Diperoleh dari rumus :<br />
<img src="../gambar/akhir.png" alt="" width="91" height="54" /><br /><br />
dimana :<br />
<table width="100%" cellspacing="0" cellpadding="10px">
  <tr>
    <td width="3%">v<sub>i</sub></td>
    <td>= rangking untuk setiap alternatif</td>
  </tr>
  <tr>
    <td>w<sub>j</sub></td>
    <td>= nilai bobot dari setiap kriteria</td>
  </tr>
  <tr>
    <td>r<sub>ij</sub></td>
    <td>= nilai rating kinerja ternormalisasi</td>
  </tr>
</table><br />
<a href="awal.php?page=hasil">Lihat Hasil</a><br />
</div>