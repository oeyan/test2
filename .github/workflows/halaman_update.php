<content>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<center><h1>Data Pencarian</h1></center>
<form action="form_tambah_pencarian.php" method="post">
<button type="submit"  name="tambah">Tambah</button>
<center>
<br>
<table border = "1">
    <tr>
        <th> No </th>
        <th> Judul </th>
        <th> Pembuat 1 </th>
        <th> Pembuat 2 </th>
        <th> Dosen pembimbing </th>
        <th> Abstrak </th>
        <th> File </th>
        <th>Aksi</th>
    </tr>
    <?php
    include("koneksi.php");
        $n =1;
        $q = mysqli_query($conn, "select * from upload");
        while($f = mysqli_fetch_array($q))
        {
    ?>
    <tr>
        <td><center><?php echo $n;?></center></td>
        <td><center><?php echo $f['judul']; ?></center></td>
        <td><center><?php echo $f['mahasiswa1']; ?></center></td>
        <td><center><?php echo $f['mahasiswa2']; ?></center></td>
        <td><center><?php echo $f['dosen_pembimbing']; ?></center></td>
        <td><center><?php echo $f['abstrak']; ?></center></td>
        <td><center><a href="download.php?file=<?php echo $f['nama_file'];?>">File</a></center></td>
        <td>
	    <a href="hapus.php?id=<?php echo $f['id']; ?>">Hapus</a></td>
	</tr>
	<?php
	$n++;
	?>
    </tr>
    <?php
     }
    ?>
</table>
</center>
</body>
</html>
</content>