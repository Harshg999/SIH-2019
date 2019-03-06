<?php

    session_start();

    $error = "";  

    if (array_key_exists("logout", $_GET)) {
        
        unset($_SESSION);
      
        
        session_destroy();
        header("Location: http://localhost//SIH-2019/Homepage/homepage.php");
        
    } else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id'])) {
        
        header("Location: http://localhost//SIH-2019/Homepage/homepage.php");
        
    }

    if (array_key_exists("submit", $_POST)) {
        
         $link = mysqli_connect("localhost", "root", "", "test");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }
        
        if (!$_POST['email']) {
            
            $error .= "An email address is required<br>";
            
        } 
        
        if (!$_POST['password']) {
            
            $error .= "A password is required<br>";
            
        } 
        
        if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {
            
           $query = "SELECT * FROM `user` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
                
                    $result = mysqli_query($link, $query);
                
                    $row = mysqli_fetch_array($result);
                
                    if (isset($row)) {
                        
                       
                        
                        if ($_POST['password'] == $row['password']) {
                            
                            $_SESSION['id'] = $row['id'];                            
                            

                            header("Location: http://localhost//SIH-2019/Homepage/homepage.php");
                                
                        } else {
                            
                            $error = "That email/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error = "That email/password combination could not be found.";
                        
                    }
            
        }

        $_SESSION['email'] =  $_POST['email'];
        
        
    }


?>


          
         







<head>
    <link rel="stylesheet" href="login.css">
    </head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>
    

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="images.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="Enter Username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter Password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="submit">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <div id="error"><?php if ($error!="") {
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
    
} ?>
    </div>

  </div>
</div>
    </div> 
    
</body>

