<?php
include"koneksi.php";
$user=$_POST['username'];
$pass=$_POST['password'];

$sql=mysqli_query($con,"select * from user where nim='$user' AND password='$pass'");
$row=mysqli_num_rows($sql);
$r=mysqli_fetch_array($sql);

$nim=$r['nim'];
$nama=$r['nama'];
$password=$r['password'];
$status=$r['status'];

if($row>0){
	session_start();
	$_SESSION['nim']=$nim;
	$_SESSION['nama']=$nama;
	$_SESSION['password']=$password;
	
	if($status=="admin"){
		header('location:admin\admin.php');
		die();
	}else if($status=="mahasiswa"){
		header('location:user\awal.php');
		die();
	}
}else{
	echo"<center>Username atau Password salah<br>";
	echo"<a href='index.php'>Coba Lagi</a></center>";
}

?>