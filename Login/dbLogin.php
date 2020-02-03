<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "autoleasing1";



try {
    $pdo = new PDO('mysql:host=' . $host, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
} catch (PDOException $e) {
    echo 'Verbindung fehlgeschlagen: ' . $e->getMessage();
}

$sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME='".$dbname."'";
$res = $pdo->query($sql);

if($res->rowCount() == 1)
{
    //Datenbank existiert, sie muss nur ausgewählt werden:
    $sql = "USE autoleasing1";
    $res = $pdo->query($sql);
}
else {
    //Datenbank existiert nicht, sie muss erstellt und ausgewählt werden:
    $sql = "create database if not exists autoleasing1;";
    $pdo->query($sql);
    
    $sql = "USE autoleasing1";
    $res = $pdo->query($sql);
    
    //Überprüfe, ob Tabelle "User" bereits existiert:
    
    $sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='autoleasing1' AND TABLE_NAME ='User'";
    $res = $pdo->query($sql);
}
 if($res->rowCount() == 0){
     //Die Tabelle existiert nicht, also wird sie erstellt:
 
     $sql = "
         CREATE TABLE User (
         User_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
         User_Name VARCHAR( 255 ) NOT NULL ,
         User_Pass VARCHAR( 255 ) NOT NULL
     );";
     $res = $pdo->query($sql);
     
     $hash = password_hash("admin", PASSWORD_BCRYPT);
     $sql = "
         INSERT IGNORE INTO `User`
         (
         `User_ID` , `User_Name` , `User_Pass`
         )
         VALUES
         (
         '1' , 'admin', '$hash'
     );";
     
     $res = $pdo->query($sql);
 }
?>
