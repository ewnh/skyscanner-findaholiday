<?php
session_start();
//echo var_dump($_SESSION);
//echo($_SESSION['test']);
//if(isset($_SESSION['test'])) { print("DESTINATION SET\n"); }
//print_r($_SESSION['destination']);
echo $_SESSION['loc'];

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
            <th>Total Price</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <?php

            $items = count($_SESSION);
            $i = 0;
            while(1)
            {   
	        if($_SESSION['route'.strval($i+1)]['Price'] == '') { break; }
                echo '<th scope="row">'.$i.'</th>';
                $word = 'route'. strval($i);
                //print($word);
                echo '<td>';
                echo $_SESSION[$word]['Destination'];
                echo '</td>';
                $word = 'route'. strval($i);
                //print($word);
                echo '<td>';
                echo $_SESSION[$word]['Price'];
                echo '</td>';
                $word = 'route'. strval($i);
                //print($word);
                echo '<td>';
                echo $_SESSION[$word]['Price'];
                echo '</td>';
                echo ' </tr>';
		$i += 1;
            }?>



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
