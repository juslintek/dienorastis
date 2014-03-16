<?php
/**
 * Created by PhpStorm.
 * User: Linas
 * Date: 14.3.16
 * Time: 14.27
 */
?>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Registracijos puslapis</title>
    </head>
    <body>
    <form method="post" action="registruotis.php">
        Įveskite vardą:
        <input type="text" name="vardas"/>
        <br/>
        <br/>
        Įveskite slaptažodį:
        <input type="password" name="slaptazodis"/>
        <br/>
        <br/>
        <input type="submit" value="Registruotis" name="patvirtinti"/>
        <a href="/index.php" ><input type="button" value="Pagrindinis" /></a>
    </form>
    </body>
    </html>
<?php
if (isset($_POST['patvirtinti'])) {
    $vardas = $_POST['vardas'];
    $slaptazodis = crypt($_POST['slaptazodis'], '$5$sl4pt444418lk#@4');
    $byla = file_get_contents("Duomenys/Vartotojai.txt");
    $duomenys = "$vardas||$slaptazodis";
    if (!strstr($byla, "$duomenys")) {
        $byla = "Duomenys/Vartotojai.txt";
        $fh = fopen($byla, 'a') or die("negalima atverti bylos");
        fwrite($fh, "$duomenys\n");
        echo "Jūsų duomenys sėkmingai įvesti.";
        fclose($fh);
        mkdir("Admin/Tekstai/$vardas", 0777, true);
        umask(0);
    } else {
        echo "Atleiskite bet: $vardas vardas jau egzistuoja. Prašau naudikite kitą vardą.";
    }
}
?>