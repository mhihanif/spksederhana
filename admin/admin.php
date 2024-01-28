<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Pemilihan Peminatan</title>
<style>
a:link {
	color:#FFF;
}
a:visited {
	color:#FFF;
}
a:hover {
    color:#FF0;
}
.adheader{
	background-color:#00F;
	font-family:"Comic Sans MS", cursive;
	font-size:30px;
	color:#FFF;
	text-align:left;
}
</style>
</head>

<body>
<?php
	session_start();
	include "..\koneksi.php";
	$nim=$_SESSION['nim'];
	$nama=$_SESSION['nama'];
	$password=$_SESSION['password'];
	
	if(empty($nim) && empty($password)){
		echo"Username dan Password Kosong<br>";
		echo"<a href='index.php'>Coba Lagi</a>";
	}else{
	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr class="adheader">
        <td><a href="admin.php"><img src="..\gambar\header.png" width="100%" height="62" /></a></td>
        <td width="15%"><center><a href="admin.php?page=logout">LOGOUT</a></center></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" height="800pt" border="0" cellspacing="0" cellpadding="0" bgcolor="#ECF0F5">
      <tr>
        <td width="10%" valign="top"><table width="100%" height="100%" border="1" cellspacing="0" cellpadding="10px" bgcolor="#000000">
          <tr>
            <td height="20px"><a href="admin.php?page=user">USER</a></td>
          </tr>
          <tr>
            <td height="20px"><a href="admin.php?page=matakuliah">MATAKULIAH</a></td>
          </tr>
          <tr>
            <td height="20px"><a href="admin.php?page=bobot">BOBOT</a></td>
          </tr>
          <tr>
            <td height="20px"><a href="admin.php?page=report">REPORT</a></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td valign="top"><table width="100%" height="100%" border="1" cellspacing="0" cellpadding="10px">
          <tr>
            <td valign="top"><?php
    	if($_GET['page']=='user'){
			include_once "user.php";
		}else if($_GET['page']=='detailuser'){
			include_once "detailuser.php";
		}else if($_GET['page']=='matakuliah'){
			include_once "matakuliah.php";
		}else if($_GET['page']=='bobot'){
			include_once "bobot.php";
			}else if($_GET['page']=='report'){
			include_once "report.php";
		}else if($_GET['page']=='logout'){
			include_once "../logout.php";
		}else{
		?>
        <h2 align="center">SELAMAT DATANG
        <?php
		echo strtoupper($nama);
		?>
        </h2>
        <h2 align="center">SILAHKAN PILIH MENU DISAMPING UNTUK MELANJUTKAN</h2>
        <?php
		}
		?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
	}
?>
</body>
</html>