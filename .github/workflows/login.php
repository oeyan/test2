<!DOCTYPE html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style_login.css">
</head>
<body>
    <div id="main">
        <img src=profil.png>
        <h1>Silahkan Login</h1>
    
    <form action="cek_login.php" method="post">
        <input type="text" placeholder="username" name="user" autofocus autocomplete="0"><br><br>
        <input type="password" placeholder="password" name="pass"><br><br>
        <button onclick="" type="submit" name="login" value="LOGIN" class="button">Login </button>
    </form>
</div>
<?php
    if(isset($_GET['pesan'])){
    if($_GET['pesan']=="gagal"){
    echo "<div class='alert'>Username dan Password Salah !</div>";
  }
 }
 ?>
</body>
</html>