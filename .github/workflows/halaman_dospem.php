<!DOCTYPE html>
<html>
<head>
    <title>Website Bimbingan Proyek 1</title>
    <link rel="stylesheet" type="text/css" href="styleawaldospem.css"> 
</head>
<body>
  <header>
  <h2>Website Bimbingan Proyek 1</h2>
  </header>
  <section>
  <nav>
  <a href="halaman_dospem.php"><img src="home_logo.png"></a> 
    <?php include "menu_dospem.php";?>
    </nav>
      <?php
      if (isset($_GET['halaman'])) {
        $halaman = $_GET['halaman'];
        if ($halaman == "lihat_laporan") {
          include("lihat_laporan.php");
        } else if ($halaman == "cari_judul") {
          include("cari_judul.php");
        } else {
      ?>
          <content>
            <div class="text_tengah"></div>
          </content>
        <?php
        }
      } else {
        ?>
        <content>
          <div class="text_tengah"></div>
        </content>
      <?php
      }
      ?>
    </article>
  </section>
</body>
</html>