<?php

if(isset($_POST['log_dugme'])){
  $korisnicko_ime = $_POST['log_kor_ime'];

  $_SESSION['log_kor_ime']= $korisnicko_ime;
  $sifra = md5($_POST['log_sifra']);
  $provera_baze = $konekt->query("select * from korisnici where korisnicko_ime = '$korisnicko_ime' and sifra = '$sifra'");
  $broj_redova_provera = $provera_baze->num_rows;

  if($broj_redova_provera == 1){
  header('Location: indeks.php');
  exit();
  }

else {
  array_push($greske,"Greska prilikom unosa korisnickog imena ili sifre.<br>");
}
}
?>
