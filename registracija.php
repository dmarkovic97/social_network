<?php

$greske = array();

if(isset($_POST['reg_dugme'])){

  $ime = trim($_POST['reg_ime']);
  $ime = ucfirst(strtolower($ime));
  $_SESSION['reg_ime'] = $ime;

  $prezime = trim($_POST['reg_prezime']);
  $prezime = ucfirst(strtolower($prezime));
  $_SESSION['reg_prezime'] = $prezime;


  $email = trim($_POST['reg_email']);
  $email = ucfirst(strtolower($email));
  $_SESSION['reg_email'] = $email;

  $korisnicko_ime= trim($_POST['reg_kor_ime']);
  $korisnicko_ime = ucfirst(strtolower($korisnicko_ime));
  $korisnicko_ime_provera = $konekt->query("select korisnicko_ime from korisnici where korisnicko_ime = '$korisnicko_ime'");
  $broj_redova_kor_ime = $korisnicko_ime_provera->num_rows;
  $_SESSION['reg_kor_ime'] = $korisnicko_ime;


  $sifra = $_POST['reg_sifra'];
  $sifra2  = ['reg_sifra2'];

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
  $email = filter_var($email,FILTER_VALIDATE_EMAIL);

  $email_provera = $konekt->query("select email from korisnici where email ='$email'");
  $broj_redova = $email_provera->num_rows;
  if($broj_redova > 0){
    array_push($greske,"Email u upotrebi.<br>");
  }


}
else {
  array_push($greske,"Pogresan format.<br>");
}

if(strlen($ime) >25 || strlen($ime) <2){
  array_push($greske,"Ime mora biti izmedju 2 i 25 karaktera.<br>");
}

if(strlen($prezime) >25 || strlen($prezime) <2){
  array_push($greske,"Prezime mora biti izmedju 2 i 30 karaktera.<br>");
}

if($broj_redova_kor_ime != 0){
  array_push($greske, "Korisnicko ime je vec u upotrebi.<br>");
}

if($sifra2 != $sifra2){
  array_push($greske,"Sifre se ne poklapaju.<br>");
}
else {
  if(preg_match('/[^A-Za-z0-9]/',$sifra)){
    array_push($greske,"Sifra moze da sadrzi samo mala i velika slova i brojeve.<br>");
  }
}

if(strlen($sifra)> 30 || strlen($sifra)<5){
  array_push($greske,"Sifra mora biti izmedju 5 i 30 karaktera.<br>");
}

if(empty($greske)){
  $sifra = md5($sifra);

  $profilna = "stvari/slike/s.jpeg";

$upit = $konekt->query("insert into korisnici values ('','$ime', '$prezime', '$korisnicko_ime', '$email', '$sifra', '$profilna', '0', '0')");

array_push($greske, "<span style='color: #DF0101;'>Registracija uspesna!</span><br>");

$_SESSION['reg_ime'] = "";
$_SESSION['reg_prezime'] = "";
$_SESSION['reg_email'] = "";
$_SESSION['reg_kor_ime'] = "";

}
}
?>
