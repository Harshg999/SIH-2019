
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tubewell Information</title>

    <!-- Bootstrap core CSS -->
    <link href="http://dbms-com.stackstaging.com/almost/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="h.css" rel="stylesheet">

  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">TUBEWELL INFORMATION</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
             <?php
  session_start();
if(array_key_exists("id",$_SESSION)){
 echo '<li class="nav-item">
              <a class="nav-link" href="http://localhost/SIH-2019/addfile/addfile.php">Add File</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href ="http://localhost/SIH-2019/Login/login.php?logout=1">
                 Logout
                  </a>
            </li>';   
    
}
                  else{
                      
                      
                      echo '  <li class="nav-item">
              <a class="nav-link" href="http://localhost//SIH-2019//Signup//signup.php">Register</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="http://localhost/sih-2019/Login/login.php">Login</a>
            </li>';
                  }
        
  
  ?>
           
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- Bootstrap core JavaScript -->
    <script src="http://dbms-com.stackstaging.com/almost/vendor/jquery/jquery.min.js"></script>
    <script src="http://dbms-com.stackstaging.com/almost/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    
    </body>
</html>