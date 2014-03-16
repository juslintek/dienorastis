<?php
/**
 * Created by PhpStorm.
 * User: Linas
 * Date: 14.3.15
 * Time: 20.07
 */
?>
<html style="height: 100%; width: 100%;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        #meniu ul {
            margin-left: 0;
            padding-left: 0;
            display: inline;
        } #meniu ul li {
              margin-left: 0;
              margin-bottom: 0;
              padding: 2px 15px 5px;
              border: 1px solid #000;
              list-style: none;
              display: inline;
          }


        #meniu ul li.here {
            border-bottom: 1px solid #ffc;
            list-style: none;
            display: inline;
        }
    </style>
</head>
<body>
<div id="wraperis" style="margin-left:auto; margin-right:auto; width: 960px; height: 100%; border-left: 5px grey ridge;
border-right: 5px grey groove;">
<div id="meniu" style="margin-left:auto; margin-right:auto; width: 700px;">
    <ul>
        <li><a href="index.php">Pagrindinis</a></li>
        <li><a href="registruotis.php" >Registruotis</a></li>
        <li><a href="prisijungti.php" >Prisijungti</a></li>
        <?php
            session_start();
            $vardas = $_SESSION["galiojantis_vardas"];
            if ($_SESSION["galiojantis_vardas"])
            {
            // Jei vartotojas neprisijungęs, nerodyti atsijungti ir eiti į vartotojo meniu dialogų
            print('<li><a href="Admin/index.php">Eiti i '.$vardas.' vartotojo paskyrą</a></li>
            <li><a href="Admin/Funkcijos/atsijungti.php" >Atsijungti</a></li>');
            }
        ?>
        </ul>
</div>
    <p><h1 style="text-align: center">Šiandien mūsų nariai parašė:</h1></p>
<div id="turinys">

</div>
</div>
</body>
</html>