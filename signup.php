<?php

require 'dbconnection.php';

$sql ='select * from user_type';
$op = mysqli_query($con,$sql);

if($_SERVER['REQUEST_METHOD']=="POST")
{
 $name     = $_POST['name'];
 $mobile   = $_POST['phone'];
 $email    = $_POST['email'];
 $password = $_POST['password'];
 $address  = $_POST['address'];


      //name
 if(empty($name))
 {
    echo "name required";
 }

      //mobile
 if(empty($mobile))
 {
     echo "required";
 }

      //email
 if(empty($email))
 {
     echo "required";
 }
 elseif(!filter_var($email, FILTER_VALIDATE_EMAIL ))
 {
     echo "should be an email";
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

     //address
 if(empty($address))
 {
     echo "required";
 }   

     //check
  if(!empty($name&&$mobile&&$email&&$password&&$address)&&filter_var($email, FILTER_VALIDATE_EMAIL )&&strlen($password)>=6)
     
   {
      //code
      $password = md5($password);
      $sql = "insert into users (name,password,mobile,email,address,usertype_id) values ('$name','$password','$mobile','$email','$address',3)";
      $opl = mysqli_query($con,$sql);

      if ($opl) 
      {
          echo "raw inserted";
      }
      else 
      {
          echo "Error Try Again". mysqli_error($con);
      }

      header('Location: index.php');


   }




}

?>

<!DOCTYPE html>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet" type="text/css">
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

    <!-- start signup -->
    <section class="row" id="signup">
        <div class="col-lg-5" id="first">
            <h1 class="font-weight-bolder mb-3">Rent it and <span>dryve!</span></h1>
            <P>Book unforgettable cars from trusted hosts.</P>
            <form action="signup.php" method="post">
                <div class="d-flex name">
                    <div class=" d-flex">
                        <label for="name" class="justify-content-center"><i class="fa fa-user"
                                aria-hidden="true"></i></label>
                        <input type="name" id="name" name="name" placeholder="name">
                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                    
                </div>
                <div class="text d-flex">
                    <input id="phone4" name="phone" type="tel" placeholder="Mobile number">
                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
                <div class="text d-flex ">
                    <label for="email" class="justify-content-center"><i class="fa fa-envelope"
                            aria-hidden="true"></i></label>
                    <input type="email" id="email" name="email" placeholder="email">
                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
                <div class="text d-flex">
                    <label for="password" class="justify-content-center"><i class="fa fa-lock"
                            aria-hidden="true"></i></label>
                    <input type="password" id="password" name="password" placeholder="Password">
                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
                <div class="text d-flex ">
                    <label for="address" class="justify-content-center"><i class="fa fa-user"
                            aria-hidden="true"></i></label>
                    <input type="text" id="address" name="address" placeholder="address">
                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
                <P class="plast">By creating account you’ll accept our <a href="#"><span>Privacy policies</span></P></a>
                <div class="d-flex submit">
                    <input type="submit" value="Create account">
                </div>
            </form>
            <P class="pt-1">Have an account? <a href="login.html"><span>login.</span></a></P>
        </div>
        <div class="col-lg-7 d-none d-lg-block" id="second">
            <img src="frontassets/image/29.jpg">
        </div>
    </section>
    <!-- end signup -->
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
    <script>
        var input = document.querySelector("#phone4");
        window.intlTelInput(input, {
            preferredCountries: ['Eg', 'us'],
            utilsScript: "build/js/utils.js",
        });
    </script>
</body>

</html>