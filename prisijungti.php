<?php
/**
 * Created by PhpStorm.
 * User: Linas
 * Date: 14.3.16
 * Time: 14.27
 */
session_start();
// Ši dalis paruošia jungimąsi į duomenų failą, sudaro sesiją
//(kad nereiktu sudaryti naujo susijungimo atnaujinus puslapį).
if ($_SESSION["galiojantis_vardas"]) {
    // vartotojas neprisijungęs nukreipti į prisijungimo puslapį
    Header("Location: Admin/index.php");
}
// yra parinktas.
if (isset($_POST['patvirtinti'])) {
    $vardas = $_POST['vardas'];
    $slaptazodis = crypt($_POST['slaptazodis'], '$5$sl4pt444418lk#@4');
    $byla = file_get_contents("Duomenys/Vartotojai.txt");
    if (strstr($byla, "$vardas||$slaptazodis")) {
        $_SESSION["galiojantis_vardas"] = $_POST["vardas"];
        $_SESSION["galiojantis_laikas"] = time();
        // Nukreipti į nario puslapį
        Header("Location: Admin/pasisveikinimas.php");
    } else {
        // Prisijungimas nepavyko
        print '<script> alert ("Atleiskite! Jūs įvedėte negaliojantį vartotojo vardą ar slaptažodį."); window.location="prisijungti.php"; </script>';
    }
} else {
    echo '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prisijungimo puslapis.</title>
</head>
<body>
<form method="post" action="prisijungti.php" >
Įveskite vartotojo vardą:
<input type="text" name="vardas" />
<br/>
<br/>
Įveskite slaptažodį:
<input type="password" name="slaptazodis" />
<br/>
<br/>
<input type="submit" value="Prisijungti" name="patvirtinti"/>
<a href="/index.php" ><input type="button" value="Pagrindinis" /></a>
</form>
</body>
</html>';
}
?>