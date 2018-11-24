<?php 
if(!session_id()) {
    session_start();
}

if((!isset($_SESSION['logged-in']))&&(!isset($_SESSION['access_token'])))
	{
		header('Location: index.php');
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
<link rel="stylesheet" href="css/style.css">
<link href="style.css" rel="stylesheet">
<script src="addons/jquery/jquery-3.3.1.js"></script>
<script src="addons/jquery/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>			
</head>
<body>

<!-- Navigation --> 

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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="margin-right: 200px; 
             color: #57B846">
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





<div id="slides" class="carousel slide" data-ride="carousel"> 
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>
	</ul>
<div class="carousel-inner">
	<div class="carousel-item active">
		<img src="img/TEST/carousel1.jpg">
		<div class="carousel-caption">
			<h1 class="dispaly-2">MusicEyez</h1>
			<h2>najlepsza darmowa wyszukiwarka Twojej ulubionej muzyki</h2>
			<button type="button" class="btn btn-outline-light btn-lg" style="padding: 15px 32px;">Wyszukaj</button>
			<button type="button" class="btn btn-success btn-lg" style="padding: 15px 32px;">Dołącz!</button>
		</div>	
	</div>
	<div class="carousel-item">
		<img src="img/TEST/carousel2.jpg">
	</div>	
	<div class="carousel-item">
		<img src="img/TEST/carousel3.jpg">
	</div>
</div>
</div>


<!--- Jumbotron -->
<div class="container-fluid">
<div class="row jmbcolor">
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10 hero_heading text-center">
		<p>Powiedz, powiedz czemu Świat twój milczy cały blady od wzruszeń Niczym słońce zaćmione przez księżyc Czekające na chwile poruszeń. Powiedz, czemu pragniesz Dojrzeć w oknach świata część odległą Niczym drzewo więdnące bez skargi Czekające na deszcze z nadzieją.</p>
	</div>
	</div>
</div>





<!--- Fixed background -->
<figure>
	<div class="fixed-wrap">
		<div id="fixed">
		</div>
	</div>
</figure>
<hr class="my-4"> 
<!--- Cards -->
<div class="container-fluid padding align="center" style="color: white; font-family: 'Poppins', sans-serif;">
<div class="row text-center padding">
	<div class="col-lg-12">
		<h2>Poznaj twórców strony</h2>
	</div>
</div>	
</div>




<div class="container-fluid padding">
	<div class="row padding">
		<div class="col-md-4 center-block">
			<div class="card">
				<img class="card-img-top" src="img/card1.jpg">
				<div class="card-body cardbgcolor">
					<h4 class="card-title text-center"><b>Mikołaj Życzyński</b></h4>
					<p class="card-text">Był renesansowym polihistorem, poza astronomią zajmował się również matematyką, prawem, ekonomią, strategią wojskową, astrologią, był także lekarzem oraz tłumaczem.</p>
					<a href="#" class="btn btn-outline-secondary btn-lg" ><i class="fa fa-at"> Send e-mail</i></a>
				</div>	
			</div>
		</div>
		<div class="col-md-4 center-block">
			<div class="card">
				<img class="card-img-top" src="img/card2.jpg">
				<div class="card-body cardbgcolor">
					<h4 class="card-title text-center"><b>Paweł Karwowski</b></h4>
					<p class="card-text">Polski menedżer, bankowiec i polityk. Od 2017 prezes Rady Ministrów. Prezes zarządu Banku Zachodniego WBK w latach 2007–2015, wiceprezes Rady Ministrów, minister rozwoju, a następnie minister rozwoju i finansów.</p>
					<a href="#" class="btn btn-outline-secondary btn-lg"><i class="fa fa-at"> Send e-mail</i></a>
				</div>	
			</div>
		</div>		
	</div>	
</div> 
<!--- Connect -->
<div class="container-fluid padding align="center" style="color: white; font-family: 'Poppins', sans-serif;">
<div class="row text-center padding">
	<div class="col-lg-12">
		<h2>Kontakt</h2>
	</div>
	<div class="col-12 social padding">
		<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
		<a href="twitter.com"><i class="fa fa-twitter"></i></a>
		<a href="instagram.com"><i class="fa fa-instagram"></i></a>
		<a href="youtube.com"><i class="fa fa-youtube"></i></a>	
	</div>	
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