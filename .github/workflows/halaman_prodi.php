<!DOCTYPE html>
<html>
<head>
    <title>Website Bimbingan Proyek 1</title>
    <link rel="stylesheet" type="text/css" href="styleawalprodi.css">
</head>
<body>

  <header>
    <h1>Website Bimbingan Proyek 1</h1>
  </header>
  <section>
  <nav>
    <a href="halaman_prodi.php"><img src="home_logo.png"></a> 
    <?php include "menu_prodi.php";?>
    </nav>
    <?php
      if (isset($_GET['halaman'])) {
        $halaman = $_GET['halaman'];
        if ($halaman == "halaman_update") {
          include("halaman_update.php");
        }else if ($halaman == "halaman_daftar_mahasiswa") {
            include("halaman_daftar_mahasiswa.php");
        }else if ($halaman == "halaman_dokumen") {
            include("halaman_dokumen.php");}   
        else {
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