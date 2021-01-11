<?php
session_start();
$link = mysqli_connect("localhost", "pi", "xiaomitop", "climate");
?>

<!doctype html>
<html>
        <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">
    <link rel="icon" type="image/png" href="ico.svg"/>  

        <title>ClimPi</title>
                           
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/justgage.js"></script>
        <script src="js/raphael-2.1.4.min.js"></script>
        </head>

    <body>
    <header class="climatebar pb-1 pt-2 d-flex justify-content-center">
            <img src="ico.svg" width="36" height="36" class="d-block" viewBox="0 0 612 612" role="img" focusable="false">
            <h1 class="title navbar-brand text-center"><!--m-2 navbar-brand">-->ClimPi</h1>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6 mt-3" id="temp">
                <div id="g1" class="gauge"></div>
            </div>

            <div class="col-sm-12 col-lg-6 mt-3" id="hum">
                <div id="g2" class="gauge"></div>
            </div>
        </div>
    </div>

    <script>
        var g1, g2;

        var g1 = new JustGage({
            id: "g1",
            value: <?php

                $output = mysqli_query($link, "SELECT temperature FROM clim1 ORDER BY date DESC LIMIT 1");
                $row = mysqli_fetch_array($output);
                echo $row["temperature"];

                ?>,
            min: 0,
            max: 50,
            symbol: "°C",
            title: "Temperature",
        });

        var g2 = new JustGage({
            id: "g2",
            value: <?php

                $output = mysqli_query($link, "SELECT humidity FROM clim1 ORDER BY date DESC LIMIT 1");
                $row = mysqli_fetch_array($output);
                echo $row["humidity"];

                ?>,
            min: 0,
            max: 100,
            minTxt: "0%",
            maxTxt: "100%",
            symbol: "%",
            title: "Humidity",
        });
    </script>
    </body>
</html>