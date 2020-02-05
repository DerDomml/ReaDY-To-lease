<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Location</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation -->
        <?php
        session_start();
        require("navbar.php");
        ?>
        <!-- maps -->
        <p >
            <iframe  class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47935.68508846769!2d19.78280383988829!3d41.331041344466634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1350310470fac5db%3A0x40092af10653720!2sTirana%2C%20Albanien!5e0!3m2!1sde!2sde!4v1580308593059!5m2!1sde!2sde" 
                     frameborder="0" style="border:0;" allowfullscreen=""></iframe>

        </p>


    </body>

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
</html>
