<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="homepage.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <script src="script.js" defer></script>
  <title>CRAZY DOUGHNUTS</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
  </style>
</head>

<body>
  <header class="main_header">
    <div class="header_upper">
      <?php
      session_start();
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
      } else {
        $loggedin = false;
      }
      if (!$loggedin) {
        echo "<a href='login.php' class='sign' style='display: block; margin-top: 0px;'>Sign-In</a>
    <a href='registration.php' class='sign' style='display: block; margin-top: 0px;'>Sign-Up</a>";
      } else {
        echo "<a href='logout.php' class='sign' style='display: block; margin-top: 0px;'>Sign-Out</a>";
      }
      ?>

    </div>
    <div class="header_lower">
      <nav>
        <ul>
          <span>
            <li><a href="home.php">
                <p class="fromLeft" style="color: #565959">Home</p>
              </a></li>
          </span>
          <span>
            <li><a href="menu.php">
                <p class="fromLeft" style="color: #565959">Menu</p>
              </a></li>
          </span>
          <a href="#CrazyLogo"><img src="img/cdlogo.png" style="position: relative;left: 15px;height: 100%;"></a>
          <span>
            <li><a href="#CrazyLogo" class="fromLeft">
                <p style="font-family:Courgette;color: #F85B28;">Crazy Doughnuts</p>
              </a></li>
          </span>
          <span>
            <li><a href="delivery.php">
                <p class="fromLeft" style="color: #565959">Delivery</p>
              </a></li>
          </span>
          <span>
            <li><a href="store.php">
                <p class="fromLeft" style="color: #565959">About Us</p>
              </a></li>
          </span>
          <span>
            <li><a href='cart.php' class='sign' style='display: block; margin-top: 0px;'>Cart</a></li>
          </span>
        </ul>
      </nav>
    </div>
  </header>
</body>

</html>