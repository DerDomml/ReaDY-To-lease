<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
  <div class="container-fluid">
      <a class="navbar-brand" href ='index.php'><img src="RDYtoLeaseLogo/Logo2.png"/></a>
      <center>
          <?php
              if(isset($_SESSION["username"]))
              {
                  echo    '<p style="color:grey">Hallo, <span style="color:black"><b>'.$_SESSION['username'].'</b></span>! Du bist          eingeloggt.</p>';
              }
              else
              {
                  echo    '<p style="color:grey">Du bist derzeit nicht angemeldet.</p>';
              }
          ?>
      </center>
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
              <?php 
              if(isset($_SESSION['username']))
              {
                  echo    '<li class="nav-item">
                          <a class="nav-link" href="Login/Logout.php">Abmelden</a>
                          </li>';
              }
              else
              {
                  echo    '<li class="nav-item">
                              <a class="nav-link" href="Login/Login.php">Login</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="Login/Register.php">Registrieren</a>
                          </li>';
              }
              ?>
          </ul>
      </div>
  </div>
</nav>