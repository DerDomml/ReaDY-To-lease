<?php
session_start();
if(isset($_SESSION['username']))
{
    header("Location: ../index.php");
}

if (isset($_POST["submit"])) {
    require("dbLogin.php");
    $sql = $pdo->prepare("SELECT * FROM user WHERE User_Name = :user ");
    $sql->bindParam(":user", $_POST["uname"]);
    $sql->execute();
    $count = $sql->rowCount();
    if($count == 1)
        //Username gefunden
    {
        $row = $sql->fetch();
        if(password_verify($_POST["psw"], $row['User_Pass'])){
            $_SESSION["username"] = $row["User_Name"];
            //User ist eingeloggt
            echo "<center><p style='color:#2ecc71;'>Hallo, " . $row['User_Name'] . "! Du wurdest erfolgreich eingeloggt!</p></center>";
            header("Location: ../index.php");
        }
        else{
            //Passwort falsch
            echo "<center><p style='color:#ff4133;'>Falsches Passwort!</p></center>";
        }
    }
    else{
        //Username nicht vorhanden
        echo "<center><p style='color:#ff4133;'>Username ist nicht vorhanden!</p></center>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Einloggen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="LoginStyle.css" rel="stylesheet">
</head>

<body>

    <form class="box" method="post">
        <h1>Einloggen</h1>
        <input type="text" name="uname" placeholder="Username">
        <input type="password" name="psw" placeholder="Password">
        <input type="submit" name="submit" value="Login">
        <text name="infotext">Du hast noch keinen Account? <a href="Register.php">Registrier dich.</a></text>
        <br><br>
        <text name="infotext"><a href="../index.php">Zurück zur Startseite</a></text>
    </form>

</body>

</html>
