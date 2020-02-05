<?php

if (isset($_POST["submit"])) {
    require("dbLogin.php");
    $sql = $pdo->prepare("SELECT * FROM user WHERE User_Name = :user ");
    $sql->bindParam(":user", $_POST["uname"]);
    $sql->execute();
    $count = $sql->rowCount();
    if($count == 0)
        //Username ist frei
    {
        if(!empty($_POST["uname"]) && !empty($_POST["psw"]) && !empty($_POST["psw2"])){
            //Username und Passwort wurden eingegeben
        
            if(($_POST["psw"] == $_POST["psw2"]))
            {
                //Passwörter stimmen überein, user anlegen
                $sql = $pdo->prepare("INSERT INTO user (User_Name,User_Pass) VALUES (:user,:psw)");
                $sql->bindParam(":user", $_POST["uname"]);
                $hash = password_hash($_POST["psw"], PASSWORD_BCRYPT);
                $sql->bindParam(":psw", $hash);
                $sql->execute();
                echo "<center><p style='color:#2ecc71;'>Der Account " . $_POST["uname"] . " wurde erstellt!</p></center>";
            }
            else{
                //Passwörter stimmen nicht überein
                echo "<center><p style='color:#ff4133;'>Passwörter stimmen nicht überein!</p></center>";
            }
        }
        else{
            //Nicht alle Felder ausgefüllt
            echo "<center><p style='color:#ff4133;'>Bitte fülle alle Felder aus!</p></center>";
        }
    }
    else{
        //Username ist vergeben
        echo "<center><p style='color:#ff4133;'>Der Benutzername ist bereits vergeben!</p></center>";
    }
}
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrieren</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="LoginStyle.css" rel="stylesheet">
</head>

<body>

    <form class="box" method="post">
        <h1>Registrieren</h1>
        <input type="text" name="uname" placeholder="Benutzername">
        <input type="password" name="psw" placeholder="Passwort">
        <input type="password" name="psw2" placeholder="Passwort wiederholen">
        <input type="submit" name="submit" value="Registrieren">
        <text name="infotext">Du hast bereits einen Account? <a href="Login.php">Log dich ein.</a></text>
        <br><br>
        <text name="infotext"><a href="../index.php">Zurück zur Startseite</a></text>
    </form>

</body>

</html>
