<html>
<head>
<title>Prediction Script</title>
<style>
</style>
</head>
<body>
<?php
	$command = escapeshellcmd('pred.py');
    $output = shell_exec($command);
?>
<h1><center>Predictions</center></h1>
<div id="disp">
<?php 
for($i=0;$i<44;$i++)
echo $output[$i];
echo "<br>";
for($i=44;$i<62;$i++)
echo $output[$i];
echo "<br>";
for($i=62;$i<82;$i++)
echo $output[$i];
echo "<br>";
?>
</div>
<center>
<div>
<img src="bardez_plot.jpg" height="300px" width="300px">
</div>
</center>
</body>
</html>