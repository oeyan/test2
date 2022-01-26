<?php
error_reporting(0);
include("koneksi.php");
if(isset($_POST['cari'])){
    $cari =$_POST['keyword'];
    $q = mysqli_query($conn, "select * from upload where judul LIKE '%$cari%'");
    $cek = mysqli_num_rows($q);
}   else{
    $q = mysqli_query($conn, "select * from upload ");
}
?>
<content>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Pencarian Judul</title>
</head>
<body>
<center>
<h1>Halaman Pencarian Judul</h1>
<form action="" method = "post">
    <input type="text" name="keyword" placeholder="Masukan judul..." size="40" autofocus autocomplete="0">
    <button type="submit" name="cari" class="submit">Cari</button>
</form>
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
    </tr>
    
    <?php if ($cek=="0") {?>
        <tr>
            <td colspan="7" style="color: red; text-align:center;"> Data tidak ditemukan</td>
    </tr>
    <?php }?>

    <?php
        $i =1;
        while($f = mysqli_fetch_array($q))
        {
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $f['judul']; ?></td>
        <td><?php echo $f['mahasiswa1']; ?></td>
        <td><?php echo $f['mahasiswa2']; ?></td>
        <td><?php echo $f['dosen_pembimbing']; ?></td>
        <td><?php echo $f['abstrak']; ?></td>
        <td><a href="download.php?file=<?php echo $f['nama_file'];?>">File</a></td>
    <?php
    $i++;
    }
    ?>
</table>
</center>
</body>
</html>
<content>