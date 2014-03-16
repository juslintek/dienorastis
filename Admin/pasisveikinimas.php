<?php
/**
 * Created by PhpStorm.
 * User: Linas
 * Date: 14.3.16
 * Time: 09.26
 */
session_start();
if (!$_SESSION["galiojantis_vardas"])
{
// User not logged in, redirect to login page
    Header("Location: ../prisijungti.php");
}
$vardas = $_SESSION["galiojantis_vardas"];
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script language="javascript">
        setInterval(function() {
            var timer = $('span').html();
            if(timer!="0"){
                timer -= 1;
                if (timer == 0) {
                    window.location="index.php";
                }
                else if (timer < 5 && length.timer != 1);
                $('span').html(timer);
            }
        }, 1000);
    </script>
</head>
<body onload="setInterval()";>

<div>
    <p>Sveiki atvykę <?php echo $vardas; ?>.<br/>Jūs sėkmingai prisijungėte.</p>
    <p>Už <span>5</span> sekundžių būsite nukreiptas į valdymo puslapį</p>
</div>

</body>
</html>