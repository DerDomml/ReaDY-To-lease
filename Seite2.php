<?php
require("dbFahrzeuge.php");
session_start();
if (isset($_SESSION["Modell"])) {
    $Modell = $_SESSION["Modell"];
    $stmt = "SELECT * FROM fahrzeuge WHERE Modellbezeichnung='" . $Modell . "'";
    $result = $pdo->query($stmt);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $Marke = $row["Automarke"];
    $_SESSION["Marke"] = $Marke;
    $Verfuegbar = $row["Verfuegbar"];
    $Bild = $row["Bildadresse"];
    $Auto_ID = $row["Auto_ID"];

    $stmt = "SELECT * FROM modelldetails WHERE Modellbezeichnung ='" . $Modell . "'";
    $result = $pdo->query($stmt);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $Kraftstoff = $row["Kraftstoff"];
    $Leistung = $row["Leistung"];
    $Typ = $row["Fahrzeugtyp"];
    $Getriebe = $row["Getriebe"];
    $Farbe = $row["Farbe"];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PogU</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="css/style.css?x=2" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>


    </head>
    <body>
        <!-- Navigation -->
        <?php
        require("navbar.php");
        ?>
        <!--- Two Column Section -->

        <div class="container-fluid padding">
            <center><div class="col-12">
                    <?php echo '<img class="Autobilder" src="' . $Bild . '">' ?>
                    <br>
                </div></center>
            <div class="row padding text-left">
                <div class="col-12">
                    <h2 class="text-center" id="Modell">
                        <?php echo $Marke . " " . $Modell ?>
                    </h2>
                    <hr class="my-4">
                    <table class="paddingBetweenCols" class="paddingBetweenRows">
                        <tr class="spaceUnder">
                            <td>Bereitstellungszeit:</td>
                            <td id="Verfuegbarkeit">
                                <?php
                                if ($Verfuegbar == "Ja") {
                                    echo "Sofort verfügbar!";
                                } else {
                                    echo "Momentan leider nicht verfügbar.";
                                }
                                ?>
                            </td>
                        </tr>
                        <br>
                        <tr class="spaceUnder">
                            <td>Kraftstoff:</td>
                            <td id="Kraftstoff">
                                <?php
                                echo $Kraftstoff;
                                ?>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td>Leistung:</td>
                            <td id="Leistung">
                                <?php
                                echo $Leistung;
                                ?>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td>Getriebe:</td>
                            <td id="Getriebe">
                                <?php
                                echo $Getriebe;
                                ?>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td>Fahrzeugaufbau:</td>
                            <td id="Fahrzeugart">
                                <?php
                                echo $Typ;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Farbe:</td>
                            <td id="Farbe">
                                <?php
                                echo $Farbe;
                                ?>
                            </td>
                        </tr>
                    </table>
                    <br>

                    <!-- Leasing Eingabeform -->

                    <center><h2><?php echo "Lease jetzt deinen <b>" . $_SESSION["Marke"] . " " . $_SESSION["Modell"] . "</b>!"; ?></h2></center>
                    <br>
                    <center>
                        <form class="leasingform" method="post">
                            <label for="datumvon">
                                Ab:
                                <input id="datumvon" name="datumvon" class="datuminput" type="date">
                            </label>
                            <label for="laufzeit">
                                Laufzeit:
                                <select name="laufzeit">
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                    <option value="48">48</option>
                                </select>
                                Monate
                            </label>
                            <br>
                            <br>
                            <input type="submit" class="btn btn-outline-secondary btn-lg" value="Jetzt leasen!">
                        </form>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $datumvon = DateTime::createFromFormat("Y-m-d", $_POST["datumvon"]);

                            $sql = $pdo->prepare("SELECT * FROM user WHERE User_Name = :user");
                            $sql->bindParam(":user", $_SESSION['username']);
                            $res = $sql->execute();
                            $row = $sql->fetch(PDO::FETCH_ASSOC);

                            $kundenid = $row["User_ID"];

                            $laufzeit = $_POST["laufzeit"] . " Monate";

                            $datumbis = $datumvon;
                            $datumbis->add(new DateInterval("P" . $_POST["laufzeit"] . "M"));
                            $datumbisstr = $datumbis->format("Y-m-d");

                            $sql = $pdo->prepare("
                                    INSERT INTO Auftraege (Auto_ID, Kunden_ID, Buchungsdatum, Laufzeit, Abgabedatum)
                                    VALUES(:autoid, :kundenid, :datumvon, :laufzeit, :datumbis) 
                                    ");
                            //(:autoid, :kundenid :datumvon, :laufzeit, :datumbis)
                            $sql->bindParam(":autoid", $Auto_ID);
                            $sql->bindParam(":kundenid", $kundenid);
                            $sql->bindParam(":datumvon", $_POST["datumvon"]);
                            $sql->bindParam(":laufzeit", $laufzeit);
                            $sql->bindParam(":datumbis", $datumbisstr);
                            //$sql->bindParam($Auto_ID, $kundenid, $_POST["datumvon"], $laufzeit, $datumbisstr);
//                            echo $Auto_ID . "<br>";
//                            echo $kundenid . "<br>";
//                            echo $_POST["datumvon"] . "<br>";
//                            echo $laufzeit . "<br>";
//                            echo $datumbisstr;
                            if ($sql->execute()) {
                                echo "Ihr Auftrag wurde angenommen!";
                            } else {
                                echo "Der Auftrag konnte nicht angenommen werden. Bitte anmelden";
                            }
                        }
                        ?>
                    </center>
                </div>
            </div>
        </div>

        <!--- Connect -->
        <hr class="my-3">
        <div class="container-fluid padding">
            <div class="row text-center padding">
                <div class="col-12">
                    <h2>Connect</h2>
                </div>
                <div class="col-12 social padding">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                </div>
            </div>            
        </div>

    </body>


    <!--- Footer -->

    <footer>
        <section id="Service">
            <div class="container-fluid padding">
                <div class="row text-center">

                    <div class="col-md-4">
                        <img src="RDYtoLeaseLogo/Logo2-schwarzweiß.png">
                        <hr class="light">
                        <p>✆ 555-555-5555</p>
                        <p>✉ max.mustermann@pogu.com</p>
                        <p>Mustermannstraße 42</p>
                        <p>Bayern, MusterIsland, 69420</p>
                    </div>

                    <div class="col-md-4">
                        <hr class="light">
                        <h5>Öffnungszeiten</h5>
                        <hr class="light">
                        <p>Montag-Freitag: 8-18Uhr</p>
                        <p>Samstag: 8-14Uhr</p>
                        <p>Sonntag: geschlossen </p>
                    </div>


                    <div class="col-md-4">
                        <hr class="light">
                        <h5>Service Area</h5>
                        <hr class="light">
                        <p>Erlangen, Bayern, 91056</p>
                        <p>Fürth, Bayern, 90762</p>
                        <p>Nürnberg, Bayern, 90402</p>
                        <p>Buxtehude, Niedersachsen, 21614</p>
                    </div>

                    <div class="col-12">
                        <hr class="light-100">  
                        <a href="#" target="_blank" <h5>&copy;RDYToLease</h5></a>
                    </div>
                </div>
        </section>
    </footer>
</html>
