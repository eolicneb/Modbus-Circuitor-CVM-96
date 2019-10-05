</head>
  <link rel="stylesheet" href="css/header.css">
  <style>
  .alert-danger{color:#721c24;background-color:#f8d7da;border-color:#f5c6cb}
  .alert-danger hr{border-top-color:#f1b0b7}
  .alert-danger .alert-link{color:#491217}
  .alert-light{color:#818182;background-color:#fefefe;border-color:#fdfdfe}.alert-light hr{border-top-color:#ececf6}.alert-light .alert-link{color:#686868}.alert-dark{color:#1b1e21;background-color:#d6d8d9;border-color:#c6c8ca}.alert-dark hr{border-top-color:#b9bbbe}.alert-dark .alert-link{color:#040505}
  </style>
</head>
<?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){}
    else {
          echo "<br><br><br><div class='alert alert-danger' role='alert'>
          <h4><a>Vas a necesitar logearte para acceder a esta página.</a></h4>
          <p><a href='/login/login.html'>Logeate acá!</a></p></div>";
          exit;
        }
      // checking the time now when home page starts
      $now = time();


  if ($now > $_SESSION['expire'] )
      {
          session_destroy();
          echo "<br><br><br><div class='alert alert-danger' role='alert'>
          <h4>Tu tiempo de sesión terminó!</h4>
          <p><a href='/login/login.html'>Logeate acá!</a></p></div>";
          exit;
      }

?>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
