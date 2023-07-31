<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="homepage.css"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
<script src="script.js" defer></script>
<title>CRAZY DOUGHNUTS</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

</style>
</head>
<body>
<?php
include('headernav.php');
?>
<section class="first_section">
  <div class="first_section_top" style="background-image: url('img/crazy_doughnuts.jpg')";>
    <h1 style="font-family: Courgette; font-size: 40px; text-align: left;">WELCOME TO CRAZY DOUGHNUTS!</h1>
  </div>
</section>

<section class="first_section" style="padding: 10px;">
  <div class="first_section_below" style="background-image: url('img/section2.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;padding: 10px;">
    <h2 style="color: #565959; font-family: Courgette; font-size: 35px; text-align: left;">Create Your Own Doughnuts!</h2>
    <?php if(isset($_SESSION['username'])){
echo '<a href="create.php" class="button" style="display: block; margin-top: 0px;">Create</a>
';
    }
    else{
      echo '<a href="./login.php" class="button" style="display: block; margin-top: 0px;">Create</a>';

    }?>
  </div>
</section>


<div class="galleries" style="font-family: Courgette; font-size: 30px">
  <h2>Galleries</h2>
  <div class="gallery">
    <img src="img/photo1.jpg" alt="" />
    <img src="img/photo2.jpg" alt="" />
    <img src="img/photo3.jpg" alt="" />
    <img src="img/photo4.jpg" alt="" />
    <img src="img/photo5.jpg" alt="" />
    <img src="img/photo6.jpg" alt="" />
  </div>
</div>

<?php
include('footernav.php');
?>
</body>
</html>
