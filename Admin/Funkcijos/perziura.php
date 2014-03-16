<?php
/**
 * Created by PhpStorm.
 * User: Linas
 * Date: 14.3.16
 * Time: 23.07
 */
session_start();
$vardas = $_SESSION["galiojantis_vardas"];
$data = $_POST['data'];
$pavadinimas = $_POST['pavadinimas'];
$tekstas = $_POST['tekstas'];

if($_POST['saugoti']){
    echo '<h3 style="margin-left: 15px">Peržiūra</h3>';
    print('<h1 style="text-align: center">'.$pavadinimas.'</h3>
    <p>'.$tekstas.'</p>
<p id="vardas" style="font-size: small; text-align: left; color: blue;">'.$vardas.'</p>');
}
?>