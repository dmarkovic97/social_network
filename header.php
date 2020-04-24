<?php
require 'konekcija.php';

if(isset($_SESSION['log_kor_ime'])){
  $ulogovan= $_SESSION['log_kor_ime'];
  $detalji = $konekt->query("select * from korisnici where korisnicko_ime ='$ulogovan'");
  $korisnik = $detalji->fetch_assoc();
}

else {
header('Location: reg.php');
}

?>

<html>
  <head>
    <title>Davidov seminarski</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </head>
  <body style="background-color:powderblue;">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand">Sofronet</a>
  <form class="form-inline">
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"> <?php echo $korisnik['ime']; ?></button>
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Pocetna</button>
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Poruke</button>
  </form>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Pretraga" aria-label="Search">
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Pretraga</button>
  </form>
</nav>
