<?php
session_start();
//echo var_dump($_SESSION);
//echo($_SESSION['test']);
//if(isset($_SESSION['test'])) { print("DESTINATION SET\n"); }
//print_r($_SESSION['destination']);
print_r($_SESSION['route0']);
print_r($_SESSION['route1']);
/**
 * Created by PhpStorm.
 * User: daedalus
 * Date: 15/10/17
 * Time: 08:45
 */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Flight Prices</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Destination</th>
            <th>Flight Price</th>
            <th>Hotel Price</th>
            <th>Total Price</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <?php

            $items = count($_SESSION);
            for($i=0; $i<=$item; $i++)
            {
                $word = 'route'. strval($i);
                print($word);
                echo '<td>';
                echo $_SESSION[$word]['DestinationId'];
                echo '</td>';
            }?>

        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
        </tr>
        </tbody>
    </table>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>