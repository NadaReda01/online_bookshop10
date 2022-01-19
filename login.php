<?php

require 'dbconnection.php';

if($_SERVER['REQUEST_METHOD']=="POST")

{

$mobile   = $_POST['phone'];
$password = $_POST['password'];


        //mobile
 if(empty($mobile))
 {
     echo "required";
 }

     //password
 if(empty($password))
 {
    echo "required";
 }   
 elseif(strlen($password)<6)
 {
    echo "password length should be >6";
 }

     //check
 if(!empty($mobile&&$password)&&strlen($password)>=6)

 {
      //code
      $password=md5($password);

      $sql = "select * from users where mobile = '$mobile' and password = '$password'";
      $op = mysqli_query($con,$sql);

      if(mysqli_num_rows($op)==1)
      {
        $data = mysqli_fetch_assoc($op);

        $_SESSION['user'] =$data;

      header('Location: index.php');


      }

      else{
          echo "error";
      }



 }


}



?>



<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html lang="en">
<head>
    <!-- for language -->
    <meta charset="UTF-8">
    <!-- for ie -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- for responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="frontassets/css/style.css">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="frontassets/css/all.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> 
    <!-- google fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Cairo"  rel="stylesheet" type="text/css">
    <html data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!-- slick links -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />
    <title>Exchange_books</title>
    <!-- telephone -->
    <link rel="stylesheet" href="frontassets/css/intlTelInput.css">
</head>
<body>
    <!-- start login -->
    <section class="row" id="login">
        <div class="col-lg-5" id="first">
            <h1 class="font-weight-bolder mb-3">Rent it and <span>read!</span></h1>
            <P>Book unforgettable cars from trusted hosts.</P>
            <form action="login.php" method="post">
                <div class="text d-flex">
                        <input id="phone2" name="phone" type="tel" placeholder="Mobile number" >
                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
                <div class="text d-flex ">
                    <label for="password" class="justify-content-center"><i class="fa fa-lock" aria-hidden="true"></i></label>
                    <input type="password" id="password" name="password" placeholder="Password">
                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
                <a href="#" id="myBtn"><P>Forget password?</P></a>
                
                <div class="submit d-flex justify-content-center">
                    <input type="submit" value="login" >
                </div>
            </form>
            <P class="pt-1">New to dryve? <a href="signup.php"><span>Sign Up</span></P></a>
        </div>
        <div class="col-lg-7 d-none d-lg-block" id="second">
            <img src="frontassets/image/10.jpg">
        </div>
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content" >
                <span class="close"></span>
                <P>Password recovery</P>
                <hr>
                <img src="frontassets/image/screenshot-xd.adobe.com-2021.11.24-19_36_50.png">
                <P>Lost your password? <br>Enter your details to recover</P>
                <P>Enter your details to proceed further</P>
                <form action="password.html" method="get">
                    <div class="text d-flex">
                        <input id="phone3" name="phone" type="tel" placeholder="Mobile number">
                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                    <div class="d-flex submit">
                        <input type="submit" value="Recover" >
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end login -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- telephone -->
    <script src="frontassets/js/intlTelInput.js"></script>
    <script type="text/javascript" src="frontassets/js/project.js"></script>
    <!-- slick link -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="frontassets/js/slick.js"></script>
    <!-- bootstarp link -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <!-- for check for width,height -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
    
</body>
</html>
