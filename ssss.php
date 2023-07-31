<!DOCTYPE html>
<html>
<head>
    <title>Crazy Doughnuts Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
           
        }
        .picture{
            background-image:url("img/store.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            
        }

        section {
            padding: 20px;
        }

        .container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin: 50px 0;
        }
        

        .box {
            background-color: #f9e5eb;
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
            margin: 50px;
            box-sizing: border-box;
        }

        h1 {
            color: #565959;
            text-align: center;
        }

        h2 {
            color: #565959;
        }
        div{
            padding:1px;
            margin:0.2px;
        }
        
    </style>
    </style>
</head>
<body>
    <?php
    include('headernav.php');
    ?>
    <div class="picture">
<div class="container">
    <div class="box" style="color: #565959">
        <h2>About Crazy Doughnuts</h2>
        <p>CRAZY DOUGHNUTS was established in 2020 with the aim is to develop a brand-new range of nutrient-dense doughnuts that will appeal to consumers who adore sweets but are worried about their health. We will provide health conscious doughnuts  like sugar-free, gluten-free, oil-free, baked food etc. we’ll provide the different kinds of doughnuts with different flavors and customers will have freedom to create their own doughnuts.</p>
    </div>
  
    <div class="box" style="color: #565959">
        <h2>Our Aims</h2>
        <p>At Crazy Doughnuts, our aims are simple:</p>
        <ul>
            <li>To create doughnuts that bring joy and happiness to our customers.</li>
            <li>To use high-quality ingredients to ensure the best taste in every bite.</li>
            <li>To continuously innovate and surprise our customers with crazy new flavors.</li>
            <li>To provide exceptional service and an unforgettable doughnut experience.</li>
        </ul>
    </div>
    
    <div class="box" style="color: #565959">
        <h2>Product Offering</h2>
        <div class="product" style="color: #565959">
            <p>CRAZY DOUGHNUTS focuses on using healthy, high-quality ingredients for our donuts. Our doughnuts are made from 
scratch using whole grains, including fiber- and mineral-rich whole meal and oats. We think that everyone deserves to indulge in guilt-free doughnuts without compromising taste
or health.
</p>
        </div>
    </div>
</div>
    </div>
<?php
   include('footernav.php');
   ?>
</body>
</html>
