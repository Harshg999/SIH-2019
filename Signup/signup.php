<?php
  $link = mysqli_connect("localhost", "root", "", "test");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }
        
  
  ?>
    <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
        <style>
           #alert2{
                
                width: 400px
                
                
            }
        .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}
.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: #2196F3;
}
input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}
input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
        
        .register{
    background: -webkit-linear-gradient(left, #3B5997, #56BAED);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #006600;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #56BAED;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #56BAED;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
        </style>
    </head>
    <body>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <h3>Welcome</h3>
                        <a href="http://localhost//SIH-2019//Login//login.php">
                            <input type="submit" name="" value="Login"/></a><br/>
                    </div>
                    <div class="col-md-9 register-right">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <form method="post">
                                    <h3 class="register-heading">Register</h3>
                                                              
                                    <div class="row register-form">
                                     
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" value="Faculty" name="type">
                                            <input type="text" class="form-control" placeholder="Full Name *" value="" name="fullname" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Mobile Number" value="" name="mobile" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" value="" name="password" required />
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email *" value="" name="email" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  maxlength="10" class="form-control" placeholder="ID" name="eid" value="" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Confirm Password *" value="" name="confirmpass" required/>
                                        </div>
                                        
                                        <input type="submit" class="btnRegister"  value="Register" name="next"/>
                                    </div>
                                            
                                </div>
                                   
                                </form>
                            </div>
<center>
<?php
                            
                            
if (array_key_exists("next", $_POST)) 
    {
    
       if($_POST['confirmpass']==$_POST['password'])
       {
        
   $query=" INSERT INTO `user`( `email`, `password`, `mobile`,`name`,`emp_id`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."','".mysqli_real_escape_string($link, $_POST['mobile'])."','".mysqli_real_escape_string($link, $_POST['fullname'])."','".mysqli_real_escape_string($link,$_POST['eid'])."') ";
     
?>
                                
<?php
    if( mysqli_query($link, $query))
    {
       
       echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>Successfully Signed in!</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                                          </div>';
      
    }
           else
    {
     
        echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>Failed!</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                                          </div>';
        
    }
   
       }
    else
    {
   
        echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2" >
  <strong>Password  mismatch!</strong> 
  <button type="button" id="alert1" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                                          </div>';
        
    }
                                   }

 

?></center>
                        </div>
                    </div>
                </div>
        </div>
    </body>
<script>
        $("#home-tab").click(function(){
            
         $("#home").fadeIn(); 
             $("#profile").css('display','none'); 
            $("#home-tab").addClass("active");
             $("#profile-tab").removeClass("active");
            
        });
         $("#profile-tab").click(function(){
            
         $("#home").css('display','none');
             $("#profile").fadeIn(); 
             $("#profile-tab").addClass("active");
            $("#home-tab").removeClass("active");
        });
        $("#ok").click(function(){
                        $('#ok').prop("disabled", false);
            
            
        });
       $("#alert1").click(function(){
                       
               $("#alert2").fadeOut();
            
        });
        
        </script>