<?php

session_start();

 $t = $_SESSION['region'];


 if ( $t == 0 )
 {
    include("district.php");
 }

 
 if ( $t == 1 )
 {
    include("block.php");
 }

 if ( $t == 2 )
 {
    include("village.php");
 }
?>


<html>
    <head>
        <title>CALCULATIONS</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
    


</body>

</head>