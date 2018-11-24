<?php 
session_start();
if(isset($_POST['email']))
 {
     //Udana walicacja
     $all_OK=true;

     //Sprawdzanie loginu
     $nick=$_POST['login'];
      //sprawdzenie długości loginu
     if(strlen($nick)<3||(strlen($nick))>20)
     {
        $all_OK=false;
        $_SESSION['error_nick']="Login musi zawierać od 3 do 20 znaków";
    }
     //sprawdzanie czylogin składa się z wyrazów alfanumerycznych
    if(ctype_alnum($nick)==false)
    {
        $all_OK=false;
        $_SESSION['error_nick']="Login może się składać tylko z liter i cyfr";
    }

  //  //Sprawdzanie adresu e-mail
  //  $safemail=filter_var($email,FILTER_SANITIZE_EMAIL);
  //  if((filter_var($email,FILTER_SANITIZE_EMAIL)==false)||($email//!=$safeemail))
  //  {
  //      //$all_OK=false;
  //  }
  //
  //exit();

   //Hasło
    //Sprawdzanie poprawności hasła
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];   


    if((strlen($password1)<8)||(strlen($password1)>20))
    {
        $all_OK=false;
        $_SESSION['error_password']="Hasło musi zawierać od 8 do 20 znaków";
    }
    if($password1!=$password2)
    {
        $all_OK=false;
        $_SESSION['error_password']="Hasła nie są identyczne!";
    }
    $pswd_hash=password_hash($password1, PASSWORD_DEFAULT);

    //Captcha
    $secret='6LeP3HgUAAAAACw8OBUelfyQZrf5ba8EbDC2l9cj';
    $check=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $response=json_decode($check);
    if($response->success==false)
    {
      $all_OK=false;
      $_SESSION['error_captcha']="Potwierdź, że nie jesteś botem.";
    }


    //Gender
  $gender=$_POST['gender'];

    //birthday
  $birthday=$_POST['birthday'];

    //Pictures
$pictures = array ("img/icons/Freddie-icon.png", 
  "img/icons/Frankenstein-icon.png", 
    "img/icons/Pinhead-icon.png",
    "img/icons/Mummy-icon.png",
  "img/icons/Hellboy-icon.png",
   "img/icons/Mike-icon.png",
   "img/icons/Skull-icon.png",
   "img/icons/Mummy-icon.png");
$random_picture=$pictures[array_rand($pictures)];


    //Final
    require_once"connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    try
    {
      $connection=new mysqli($host,$db_user,$db_password,$db_name);
      if($connection->connect_errno!=0)
      {
        throw new Exception(mysqli_connect_errno());
      }
      else
      {
        //czy email istneije?
        $email=$_POST['email'];
        $result = $connection->query("SELECT id FROM uzytkownicy WHERE email='$email'");
        if($result==false) throw new Exception($connection->error);
        $count_email=$result->num_rows;
        if ($count_email>0) 
        {
          $all_OK=false;
          $_SESSION['error_email']="Podany e-mail już wystąpił.";
        }
        //czy login istneije?
        $result = $connection->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
        if($result==false) throw new Exception($connection->error);
        $count_login=$result->num_rows;
        if ($count_login>0) 
        {
          $all_OK=false;
          $_SESSION['error_nick']="Podany login jest zajęty.";
        }
        //Udana walidacja
        if($all_OK==true)
         {
            if ($connection->query("INSERT INTO uzytkownicy VALUES (NULL,'$nick','$pswd_hash','$email','$gender','$birthday','$random_picture')"))
            {
              $_SESSION['udanarejestracja']=true;
          header('Location: index.php');
        }
            else
            {
            throw new Exception($connection->error);
            }
         }

        $connection->close();
      }
    }
    catch(Exception $error)
    {
      echo'Błąd serwera';
      echo '<br/> Info developerskie'.$error;
    }
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register Form</title>
   
    <!-- Captcha-->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Rejestracja</h2>
                    <form method="POST">

                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Login" name="login" >
                             <?php
                                if(isset($_SESSION['error_nick']))
                                { echo'<small style="font-size: 8x; color: #990000
                                  ; font-weight: 400; align:center;">'.$_SESSION['error_nick'].'</small>';
                                  unset($_SESSION['error_nick']);
                                }
                            ?>
                         </div>

                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Hasło" name="password1">
                             <?php
                                if(isset($_SESSION['error_password']))
                                { echo'<small style="font-size: 8x; color: #990000
                                  ; font-weight: 400; align:center;">'.$_SESSION['error_password'].'</small>';
                                  unset($_SESSION['error_password']);
                                }
                            ?>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Powtórz hasło" name="password2">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3 js-datepicker" type="text" placeholder="Data urodzenia" name="birthday">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="gender">
                                    <option disabled="disabled" selected="selected">Płeć</option>
                                    <option>Mężczyzna</option>
                                    <option>Kobieta</option>
                                    <option>Inna</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                             <?php
                                if(isset($_SESSION['error_email']))
                                { echo'<small style="font-size: 8x; color: #990000
                                  ; font-weight: 400; align:center;">'.$_SESSION['error_email'].'</small>';
                                  unset($_SESSION['error_email']);
                                }
                            ?>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LeP3HgUAAAAAPumnWq4oh3kxdUhznKqAm4kP3gI">
                        </div>
                           <?php
                              if(isset($_SESSION['error_captcha']))
                              { echo'<small style="font-size: 8x; color: #990000
                                ; font-weight: 400;">'.$_SESSION['error_captcha'].'</small>';
                                unset($_SESSION['error_captcha']);
                              }
                          ?>
                         <div class="p-t-10">
                            <button class="btn
                             btn--pill btn--green" type="submit">Zarejestruj się</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>
</html>
<!-- end document-->
<!-- required-->