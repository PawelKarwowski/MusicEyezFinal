<?php 
session_start();

if(isset($_SESSION['logged-in'])&&($_SESSION['logged-in']==true))
	{
		header('Location: signedin.php');
		exit();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>MusicEYEZ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<link href="addons/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet">
<script src="addons/bootstrap-3.2.0/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="animate.css">
<link rel="stylesheet" href="addons/font-awesome-4.7.0/css/font-awesome.min.css">
<
<script src="addons/jquery/jquery-3.3.1.js"></script>
<script src="addons/jquery/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>		
<link rel="stylesheet" href="finder_style.css">	
</head>
<body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

<!-- Navigation -->


 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="img/TEST/logo.jpg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <a class="nav-link active" href="indexM.php">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Wyszukiwarka</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Kontakt</a>
          </li>
      </ul>
      <ul class="navbar-nav">
         <li class="nav-link dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="margin-right: 200px; 
             color: #57B846">Login</a>
        <ul id="login-dp" class="dropdown-menu">
        <li>        
        <div class="col-md-12">
          Zaloguj się przez:
        <div class="social-buttons">
          <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
          <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
        </div>
        lub
        <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
        <div class="form-group">
           <label class="text" for="exampleInputlogin"></label>
           <input type="text" name="login" class="form-control" id="exampleInputllogin" placeholder="Nazwa użytkownika" required>
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword2">Hasło</label>
           <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Hasło" required>
        <div class="help-block text-right"><a href="">Zapomniałeś hasło?</a></div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block">Zaloguj się</button>
        </div>
        <div class="checkbox">
          <label>
          <input type="checkbox"> Pozostań zalogowany
           </label>
        </div>
        <div class="row text-center info">
        	<?php 
				if(isset($_SESSION['error']))echo $_SESSION['error']; 
				?>
		</div>
        </form>
        </div>
        <div class="bottom text-center">
        Pierwszy raz tutaj? <a href="reg.php"><b style="color: #57B846">Dołącz!</b></a>
        </div>
         </div>
         <form class="form-inline my-2 my-lg-0">                  
      </form>
  </div>
</div>
</nav>



<!-- Search -->

<script>

    function search(){
    		
       var value = document.getElementById('readme').value;
       var url="http://ws.audioscrobbler.com/2.0/?method=artist.gettopalbums&limit=5&api_key=c46749239cc8ed007bbbd8c66673378e&format=json&artist=" + value;          
       console.log(url);

       $.getJSON(url,function(json){
 console.log(json); 

 		 document.getElementById('heading').innerHTML = "TOP 5 ALBUMS";

 		 		
        //$("#result0").append('<p class=albumName>' + '"' + json.topalbums.album[0].name+'" '+ ' </p> ');
       $("#result0").append('<p>'+'<img class="miniature" src="'+json.topalbums.album[0].image[3]["#text"]+ '"  />'+'</p>');
        
        //$("#result1").append('<p class=albumName>' + '"' + json.topalbums.album[1].name+'" '+ ' </p> ');
       $("#result1").append('<p>'+'<img class="miniature" src="'+json.topalbums.album[1].image[3]["#text"]+ '"  />'+'</p>');

       //$("#result2").append('<p class=albumName>' + '"' + json.topalbums.album[2].name+'" '+ ' </p> ');
       $("#result2").append('<p>'+'<img class="miniature" src="'+json.topalbums.album[2].image[3]["#text"]+ '"  />'+'</p>');

      //$("#result3").append('<p class=albumName>' + '"' + json.topalbums.album[3].name+'" '+ ' </p> ');
       $("#result3").append('<p>'+'<img class="miniature" src="'+json.topalbums.album[3].image[3]["#text"]+ '"  />'+'</p>');

       //$("#result4").append('<p class=albumName>' + '"' + json.topalbums.album[4].name+'" '+ ' </p> ');
       $("#result4").append('<p>'+'<img class="miniature" src="'+json.topalbums.album[4].image[3]["#text"]+ '"  />'+'</p>');


        	
          
   });
    	var url1="http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&format=json&api_key=8757c232e88c68d602c6e22e4924cf03&artist=" + value;

    	$.getJSON(url1,function(json){    		

    		$("#info").append(json.artist.bio.summary);
    	}
    );
}

    </script>
<div class="input-container">
	<input id="readme" onfocus="this.value=''" class="input">
    <input type="submit"  onClick="search()" value="Search" class="btnsearch">
</div>

<div class="bioinfo">

<p id=info></p>

</div>



<div class="album-info">	
	
	<p id="heading" class="heading_style"></p>

	
</div>


<div class="gallery-containter">

<div class="gallery">  
    <img id="result0">
</div>
<div class="gallery">  
    <img id="result1">
</div>
<div class="gallery">  
    <img id="result2">
</div>
<div class="gallery">  
    <img id="result3">
</div>
<div class="gallery">  
    <img id="result4">
</div>

</div>


<!--- Footer -->
<footer style="font-size: 15px;">
	<div class="container-fluid">
	<div class="row text-center">
		<hr class="light-100">
		<div class="col-md-4">
			
			<h5>Kontakt</h5>
			<hr class="light">
			<ul>
				<li>tel: 7981568</li>				
				<li>e-mail: xxx@gmail.com</li>
				<li>Miasto: Gdańsk</li>
			</ul>
		</div>
		<div class="col-md-4">
			
			<h5>Godziny otwarcia</h5>
			<hr class="light">
			<p>Poniedziałek</p>
			<p>Wtorek</p>
			<p>Środa</p>
			<p>Czwartek</p> 
			<p>Piątek</p> 
		</div>
		<div class="col-md-4">
			
			<h5>Coś tam</h5>
			<hr class="light">
			<p>Jeden</p>
			<p>Dwa</p>
			<p>Trzy</p>
		</div>
		<div class="col-12">
			<hr class="light-100">
			<h5>&copy; musiceyez.com</h5>
	</div>
	</div>	
</footer>

</body>
</html>