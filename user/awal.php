<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Pemilihan Peminatan</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	session_start();
	include '../koneksi.php';
	if(empty($_SESSION['username']) && empty($_SESSION['password'])){
		echo"anda bukan admin<br>";
		echo"<a href='index.php'>LOGIN LAGI</a>";
	}else{
		$nim=$_SESSION["nim"];
		$nama=$_SESSION["nama"];
?>

<table width="100%" align="center" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
  <tr>
    <td><table width="100%" border="1" height="100px" cellspacing="0">
      <tr>
        <td><img src="../gambar/header.png" width="100%" height="100" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="10">
      <tr>
        <td width="20%"><a href="awal.php">HOME</a></td>
        <td width="20%"><a href="awal.php?page=input_nilai">NILAI</a></td>
        <td width="20%"><a href="awal.php?page=pembobotan">PEMBOBOTAN</a></td>
        <td width="20%"><a href="awal.php?page=hasil">HASIL</a></td>
        <td width="20%"><a href="awal.php?page=logout">LOGOUT</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" height="500pt" border="1" cellspacing="0" cellpadding="10px">
      <tr>
        <td align="left" valign="top">
		<?php
    	if($_GET['page']=='input_nilai'){
			include_once "input_nilai.php";
		}else if($_GET['page']=='pembobotan'){
			include_once "pembobotan.php";
		}else if($_GET['page']=='hasil'){
			include_once "hasil.php";
		}else if($_GET['page']=='logout'){
			include_once "../logout.php";
		}else{
		?>
        <h2 align="center">SELAMAT DATANG
        <?php
		echo strtoupper($nama);
		?>
        </h2>
        <h2 align="center">SILAHKAN PILIH MENU DIATAS UNTUK MELANJUTKAN</h2>
        <?php
		}
		?>
		</td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
	}
?>
</body>
</html>