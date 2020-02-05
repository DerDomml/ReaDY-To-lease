<?php
require("Login\dbLogin.php");

$dbhost = "localhost";
$dbname = "autoleasing1";
$dbuser = "root";
$dbpassword = "";

try{
    $pdo = new PDO('mysql:host=' . $dbhost, $dbuser, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    
}catch (PDOException $e) {
    echo 'Verbindung fehlgeschlagen: ' . $e->getMessage();
}
$sql="CREATE DATABASE IF NOT EXISTS autoleasing1;";
$res=$pdo->query($sql);

$sql= "USE autoleasing1;";
$res=$pdo->query($sql);

//////////////// Table Modelldetails /////////////////

$sql= "DROP TABLE IF EXISTS Modelldetails;";
$res=$pdo->query($sql);

$sql = "
    CREATE TABLE Modelldetails (
    Modellbezeichnung VARCHAR ( 20 ) NOT NULL PRIMARY KEY,
    Auto_ID INT ( 10 ) NOT NULL,
    Kraftstoff VARCHAR( 8 ) NOT NULL,
    Leistung VARCHAR( 20 ) NOT NULL,
    Fahrzeugtyp VARCHAR( 20 )NOT NULL,
    Getriebe VARCHAR( 15 ) NOT NULL,
    Anzahl_der_Tueren VARCHAR ( 4 ) NOT NULL,
    Farbe VARCHAR( 10 ) NOT NULL,
    PreisProMonat VARCHAR ( 10 ) NOT NULL
    );";
$res = $pdo->query($sql);

//////////////// Table Fahrzeuge /////////////////

$sql= "DROP TABLE IF EXISTS Fahrzeuge;";
$res=$pdo->query($sql);

$sql = "
    CREATE TABLE Fahrzeuge (
    Auto_ID INT ( 20 ) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Automarke VARCHAR( 30 ) NOT NULL ,
    Modellbezeichnung VARCHAR( 20 ) NOT NULL ,
    Verfuegbar VARCHAR( 5 )NOT NULL,
    Bildadresse VARCHAR(150),
    CONSTRAINT FK_Fahrzeuge_Modelle FOREIGN KEY (Modellbezeichnung) REFERENCES Modelldetails (Modellbezeichnung)
    );";
$res = $pdo->query($sql);

//////////////// Table Aufträge /////////////////
//$sql= "DROP TABLE IF EXISTS Auftraege;";
//$res=$pdo->query($sql);

$sql = "
    CREATE TABLE Auftraege (
    Auftrag_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Auto_ID INT ( 20 ) NOT NULL,
    Kunden_ID INT NOT NULL,
    Buchungsdatum DATE NOT NULL,
    Laufzeit VARCHAR ( 20 ) NOT NULL,
    Abgabedatum DATE NOT NULL,
    CONSTRAINT FK_Auftraege_Fahrzeuge FOREIGN KEY (Auto_ID) REFERENCES Fahrzeuge (Auto_ID),
    CONSTRAINT FK_Auftraege_User FOREIGN KEY (Kunden_ID) REFERENCES User (User_ID)
    );";
$res = $pdo->query($sql);


//Tabelle Fahrzeuge befüllen
$sql = "
  INSERT IGNORE INTO `Fahrzeuge`
  ( 
  `Auto_ID` , `Automarke` , `Modellbezeichnung` , `Verfuegbar`,`Bildadresse`
  ) 
  VALUES
  (
  '1' , 'Volkswagen', 'PoloGTI', 'Ja', 'AutoBilder/PoloGti-rot.png'
  );";
$res = $pdo->query($sql);


$sql = "
  INSERT IGNORE INTO `Fahrzeuge`
  ( 
`Auto_ID` , `Automarke` , `Modellbezeichnung` , `Verfuegbar`,`Bildadresse`  ) 
  VALUES
  (
  '2' , 'Audi', 'A3', 'Ja', 'AutoBilder/audi-a3-weiß.png'
  );";
$res = $pdo->query($sql);


$sql = "
  INSERT IGNORE INTO `Fahrzeuge`
  ( 
`Auto_ID` , `Automarke` , `Modellbezeichnung` , `Verfuegbar`,`Bildadresse`  ) 
  VALUES
  (
  '3' , 'BMW', '1er', 'Ja', 'AutoBilder/bmw-1er-blau.png'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Fahrzeuge`
  ( 
`Auto_ID` , `Automarke` , `Modellbezeichnung` , `Verfuegbar`,`Bildadresse`  ) 
  VALUES
  (
  '4' , 'BMW', '3er', 'Ja', 'AutoBilder/bmw-3er-white.png'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Fahrzeuge`
  ( 
`Auto_ID` , `Automarke` , `Modellbezeichnung` , `Verfuegbar`,`Bildadresse`  ) 
  VALUES
  (
  '5' , 'Audi', 'A1', 'Ja', 'AutoBilder/audi-a1-weiß.png'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Fahrzeuge`
  ( 
`Auto_ID` , `Automarke` , `Modellbezeichnung` , `Verfuegbar`,`Bildadresse`  ) 
  VALUES
  (
  '6' , 'Audi', 'A5', 'Ja', 'AutoBilder/audi-a5-weiß.png'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Fahrzeuge`
  ( 
`Auto_ID` , `Automarke` , `Modellbezeichnung` , `Verfuegbar`,`Bildadresse`  ) 
  VALUES
  (
  '7' , 'Audi', 'S5', 'Ja', 'AutoBilder/audi-s5-weiß.png'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Fahrzeuge`
  ( 
`Auto_ID` , `Automarke` , `Modellbezeichnung` , `Verfuegbar`,`Bildadresse`  ) 
  VALUES
  (
  '8' , 'BMW', 'M4', 'Ja', 'AutoBilder/bmw-m4-gelb.png'
  );";
$res = $pdo->query($sql);
 
$sql = "
  INSERT IGNORE INTO `Fahrzeuge`
  ( 
`Auto_ID` , `Automarke` , `Modellbezeichnung` , `Verfuegbar`,`Bildadresse`  ) 
  VALUES
  (
  '9' , 'Volkswagen', 'Arteon', 'Ja', 'AutoBilder/Arteon-gelb.png'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Fahrzeuge`
  ( 
`Auto_ID` , `Automarke` , `Modellbezeichnung` , `Verfuegbar`,`Bildadresse`  ) 
  VALUES
  (
  '10' , 'Mercedes-Benz', 'CLA', 'Ja', 'AutoBilder/CLA-rot.png'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Fahrzeuge`
  ( 
`Auto_ID` , `Automarke` , `Modellbezeichnung` , `Verfuegbar`,`Bildadresse`  ) 
  VALUES
  (
  '11' , 'Mercedes-Benz', 'C63', 'Ja', 'AutoBilder/C63-weiß.png'
  );";
$res = $pdo->query($sql);


//Tabelle Modelldetails befüllen

$sql = "
  INSERT IGNORE INTO `Modelldetails`
  ( 
  `Modellbezeichnung` , `Auto_ID` , `Kraftstoff` , `Leistung` , `Fahrzeugtyp` , `Getriebe` , `Anzahl_der_Tueren` , `Farbe`, `PreisProMonat`
  ) 
  VALUES
  (
  'PoloGTI' , '1' , 'Benzin', '147kW(200PS)', 'Kleinwagen', 'Automatik' , '4/5' , 'Rot', '240.00'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Modelldetails`
  ( 
  `Modellbezeichnung` , `Auto_ID` , `Kraftstoff` , `Leistung` , `Fahrzeugtyp` , `Getriebe` , `Anzahl_der_Tueren` , `Farbe`, `PreisProMonat`
  ) 
  VALUES
  (
  'Arteon' , '9' , 'Benzin', '140kW(190PS)', 'Limousine', 'Automatik' , '4/5' , 'Gelb' , '280.00'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Modelldetails`
  ( 
  `Modellbezeichnung` , `Auto_ID` , `Kraftstoff` , `Leistung` , `Fahrzeugtyp` , `Getriebe` , `Anzahl_der_Tueren` , `Farbe`, `PreisProMonat`
  ) 
  VALUES
  (
  '1er' , '3' , 'Diesel', '85kW(116 PS)', 'Kompakt', 'Manuell' , '4/5' , 'Blau' , '250.00'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Modelldetails`
  ( 
  `Modellbezeichnung` , `Auto_ID` , `Kraftstoff` , `Leistung` , `Fahrzeugtyp` , `Getriebe` , `Anzahl_der_Tueren` , `Farbe`, `PreisProMonat`
  ) 
  VALUES
  (
  '3er' , '4' , 'Benzin', '135kW(184PS)', 'Limousine', 'Automatik' , '4/5' , 'Weiss' , '220.00'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Modelldetails`
  ( 
  `Modellbezeichnung` , `Auto_ID` , `Kraftstoff` , `Leistung` , `Fahrzeugtyp` , `Getriebe` , `Anzahl_der_Tueren` , `Farbe`, `PreisProMonat`
  ) 
  VALUES
  (
  'M4' , '8' , 'Benzin', '331kW(450PS)', 'Coupe', 'Automatik' , '4/5' , 'Gelb' , '730.00'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Modelldetails`
  ( 
  `Modellbezeichnung` , `Auto_ID` , `Kraftstoff` , `Leistung` , `Fahrzeugtyp` , `Getriebe` , `Anzahl_der_Tueren` , `Farbe`, `PreisProMonat`
  ) 
  VALUES
  (
  'A1' , '5' , 'Benzin', '85kW(116PS)', 'Kleinwagen', 'Automatik' , '4/5' , 'Weiss' , '320.00'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Modelldetails`
  ( 
  `Modellbezeichnung` , `Auto_ID` , `Kraftstoff` , `Leistung` , `Fahrzeugtyp` , `Getriebe` , `Anzahl_der_Tueren` , `Farbe`, `PreisProMonat`
  ) 
  VALUES
  (
  'A3' , '2' , 'Benzin', '150kW(204PS)', 'Limousine', 'Automatik' , '4/5' , 'Weiss' , '270.00'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Modelldetails`
  ( 
  `Modellbezeichnung` , `Auto_ID` , `Kraftstoff` , `Leistung` , `Fahrzeugtyp` , `Getriebe` , `Anzahl_der_Tueren` , `Farbe`, `PreisProMonat`
  ) 
  VALUES
  (
  'A5' , '6' , 'Diesel', '140kW(190PS)', 'Limousine', 'Automatik' , '4/5' , 'Weiss' , '440.00'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Modelldetails`
  ( 
  `Modellbezeichnung` , `Auto_ID` , `Kraftstoff` , `Leistung` , `Fahrzeugtyp` , `Getriebe` , `Anzahl_der_Tueren` , `Farbe`, `PreisProMonat`
  ) 
  VALUES
  (
  'S5' , '7' , 'Diesel', '255kW(347PS)', 'Limousine', 'Automatik' , '4/5' , 'Weiss' , '740.00'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Modelldetails`
  ( 
  `Modellbezeichnung` , `Auto_ID` , `Kraftstoff` , `Leistung` , `Fahrzeugtyp` , `Getriebe` , `Anzahl_der_Tueren` , `Farbe`, `PreisProMonat`
  ) 
  VALUES
  (
  'CLA' , '10' , 'Benzin', '100kW(136PS)', 'Coupe', 'Automatik' , '4/5' , 'Rot' , '410.00'
  );";
$res = $pdo->query($sql);

$sql = "
  INSERT IGNORE INTO `Modelldetails`
  ( 
  `Modellbezeichnung` , `Auto_ID` , `Kraftstoff` , `Leistung` , `Fahrzeugtyp` , `Getriebe` , `Anzahl_der_Tueren` , `Farbe`, `PreisProMonat`
  ) 
  VALUES
  (
  'C63' , '11' , 'Benzin', '375kW(510PS)', 'Coupe', 'Automatik' , '2/3' , 'Weiss' , '850.00'
  );";
$res = $pdo->query($sql); 


//Tabelle Auftraege zum Test befüllen
$sql = "
  INSERT IGNORE INTO `auftraege`
  ( 
  `Auftrag_ID` , `Auto_ID` , `Kunden_ID` , `Buchungsdatum`,`Laufzeit`,`Abgabedatum`
  ) 
  VALUES
  (
  '1' , '1', '1', '01.01.2020', '12 Monate' , '01.01.2021'
  );";
$res = $pdo->query($sql);
?>