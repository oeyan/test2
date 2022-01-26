<content>
<?php
    session_start();
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Update Data</title>
</head>
<body>
<h2> Daftar Mahasiswa Proyek 1</h2>
<center>
    <table border = "1">
    <tr>
        <th>no</th>
        <th> NPM </th>
        <th> Nama Mahasiswa </th>
        <th> NPM </th>
        <th> Nama Mahasiswa </th>
        <th> Dosen pembimbing </th>
        <th> Judul Proyek </th>
        <th>Aksi</th>
    </tr>
    <?php
        $n =1;
        $q = mysqli_query($conn, "select * from data");
        while($f = mysqli_fetch_array($q))
        {
    ?>
    <tr>
        <td><center><?php echo $n;?></center></td>
        <td><center><?php echo $f['npm1']; ?></center></td>
        <td><center><?php echo $f['mahasiswa1']; ?></center></td>
        <td><center><?php echo $f['npm2']; ?></center></td>
        <td><center><?php echo $f['mahasiswa2']; ?></center></td>
        <td><center><?php echo $f['dosen_pembimbing']; ?></center></td>
        <td><center><?php echo $f['judul_proyek']; ?></center></td>
        <td><center><a href="hapus_data.php?id=<?php echo $f['id']; ?>">Hapus</a></center></td>
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
<form action="form_daftar.php" method="post">
<button type="submit"  name="tambah">Tambah</a></button>
    </form>
</center>
</content>
</body>
</html>