<?php
/**
 * Created by PhpStorm.
 * User: Linas
 * Date: 14.3.15
 * Time: 20.36
 */
session_start();
$vardas = $_SESSION["galiojantis_vardas"];
?>
<form action="index.php" method="post">
    <div>
        <label for="data">Data: </label>
        <input type="date" name="data">
        <label for="pavadinimas">Pavadinimas: </label>
        <input type="text" name="pavadinimas"/><br/><br/>
    </div>
    <div><textarea name="tekstas" style="width: 50%; height: 40%;"></textarea></div>
    <p><label for="autorius">Autorius: </label>
        <input type="text" value="<?php echo "$vardas"; ?>" name="autorius"/>
        <input type="submit" value="Išsaugoti" name="saugoti"></p>
</form>
