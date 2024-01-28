<script type="text/javascript">
/*--This JavaScript method for Print command--*/
    function PrintDoc() {
        var toPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
/*--This JavaScript method for Print Preview command--*/
    function PrintPreview() {
        var toPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="Print.css" media="screen"/></head><body">')
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
</script>
<form action="" method="post" id="printarea">
<?php
echo $_SESSION['ket'];
$_SESSION['ket']=" ";
?>
<table width="100%" border="1" cellspacing="0" cellpadding="10px" bgcolor="#FFFFFF">
  <tr>
    <td colspan="7">DATA MAHASISWA</td>
  </tr>
  <tr align="center">
    <td>NO</td>
    <td>NIM</td>
    <td>NAMA</td>
    <td>MINAT</td>
    <td>BOBOT RPL</td>
    <td>BOBOT JARINGAN</td>
    <td>HASIL</td>
  </tr>
  <?php
	$no=1;
	$sql=mysqli_query($con,"select * from user inner join peminatan on user.nim=peminatan.nim");
	while($res=mysqli_fetch_array($sql))
	{
		?>
  <tr>
    <td width="5%"><?php echo $no; ?></td>
    <td width="10%"><?php echo $res['nim']; ?></td>
    <td width="20%"><?php echo $res['nama']; ?></td>
    <td width="20%"><?php echo $res['minat']; ?></td>
    <td width="10%" align="center"><?php echo $res['nrpl']; ?></td>
    <td width="10%" align="center"><?php echo $res['njrg']; ?></td>
    <td width="20%"><?php echo $res['hasil']; ?></td>
  </tr>
  <?php
	$no++;
	}
  ?>
</table>
</form>
<form action="" method="post">
<table width="100%" cellspacing="0" cellpadding="10px">
  <tr>
    <td width="85%">&nbsp;</td>
    <td><input type="button" value="Print Preview" class="btn" onclick="PrintPreview()"/></td>
    <td><input type="button" value="Print" class="btn" onclick="PrintDoc()"/></td>
  </tr>
</table>
</form>