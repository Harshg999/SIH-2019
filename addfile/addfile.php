<html lang="en">

<head>
    <title>Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

    <style>
        svg {
            -webkit-filter: invert(100%);
            /* safari 6.0 - 9.0 */
            filter: invert(100%);
        }
    </style>



</head>

<body>
    <!---Navigation--->

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">TUBEWELL INFORMATION</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
 echo '
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
    <!---Navigation ends--->
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" method="post" enctype="multipart/form-data">
                <span class="contact100-form-title">
                    Upload the files
                </span>

                <div class="wrap-input100 input100-select">
                    <span class="label-input100">Select State</span>
                    <div>
                        <select class="selection-2" name="state">
                            <option>None</option>
                            <option value="goa">Goa</option>
                            <option value="bihar">Bihar</option>
                        </select>
                    </div>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 input100-select">
                    <span class="label-input100">Select the region</span>
                    <div>
                        <select class="selection-2" name="region">
                            <option value=0>District-Wise</option>
                            <option value=1>Block/Tehsil-Wise</option>
                            <option value=2>Village-Wise</option>
                        </select>
                    </div>
                    <span class="focus-input100"></span>
                </div>

                <div class="file-upload-wrapper">
                    <input type="file" id="input-file-now" class="file-upload" name="fileToUpload" />
                    <input type="number" placeholder="   Enter MIC Year   " class="l1" name="mic1" required>
                </div>
                <br>
                <div class="file-upload-wrapper">
                    <input type="file" id="input-file-now" class="file-upload" name="fileToUpload1" />
                    <input type="number" placeholder="   Enter MIC Year   " class="l1" name="mic2" required>
                </div>
                <div>

                </div>
                <div class="container-contact100-form-btn">
                    <label class="radio-inline">
                        <input type="radio" name="option" value="DUGWELL" checked>DUGWELL
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="option" value="DEEPWELL" checked>DEEPWELL
                    </label>

                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button type="submit" class="contact100-form-btn" name="submit">
                            <span>
                                Upload
                                <i class="fa fa-long-arrow-up m-l-7" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
            <?php


if($_SESSION['id']>0){


  /*

  To add the  file name along side the csv file to know which user uploaded the file
  $updatedfilename = $_SESSION['email'];

  echo "<alert>" . $updatedfilename. "</alert>";


  */  



if(array_key_exists("submit",$_POST))
{

  $state = $_POST['state'];
  $_SESSION['state'] = $state;
  
  
  
  $mic1 = $_POST["mic1"];
  $mic2 = $_POST["mic2"];  

  $mi_upload1 = FALSE;
  $mi_upload2 = FALSE;
  $allmi_upload = FALSE;

  $_SESSION['region'] = $_POST['region'];
  $_SESSION['mic1'] =   $mic1; 
  $_SESSION['mic2'] =   $mic2;

  $_SESSION['well'] = $_POST['option'];
 // $_SESSION['state'] = $state;
  
  /*
    if ( $mic1 > $mic2 )
    {
      list ($mic1 , $mic2 )  = array ($mic2,$mic1);
      
    }*/ 

    $updatedfilename1 = $_SESSION['email']; //GETTING THE CURRENT USERS EMAIL ID;
  
    //RENAMING THE FILE 
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $newfilename1 = $mic1 . "_" .$updatedfilename1. '.' . end($temp);
    $temp1 = explode(".", $_FILES["fileToUpload1"]["name"]);
    $newfilename2 = $mic2 . '_' .$updatedfilename1.'.'. end($temp1);



    //move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir. $newfilename1);

$target_dir = "../csv/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


   
// Check if file already exists
if (file_exists($target_file)) 
{
    echo '<br><div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>Sorry, file already exists.</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
    
    $uploadOk = 0;
}
// Allow certain file formats
    
if($imageFileType != "csv" ) 
{
    echo '<br><div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>Sorry, only CSV file is allowed.</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
   
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo '<br><div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>Sorry, your file was not uploaded.</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
    
// if everything is ok, try to upload file
} 

//UPLOAD FILE 1
else 
{   
    $updatedfilename = $_SESSION['email'];
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename1) )
    {
        
        echo '<br><div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>The file has been uploaded.</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';

      $mi_upload1 = TRUE;
        
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } 
    
    else 
    {
        echo '<br><div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>Sorry, there was an error uploading your file.</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
        
    }
}

    
    
/*
    
$target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));*/

// Check if file already exists
if (file_exists($target_file)) 
{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>Sorry, file already exists.</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
    
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "csv" ) 
{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>Sorry, only CSV file is allowed.</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
    
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>Sorry, your file was not uploaded.</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
    
// if everything is ok, try to upload file
} 

//FILE UPLOAD 2
else 
{

    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"],  $target_dir. $newfilename2) )
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>The file has been uploaded.</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                                          </div>';

                      
      $mi_upload2 = TRUE;
    } 
    else 
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>Sorry, there was an error uploading your file.</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
        
    }
}


if  ( ($mi_upload1 === TRUE ) and ($mi_upload2 === TRUE) )
{
    $allmi_upload = TRUE;

    $_SESSION['allmi_upload'] = TRUE;

    echo '				<div class="container-contact100-form-btn">
    <div class="wrap-contact100-form-btn">
      <div class="contact100-form-bgbtn"></div>
      <a href="../csv/calculate.php" target="_blank">
      <button type="submit" class="contact100-form-btn" name="submit" >
        <span>
          Calculate          
          <i class="fa fa-folder" aria-hidden="true"></i>
        </span>
      </button>
      </a>
                  
                  
    </div>
  </div>';
}


}//ISSSET ENDS
}//SESSION ENDS
else{
    header("Location: http://localhost//SIH-2019/Homepage/homepage.php");
}
?>
        </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <script>
        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

</body>

</html>