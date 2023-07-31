<!DOCTYPE html>
<html>
<head>
    <?php
    include("headernav.php");
    ?>
    <title>Delivery</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 100vh;
            background-image: url('img/delivery.jpg');
            background-size: cover;
            color:#565959;
            padding: 0px;
            
        }

        .content {
            position: absolute;
            top: 40%;
            left: 51%;
            transform: translate(-20%, -20%);
            text-align: center;
            color: #fff;
            font-size: 20px;
            font-weight: bold;
                    }

        .box {
            background-color:pink;
            padding: 20px; 
            border-radius: 10px;
            margin: 10px;        }
    </style>
</head>
<body>
    <div class="image-container">
        <div class="content">
            <div class="box">
                <h1 style="color: #565959;">CRAZY DOUGHNUTS</h1>
                <p style="color: #565959;">Are you ready to savor the joy of heavenly doughnuts? 
                Place your order now and let the sweetness of Kathmandu Valley come to your doorstep!
                 Ready to take a bite into the world of deliciousness? 
                 Explore our virtual donut store, place your order, and let the sweetness flow into your life.</p>
            </div>
        </div>
    </div>
    <?php
    include("footernav.php");
    ?>
</body>
</html>
