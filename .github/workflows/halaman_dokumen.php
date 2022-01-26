<content>
<?php
    session_start();
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Input Dokumen</title>
</head>
<body>
<center>
<h2>Dokumen Proyek</h2>
    <table border = "1">
    <tr>
        <th>no</th>
        <th> Nama Dokumen </th>
        <th> Download Dokumen </th>
        <th>Aksi</th>
    </tr>
    <?php
        $n =1;
        $q = mysqli_query($conn, "select * from dokumen");
        while($f = mysqli_fetch_array($q))
        {
    ?>
    <tr>
        <td><center><?php echo $n;?></center></td>
        <td><center><?php echo $f['nama_dokumen']; ?></center></td>
        <td><center><a href="download_dokumen.php?file=<?php echo $f['nama_file'];?>">Download Dokumen</a></center></td>
        <td><a href="hapus_dokumen.php?id=<?php echo $f['id']; ?>">Hapus</a></td>
	</tr>
	<?php
	$n++;
	?>
    </tr>
    <?php
     }
    ?>
</table>
<br>
<form action="form_dokumen.php" method="post">
<button type="submit"  name="tambah">Tambah Dokumen</a></button>
</form>
</center>
</content>
</body>
</html>