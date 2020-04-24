<?php
require 'konekcija.php';
require 'registracija.php';
require 'log.php';

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Davidov seminarski</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>

    <div class="card bg-dark text-white">
  <img src="stvari/slike/sofro.jpg" class="card-img" alt="...">
  <div class="card-img-overlay">

    <div class="card text-primary">
      <div class="card-body">
        <h5 class="card-title">Sofronet</h5>
        <p class="card-text">Drustvena mreza inspirisana popularnim crtanim junakom.</p>
      </div>
    </div>

    <form action="reg.php" method="post" class="form-inline">
      <div class="form-group mb-2">
      <input type="text" class="form-control" name="log_kor_ime" placeholder="Korisnicko ime" value = "<?php if(isset($_SESSION['reg_kor_ime'])){echo $_SESSION['reg_kor_ime'];}?>" required >
    </div>
      <div class="form-group mx-sm-3 mb-2">
        <input type="password" class="form-control" name="log_sifra" placeholder="Sifra">
        </div>
      <input type="submit" class="btn btn-primary mb-2" name="log_dugme" value="Prijavi se"><br><br>
<?php if(in_array("Greska prilikom unosa korisnickog imena ili sifre.<br>",$greske)) echo "Greska prilikom unosa korisnickog imena ili sifre.<br>";?>
</form>

    <form action="reg.php" method="post">
      <input type="text" name="reg_ime" placeholder="Ime" value = "<?php if(isset($_SESSION['reg_ime'])){echo $_SESSION['reg_ime'];}?>" required><br>
      <?php if(in_array("Ime mora biti izmedju 2 i 25 karaktera.<br>",$greske)) echo "Ime mora biti izmedju 2 i 25 karaktera.<br>" ?>

      <input type="text" name="reg_prezime" placeholder="Prezime" value = "<?php if(isset($_SESSION['reg_prezime'])){echo $_SESSION['reg_prezime'];}?>" required><br>
      <?php if(in_array("Prezime mora biti izmedju 2 i 30 karaktera.<br>",$greske)) echo "Prezime mora biti izmedju 2 i 30 karaktera.<br>"; ?>

      <input type="text" name="reg_kor_ime" placeholder="Korisnicko ime" value = "<?php if(isset($_SESSION['reg_kor_ime'])){echo $_SESSION['reg_kor_ime'];}?>" required><br>
      <?php if(in_array("Korisnicko ime je vec u upotrebi.<br>",$greske)) echo "Korisnicko ime je vec u upotrebi.<br>"; ?>

      <input type="email" name="reg_email" placeholder="Email" value = "<?php if(isset($_SESSION['reg_email'])){echo $_SESSION['reg_email'];}?>" required><br>
      <?php if(in_array("Email u upotrebi.<br>",$greske)) echo "Email u upotrebi.<br>";
      else if(in_array("Pogresan format.<br>",$greske)) echo "Pogresan format.<br>";?>

      <input type="password" name="reg_sifra" placeholder="Sifra" required><br>
      <input type="password" name="reg_sifra2" placeholder="Potvrdi sifru" required><br>
      <?php if(in_array("Sifre se ne poklapaju.<br>",$greske)) echo "Sifre se ne poklapaju.<br>";
      else if(in_array("Sifra moze da sadrzi samo mala i velika slova i brojeve.<br>",$greske)) echo "Sifra moze da sadrzi samo mala i velika slova i brojeve.<br>";
      else if(in_array("Sifra mora biti izmedju 5 i 30 karaktera.<br>",$greske)) echo "Sifra mora biti izmedju 5 i 30 karaktera.<br>";?>

      <input type="submit" class="btn btn-primary mb-2" name="reg_dugme" value="Registruj se"><br>
      <?php if(in_array("<span style='color: #DF0101;'>Registracija uspesna!</span><br>",$greske)) echo "<span style='color: #DF0101;'>Registracija uspesna!</span><br>";?>

    </form>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
