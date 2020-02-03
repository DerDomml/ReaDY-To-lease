<?php
    require("dbFahrzeuge.php");
    session_start();
    if(isset($_SESSION["Modell"]))
    {
        $Modell = $_SESSION["Modell"];
        $stmt = "SELECT * FROM fahrzeuge WHERE Modellbezeichnung='".$Modell."'";
        $result = $pdo->query($stmt);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $Marke = $row["Automarke"];
        $Verfuegbar = $row["Verfuegbar"];
        $Bild = $row["Bildadresse"];
        
        $stmt = "SELECT * FROM modelldetails WHERE Modellbezeichnung ='".$Modell."'";
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
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href ='index.php'><img src="RDYtoLeaseLogo/Logo2.png"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon">

                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link" href="#Team">Team</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link" href="Maps.php">Location</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link" href="#Service">Services</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link" href="Login/Login.php">Login</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link" href="Login/Register.php">Registrieren</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--- Two Column Section -->

        <div class="container-fluid padding">
                <center><div class="col-12">
                    <?php echo '<img class="Autobilder" src="'.$Bild.'">'?>
                    <br>
                    </div></center>
            <div class="row padding text-left">
                <div class="col-12">
                    <h2 class="text-center" id="Modell">
                        <?php echo $Marke." ".$Modell?>
                    </h2>
                    <hr class="my-4">
                    <table class="paddingBetweenCols" class="paddingBetweenRows">
                        <tr class="spaceUnder">
                            <td>Bereitstellungszeit:</td>
                            <td id="Verfuegbarkeit">
                            <?php
                                if($Verfuegbar == "Ja"){
                                    echo "Sofort verfügbar!";
                                }
                                else{
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
                    <?php
                        if(isset($_SESSION["username"]))
                        {
                            echo '
                            <center>
                                <a href="#"><button type="button" class="btn btn-outline-secondary btn-lg">Jetzt Leasen</button></a>
                            </center> ';
                        }
                    ?>
                </div>
            </div>
        </div>

        <!--- Connect -->
        <hr class="my-3">
        <div class="container-fluid padding">
            <div class="row text-center padding">
                <div class="col-12">
                    <h2>Conntect</h2>
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
        <div class="container-fluid padding">
            <div class="row text-center">

                <div class="col-md-4">
                    <img src="RDYtoLeaseLogo/Logo2-schwarzweiß.png">
                    <hr class="light">
                    <p>✆ 555-555-5555</p>
                    <p>✉ mirko.maulwurf@siemens.com</p>
                    <p>Mirkostraße 42</p>
                    <p>Bayern, MirkoIsland ,69420</p>
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
                    <h5>&copy; http://www.instagram.com/mcm4rco</h5>
                </div>
            </div>
    </footer>
</html>
