<!DOCTYPE html>
<html>
<head>
    <title>Website Bimbingan Proyek 1</title>
    <link rel="stylesheet" type="text/css" href="style_awalmahasiswa.css">
</head>

<body>

  <header>
  
  <h2>Website Bimbingan Proyek 1</h2>
  </header>
  <section>
  
  <nav>
    <a href="halaman_mahasiswa.php"><img src="home_logo.png"></a> 
    <?php include "menu_mahasiswa.php";?>
    </nav>
      <?php
      if (isset($_GET['halaman'])) {
        $halaman = $_GET['halaman'];
        if ($halaman == "kumpul_laporan") {
          include("kumpul_laporan.php");
        } else if ($halaman == "cari_judul") {
          include("cari_judul.php");
        }
        
        else {
      ?>
        <?php
        }
      } else {
        ?>

        <content>
        <center>
        <h1>Daftar Mahasiswa dan Dosen Bimbingan</h1>
        <table border = "1">
    <tr>
        <th>no</th>
        <th> NPM </th>
        <th> Nama Mahasiswa </th>
        <th> NPM </th>
        <th> Nama Mahasiswa </th>
        <th> Dosen pembimbing </th>
        <th> Judul Proyek </th>
    </tr>
    <?php
        include ("koneksi.php");
        $n =1;
        $q = mysqli_query($conn, "select * from data");
        while($f = mysqli_fetch_array($q))
        {
    ?>
    <tr>
        <td><?php echo $n;?></td>
        <td><center><?php echo $f['npm1']; ?></center></td>
        <td><center><?php echo $f['mahasiswa1']; ?></center></td>
        <td><center><?php echo $f['npm2']; ?></center></td>
        <td><center><?php echo $f['mahasiswa2']; ?></center></td>
        <td><center><?php echo $f['dosen_pembimbing']; ?></center></td>
        <td><center><?php echo $f['judul_proyek']; ?></center></td>
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
    <hr>
    <h1>Dokumen Proyek</h1>
    <table border = "1">
    <tr>
        <th>no</th>
        <th> Nama Dokumen </th>
        <th> Download Dokumen </th>
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
        
        </content>
      <?php
      }
      ?>
    </article>
  </section>
</body>
</html>