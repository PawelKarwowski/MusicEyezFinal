<?php 
//session_start();
if(!session_id()) {
    session_start();
}

if((!isset($_SESSION['logged-in']))&&($_SESSION['logged-in']==false)&&(!isset($_SESSION['access_token'])))
	{
		header('Location: index.php');
    }
?>

<?php
// Turn off all error reporting
//error_reporting(E_ALL ^ E_NOTICE);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>MusicEYEZ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

<link href="addons/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="animate.css">
<link rel="stylesheet" href="addons/font-awesome-4.7.0/css/font-awesome.min.css">
<script src="addons/jquery/jquery-3.3.1.js"></script>
<script src="addons/jquery/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
<link href="style.css" rel="stylesheet">
</head>
<body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="js/search.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Navbar -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="img/TEST/logo.jpg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="search.php">Wyszukiwarka</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Kontakt</a>
          </li>
      </ul>
      <ul class="navbar-nav">
         <li class="nav-link dropdown">
         <ul class="navbar-nav">
            <li class="dropdown">                
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="margin-right: 130px; 
             color: #57B846">
             <i class="fa fa-user-circle-o" aria-hidden="true"></i>
             <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        Witaj, <?php 
									if (!isset($_SESSION['user'])) 
									{
										echo $_SESSION['userData']['first_name'].' '.$_SESSION['userData']['last_name']; 
									} else{
										echo $_SESSION['user'];
									}
								?>!</a>
         <ul class="dropdown-menu" id="login-dp">
            <li>
         	<div class="navbar-login">
            <div class="row">
            <div class="col-lg-4">
                <p class="text-center">
				<img src="<?php 
								if (!isset($_SESSION['user'])) 
									{
										echo $_SESSION['userData']['picture']['url']; 
									} else{
										echo $_SESSION['picture'];
									}
							?>" height="90" width="90">

                    <i class="" aria-hidden="true"></i>

                </p>
            </div>
            <div class="col-lg-8">
                <p class="text-center"><strong>Użytkownik 
                				<?php 
									if (!isset($_SESSION['email'])) 
									{
										echo $_SESSION['userData']['first_name'].' '.$_SESSION['userData']['last_name']; 
									} else{
										echo $_SESSION['user'];
									}
								?></strong></p>
                <p class="text-left"><?php 
									if (!isset($_SESSION['email'])) 
									{
										echo $_SESSION['userData']['email']; 
									} else{
										echo $_SESSION['email'];
									}	
									?></p>
                <p class="text-left">
                    <a href="#" class="btn btn-primary btn-lg">Panel użytkownika</a>
                </p>
            </div>
                     </div>
                 </div>
             </li>
             <li class="divider"></li>
             <li>
              
                 <div class="navbar-login navbar-login-session">
                     <div class="row">
                         <div class="logoff col-lg-6">
                             <p>
                                 <a href="logout.php" class="btn btn-danger btn-lg align-middle">Wyloguj się</a>
                             </p>
                         
                         </div>
                     </div>
                 </div>
             </li>
             </ul>
         </li>
            </ul>
  </div>
</div>
</nav>


<!-- Input & Search -->

<hr class="light" style="width:100%;">
<div class="input-container">

<form method="POST">
	<input id="readme" name="search" onfocus="this.value=''" class="input" placeholder="Insert artist name">
  <input type="submit"  value="Search" class="btnsearch">
</form>

<script type="text/javascript">
var value = "<?php echo $_POST['search'] ?>";
var url="http://ws.audioscrobbler.com/2.0/?method=artist.gettopalbums&limit=3&api_key=c46749239cc8ed007bbbd8c66673378e&format=json&artist=" + value;          
       
       $.getJSON(url,function(json){ 

       document.getElementById('heading').innerHTML = "TOP 3 ALBUMS";
                  
       /* Obrazki okładek */
       var img1 = json.topalbums.album[0].image[3]["#text"];
       var img2 = json.topalbums.album[1].image[3]["#text"];
       var img3 = json.topalbums.album[2].image[3]["#text"];
       
        console.log(img1);
       $("#result0").attr('src', img1);
       $("#result1").attr('src', img2);
       $("#result2").attr('src', img3);
       
   
       /* URL */   
        var strLink0 = (json.topalbums.album[0].url);
        var strLink1 = (json.topalbums.album[1].url);
        var strLink2 = (json.topalbums.album[2].url);
   
       /* $("#link0").attr('href',strLink0).text(strLink); */ /* Pokazuje pełny link */
       /*$("#link1").attr('href',strLink1); */ /*Ukrywa link, zeby można było dodać tekst <a> XXX </a>*/
      
   
       $("#link0").attr('href',strLink0).text(strLink0);
       $("#link1").attr('href',strLink1).text(strLink1);
       $("#link2").attr('href',strLink2).text(strLink2);
   
       /* Nazwy albumów, które wyświetlam nad ich okładkami */
       var nameofalbum0 = (json.topalbums.album[0].name);
       var nameofalbum1 = (json.topalbums.album[1].name);
       var nameofalbum2 = (json.topalbums.album[2].name);
   
       $("#name0").attr('h1', nameofalbum0).text(nameofalbum0);
       $("#name1").attr('h1', nameofalbum1).text(nameofalbum1);
       $("#name2").attr('h1', nameofalbum2).text(nameofalbum2);
   
   
      }); 
          /* Info o zespole i zdjęcie główne */
           var url1="http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&format=json&api_key=c46749239cc8ed007bbbd8c66673378e&artist=" + value;
   
           $.getJSON(url1,function(json){          
   
               $("#info").attr('p', json.artist.bio.summary).text(json.artist.bio.summary);
               $("#info-img").attr('src', json.artist.image[5]["#text"]);    
           });  
</script>


</div>
<hr class="light" style="width:100%;">

<?php 
require_once"youtube.php";
?>

<!-- Artist Info -->

<div class="bioinfo">  
<table>    
  <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10 text-center">   
      <p id="info" style="font-size: medium;"></p>  
      </div>   
</table>

<img id="info-img" class ="info-img">

</div>

<!-- Heading -->

<div class="album-info">  
  <p id="heading" class="heading_style"></p>  
</div>

<!-- Gallery -->
<!-- TUUUUUUUUUUUUTAJ TESTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->


<div class="container">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-6 img_space ">
          <h1 id="name0" class="gal-header"></h1>
         <img class="img-responsive" id="result0">
         <a id="link0" class="contrainer-link"></a>
       </div>
  
        <div class="col-md-4 col-lg-4 col-sm-6 img_space">
          <h1 id="name1" class="gal-header"></h1>
          <img class="img-responsive" id="result1">
          <a id="link1" class="contrainer-link"></a>
        </div>

        <div class="col-md-4 col-lg-4 col-sm-6 img_space">
          <h1 id="name2" class="gal-header"></h1>
          <img class="img-responsive" id="result2">
          <a id="link2" class="contrainer-link"></a>
        </div>      
    </div>
</div>


<div class="col-md-1 col-md-offset-4">
<?php 
    if(isset($_POST['search']))
    {
        echo $_SESSION['video'];
    }
    else{ }

?>
</div>
 <!-- <p style="color:white; text-align: center; font-size: 8px">Created by Paweł Karwowski & Mikołaj Życzyński</p> -->

</body>
</html>