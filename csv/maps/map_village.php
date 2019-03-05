<html>
    <head>
        <title>MAPS</title>
        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-color:white;
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>
</head>


    <body>
    <div class="bgimg w3-display-container w3-animate-opacity">
  <div class="w3-display-middle">
    <h1 class="w3-jumbo w3-animate-top" style="color:black">Select a year</h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <center>
    <p class="w3-large w3-center"><form action="" method="POST">
        <select name="maps">
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
</select>
<input type="submit" name="submit">
</form></p>
  </div>
  <div class="w3-display-bottomleft w3-padding-large">
   
  </div>
</div>
    
    
</center>



<?php
session_start();



 if ( isset ($_POST['submit']) )
{
    $selected = $_POST['maps'];
    if ( $selected == '2006' )
    {
        echo "<h1 style='text-align:center'>For the year  ".$selected;
        include('Goa6.php');
    }

    if ( $selected == '2007' )
    {
        echo "<h1 style='text-align:center'>For the year   " .$selected;
        include('Goa7.php');
    }

    if ( $selected == '2013' )
    {
        echo "<h1 style='text-align:center'>For the year   " .$selected;
        include('Goa13.php');
    }

    if ( $selected == '2014' )
    {
        echo "<h1 style='text-align:center'>For the year   " .$selected;
        include('Goa14.php');
    }
} 
?>

