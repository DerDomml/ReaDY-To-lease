<?php
    session_start();
if(isset($_SESSION["username"]))
{
    echo "<center><p style='color:#2ecc71;'>Hallo, " . $_SESSION['username'] . "! Du wurdest erfolgreich eingeloggt!</p></center>";
}
else{
    echo "<center><p style='color:red;'>Bitte logge dich zuerst ein!</p></center>";
    header("Location: index.php");
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
        <link href="css/style.css?x=7" rel="stylesheet">
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
                            <a class="nav-link" href="#Service">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Maps.php">Location</a>
                        </li>
<!--                        <li class="nav-item">
                            <a class="nav-link" href="Login/Login.php">Login</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="Login/Logout.php">Abmelden</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--- Image Slider -->
        <div id="slides"  class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slides" data-slide-to="0" class="active"></li>
                <li data-target="#slides" data-slide-to="1"></li>
                <li data-target="#slides" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="RDYtoLeaseLogo/hintergrund3.jpg">
                    <div class="carousel-caption">
                        <h1 class="display-2">RDYToLease</h1>
                        <h3>Finden Sie Ihr Traumauto auf dem Marktplatz für Leasingfahrzeuge</h3>
                        <a href="#Modellauswahl" ><button type="button" class="btn btn-outline-light btn-lg" >Wählen Sie Ihr Modell aus</button> </a>
                        <a href="Fuhrpark.php" target="_blank">  <button type="button" class="btn btn-primary btn-lg">Fuhrpark</button> </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="RDYtoLeaseLogo/hintergrund2.jpg"> 
                    <div class="carousel-caption">
                        <h1 class="display-2">RDYToLease</h1>
                        <h3>Finden Sie Ihr Traumauto auf dem Marktplatz für Leasingfahrzeuge</h3>
                        <a href="#Modellauswahl" ><button type="button" class="btn btn-outline-light btn-lg" >Wählen Sie Ihr Modell aus</button> </a>
                        <a href="Fuhrpark.php" target="_blank">  <button type="button" class="btn btn-primary btn-lg">Fuhrpark</button> </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="RDYtoLeaseLogo/hintergrund.jpg">  
                    <div class="carousel-caption">
                        <h1 class="display-2">RDYToLease</h1>
                        <h3>Finden Sie Ihr Traumauto auf dem Marktplatz für Leasingfahrzeuge</h3>
                        <a href="#Modellauswahl" ><button type="button" class="btn btn-outline-light btn-lg" >Wählen Sie Ihr Modell aus</button> </a>
                        <a href="Fuhrpark.php" target="_blank">  <button type="button" class="btn btn-primary btn-lg">Fuhrpark</button> </a>
                    </div>
                </div>
            </div>  
        </div>

        <!--- Jumbotron -->
        <div class="container-fluid">
            <div class="row jumbotron">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                    <p class="lead">
                        Wir unterstützen Ihren Fahrzeugvertrieb.
                    </p>
                    <p class="lead">
                        Mit der führenden Leasing- und Finanzierungsplattform RDYToLease erreichen Sie täglich mehrere tausend Leasing- und Finanzierungsinteressenten.
                    </p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                    <!--<a href="http://www.instagram.com/mcm4rco" target="_blank"> <button type="button" class="btn btn-outline-secondary btn-lg">Folgt meine Ahki</button> </a>-->
                </div>
            </div>
        </div>

        <!--- Two Column Section -->
        <section id="Modellauswahl">

            <div class="container-fluid padding">
                <div class="row padding text-center">

                    <div class="col-12">
                        <hr class="my-4">
                        <h1>Wählen sie Ihr Fahrzeug aus</h1>
                        <select name="Automarke_dropdown"  class="btn btn-secondary btn-lg" onchange='this.form.submit()'>
                            <option value="BMW">BMW</option>
                            <option value="Audi">Audi</option>
                            <option value="Volkswagen">Volkswagen</option>
                        </select>
                        <select type="button" class="btn btn-secondary btn-lg">
                            auswahl 2
                        </select>
                        <input class="btn btn-secondary btn-lg"  type="submit" name="" value="Suche">
                        <br>
                    </div>
                </div>
            </div>
        </section>
        <hr class="my-4">

        <!--- Welcome Section -->
        <div class="container-fluid padding">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="display-4">Bester Auto-Leasingmarkt EUW  </h1>
                </div>
                <hr>
                <div class="col-12">
                    <p class="lead">✔ Hohe Flexibilität dank kurzer Vertragslaufzeiten</p>  
                    <p class="lead">✔ Alles inklusive – bis auf Spritkosten</p>
                    <p class="lead">✔ Ohne Anzahlung & Überführungskosten</p>
                    <p class="lead">✔ Hersteller- und modellübergreifende Angebote</p> 
                </div>
            </div>
            <hr class="my-4">
        </div>

        <!--- Meet the team -->
        <section id="Team">
            <div class="container-fluid padding">
                <div class="row welcome text-center">
                    <div class="col-12">
                        <h1 class="display-4">Meet the Team</h1>
                    </div>
                    <hr>

                </div>
            </div>
        </section>
        <!--- Cards -->
        <div class="container-fluid padding">
            <div class="row padding">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="RDYtoLeaseLogo/relaxo2.png">
                        <div class="card-body">
                            <h4 class="card-title">Younes Abou Kharoub</h4>
                            <p class="card-text">Zuständig für das Web-Design und Profi im Bootstrap-Business</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="RDYtoLeaseLogo/Tim2.png">
                        <div class="card-body">
                            <h4 class="card-title">Lim Tindner</h4>
                            <p class="card-text">Datenbanken-G, MonsterHunter-Experte, PogU</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="RDYtoLeaseLogo/richi2.jpg">
                        <div class="card-body">
                            <h4 class="card-title">Lichard Reitschuh</h4>
                            <p class="card-text">Login-Gott, Registrierungsmeister, zockt nebenbei gefühlt 7 Stunden</p>
                        </div>
                    </div>
                </div> 
            </div>
            <hr class="my-4">
        </div>

        <!--- Three Column Section -->
        <div class="container-fluid padding">
            <div class="row text-center padding">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <i class="fas fa-code"></i>
                    <h3>HTML5</h3>
                    <p>Built with the lastest version of HTML, HTML5</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <i class="fas fa-bold"></i>
                    <h3>BOOTSTRAP</h3>
                    <p>Built with the lastest version of Bootstrap, Bootstrap4</p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <i class="fab fa-css3"></i>
                    <h3>CSS</h3>
                    <p>Built with the lastest version of CSS, CSS3</p>
                </div>
            </div>
            <hr class="my-4">
        </div>

        <!--- Connect -->
        <div class="container-fluid padding">
            <div class="row text-center padding">
                <div class="col-12">
                    <h2>Connect</h2>
                </div>
                <div class="col-12 social padding">
                    <a href="http://www.instagram.com/mcm4rco" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                </div>
            </div>            
        </div>
        <!--- Footer -->
        <footer>
            <section id="Service">


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
                            <a href="http://www.instagram.com/mcm4rco" target="_blank" <h5>&copy; http://www.instagram.com/mcm4rco</h5></a>
                        </div>
                    </div>
            </section>

        </footer>
    </body>
</html>
