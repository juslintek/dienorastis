<?php
/**
 * Created by PhpStorm.
 * User: Linas
 * Date: 14.3.16
 * Time: 15.19
 */
session_start();
if (!$_SESSION["galiojantis_vardas"]) {
// Jei vartotojas neprisijunges gražinti į pagrindinį puslapį
    Header("Location: ../index.php");
}
$vardas = $_SESSION["galiojantis_vardas"];
?>
<html style="height: 100%; width: 100%">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

</head>
<body>
<div id="virsus" style="height: 5%; border-bottom: 5px crimson solid;"></div>
<div id="soninis_meniu" style="height: 80%; width: 15%; border-right: 5px crimson solid;
padding-left: 15px; float: left;">
    <ul>
        <li onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none'">
            <a href="/index.php">Pagrindinis</a>
        </li>
        <li><span id="redaktorius" onmouseover="this.style.textDecoration='underline'; this.style.cursor='hand'"
                  onclick="$('#turinys').load('Funkcijos/redakcija.php')" onmouseout="this.style.textDecoration='none'">
                Redaktorius</span>
        </li>
        <li><span id="sarasas" onmouseover="this.style.textDecoration='underline'; this.style.cursor='hand'"
                  onmouseout="this.style.textDecoration='none'" onclick="$('#turinys').load('Funkcijos/Sarasas.php')">
            Tekstu sarasas</span>
        </li>
        <li onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'"
            style="color: inherit">
            <a href="Funkcijos/atsijungti.php">Atsijungti</a></li>
    </ul>
</div>
<div id="turinys" style="height: 76%; width: 78%; float: left; padding-left: 2%; padding-top: 2%">
    <?php
    session_start();
    $data = $_POST['data'];
    $pavadinimas = $_POST['pavadinimas'];
    $tekstas = $_POST['tekstas'];
    $tekst_duom = '<div style="width: 700px; word-wrap: break-word;">
        <p>' . $data . '</p>
                <h1 style="text-align: center">' . $pavadinimas . '</h3>
    <p>' . $tekstas . '</p>
<p id="vardas" style="font-size: small; text-align: left; color: blue;">' . $vardas . '</p></div>';
    if ($_POST['saugoti']) {
        echo '<h3 style="margin-left: 15px">Peržiūra</h3>';
        print $tekst_duom;
        $checksum = crc32($pavadinimas);
        $irasas = "../Duomenys/Tekstai/$vardas/" . $data . "_" . $checksum . ".txt";
        echo $irasas . '<br/>';
        file_get_contents($irasas);
        if (!file_exists($irasas)) {
             $fo = fopen($irasas, 'c+') or die("negalima atverti įrašo");
            file_put_contents($fo, $tekst_duom);
            echo "Jūsų duomenys sėkmingai įvesti.";
            fclose($fo);
        } else {
            echo 'Atleiskite, bet deje toks įrašas jau egzistuoja';
        }
    }
    ?>
</div>
<div id="apacia" style="border-top: 5px crimson solid; height: 20%; clear: both;"></div>
</body>
</html>