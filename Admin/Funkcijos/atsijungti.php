<?php
/**
 * Created by PhpStorm.
 * User: Linas
 * Date: 14.3.16
 * Time: 15.25
 */
session_start();
session_unset();
session_destroy();
// Atsijungia, grąžina į pradinį puslapį.
print '<script> alert ("Jūs sėkmingai atsijungėte.");
window.top.location.href = "/index.php"; </script>';
?>