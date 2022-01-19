<?php

require 'dbconnection.php';

$sql = 'select * from users';
$op = mysqli_query($con,$sql);

if($_SERVER['REQUEST_METHOD']=="POST")
{

$title   = $_POST['title'];
$content = $_POST['content'];
$time    = $_POST['time'];

       //title
  if(empty($title))
  {
     echo "title required";
  }


      //content
  if(empty($content))
  {
     echo "content required";
  }
  
      //time
  if(empty($time))
  {
      echo "time required";
  }
   
        //image
  if(empty($_FILES['image']['name']))
  {
      echo "image required";
  }
   else
   {
    $ImgTempPath = $_FILES['image']['tmp_name'];
    $ImgName     = $_FILES['image']['name'];

    $extArray = explode('.', $ImgName);
    $ImageExtension = strtolower(end($extArray));

    $allowedExtensions   = ['png','jpg','gif'];

       if(in_array($ImageExtension ,$allowedExtensions)){
           // upload code ..... 
          
        $FinalName = time() . rand() . '.' . $ImageExtension;

       }

      else{
           echo 'Invalid Extension';
       }
   }



   //check
   if(!empty($title&&$content&&$time&&$_FILES['image']['name']))
     {
        //code

        $disPath = './uploads/' . $FinalName;

        if (move_uploaded_file($ImgTempPath, $disPath)) {

            $userId = $_SESSION['user']['id'];


    $sql = "insert into articles(title,content,time,image,user_id) values ('$title','$content','$time','$FinalName',$userId)";
    $opl = mysqli_query($con, $sql);

     if($opl)
     {
         echo "raw inserted";
     }
    else
     {
         echo "failed";
     }

        } 
        else
        {
            echo "error uploading image";
        }

     }

}

?>



<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="website that help people benefit their old books">
    <meta name="keywords" content="book ,reading ,exchangebook">
    <meta name="author" content="Mariam Essam">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="frontassets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="frontassets/css/all.css">
    <title>Exchange_books</title>
</head>

<body>
    <div class="bg">
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
                <a class="navbar-brand" href="#"><span>Reading_Exchange</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon ">
                        <i class="fa fa-navicon" style="color:#fff; font-size:26px;margin:0px;"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="categories.html">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Gallery.html">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="articles.php">Articles</a>
                        </li>
                        <li class="nav-item  active">
                            <a class="nav-link" href="addarticles.php">addarticles</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar -->
        <!-- start header -->
        <header>
            <div class="container">
                <div>
                    <h1>ADD articles</h1>
                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta veritatis in <br>tenetur
                        doloremque, maiores doloribus officia iste. Dolores.
                        .</h4>
                    <a href="#">
                        <div id="button">Learn More</div>
                    </a>
                </div>
            </div>
        </header>
    </div>
    <!-- end header -->
    <!-- start section_contact -->
    <section id="section_contact">
        <div class="container">
            <div id="first">
                <h1 class="text-center font-weight-medium">add articles Or Use This Form To Rent A Car</h1>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda,
                    dolorum necessitatibus eius earum voluptates sed!</p>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-12" id="form">
                    <form action="addarticles.php" method="post" enctype="multipart/form-data">
                        <div class="form-group form-inline">
                            <input class="form-control text1" type="text" name="title"
                                placeholder="title"></input>


                            <input class="form-control" type="time" name="time" placeholder="time"></input>
                        </div>
                    
                        <div class="form-group">
                            <textarea class="form-control" name="content"
                                placeholder="content..."></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="file" name="image">

                        </div>
                        <div class="form-group">
                            <input class="form-control" type="submit" value="Add your article">
                        </div>
                    </form>
                </div>
                <div id="contact" class="col-lg-3 col-md-12">
                    <h1>Contact Info</h1>
                    <h2>Address:</h2>
                    <p>34 Street Name, City Name Here, United States</p>
                    <h2>Phone:</h2>
                    <p>+1 242 4942 290</p>
                    <h2>Email:</h2>
                    <p>info@yourdomain.com</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end section_contact -->
    <!-- start footer -->
    <footer>
        <div class="container text-center">
            <div id="first">
                <h1>Reading_Exchange</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="frontassets/index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="categories.html">categories</a></li>
                    <li><a href="addarticles.php">addarticles</a></li>
                </ul>
            </nav>
            <ul id="ulicon2">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            </ul>
            <hr>
        </div>
    </footer>
    <!-- end footer -->
    <!-- start siction loading   -->
    <section class="loading-overlay">
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </section>
    <!-- end section loading -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="frontassets/js/project.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>