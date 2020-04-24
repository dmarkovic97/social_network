<?php

$server = 'localhost';
$korisnik = 'root';
$baza= 'seminarski';

session_start();
$konekt = new mysqli($server, $korisnik,'',$baza);
if ($konekt->connect_errno)
{
echo "Veza nije uspostavljena";
exit;
}
?>
