<?php 
session_start();

if(isset($_SESSION['logged-in'])&&($_SESSION['logged-in']==true))
	{
		header('Location: signedin.php');
		exit();
	}
?>

<link href="addons/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet">
<script src="addons/bootstrap-3.2.0/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="animate.css">
<link rel="stylesheet" href="addons/font-awesome-4.7.0/css/font-awesome.min.css">
<link href="style.css" rel="stylesheet">
<script src="addons/jquery/jquery-3.3.1.js"></script>
<script src="addons/jquery/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MusicEYEZ</title>

			
</head>
<body>

<!-- Navigation -->


 <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand" href="#"><img src="img/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="indexM.html">Home</span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Wyszukiwarka</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="contact.html">Kontakt</a>
          </li>
      </ul>
      <ul class="navbar-nav mr-right">
         <li class="nav-link dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
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
          <button type="submit" class="btn btn-primary btn-block">Zaloguj się</button>
        </div>
        <div class="checkbox">
          <label>
          <input type="checkbox"> Pozostań zalogowany
           </label>
        </div>
        <hr>
        <div class="row text-center info">
        	<?php 
				if(isset($_SESSION['error']))echo $_SESSION['error']; 
				?>
		</div>
        </form>
        </div>
        <div class="bottom text-center">
        Pierwszy raz tutaj? <a href="reg.php"><b>Dołącz!</b></a>
        </div>
         </div>
      </li>
    </ul>
    

  </li>
      <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-2" type="text" placeholder="Wyszukaj..." aria-label="Search">
          <button class="btn btn-outline-success btn-lg" type="submit">Wyszukaj</button>
      </form>
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
		<img src="img/background.png" >
		<div class="carousel-caption">
			<h1 class="dispaly-2">MusicEYEZ</h1>
			<h2>Janusz Maj żyje</h2>
			<button type="button" class="btn btn-outline-light btn-lg">DEMO</button>
			<button type="button" class="btn btn-primary btn-lg">EXIT</button>
		</div>	
	</div>
	<div class="carousel-item">
		<img src="img/background2.png">
	</div>	
	<div class="carousel-item">
		<img src="img/background3.png">
	</div>
</div>
</div>


<!--- Jumbotron -->
<div class="container-fluid bg-dark">
<div class="row jumbotron bg-dark">
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10 hero_heading text-center">
		<p class="lead bg-dark" style="color:white;">Powiedz, powiedz czemu Świat twój milczy cały blady od wzruszeń Niczym słońce zaćmione przez księżyc Czekające na chwile poruszeń. Powiedz, czemu pragniesz Dojrzeć w oknach świata część odległą Niczym drzewo więdnące bez skargi Czekające na deszcze z nadzieją.</p>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
		<a href="#"><button type="button" class="btn btn btn-outline-secondary btn-lg">Link</button></a>
	</div>
</div>
</div>

<!--- Welcome Section -->
<div class="container-fluid padding" align="center">
<div class="row welcome text-center">
	<div class="col-12">
		<h1 class="display-4">Wong Fei Hung</h1>
	</div>
	<hr>
	<div class="col-12">
		<p class="lead">Mistrz Wong Fei-Hung zyskuje licznych wrogów z powodu prowadzenia mediacji między Europejczykami i Chińczykami, a także miłości do Yee, która wychowywała się według zachodnich standardów. </p>
	</div>
</div>	
</div>

<!--- Three Column Section -->
<div class="container-fluid">
<div class="row text-center padding">	
	<div class="col-xs-12 col-sm-6 col-md-4">
		<i class="fa fa-university"></i>
		<h3>Żonglerka</h3>
		<p>rodzaj rozrywkowej aktywności fizycznej, polegający na poruszaniu rekwizytami w niekonwencjonalny sposób.</p>
	</div>	
	<div class="col-xs-12 col-sm-6 col-md-4">
		<i class="fa fa-beer"></i>
		<h3>Yoyo</h3>
		<p>rodzaj zabawki w postaci ciężarka-szpulki zawieszonego na sznurku. </p>
	</div>	
	<div class="col-sm-12 col-sm-6 col-md-4">
		<i class="fa fa-car"></i>
		<h3>Latawiec</h3>
		<p>najstarszy i najprostszy konstrukcyjne przyrząd latający cięższy od powietrza. </p>
	</div>	
</div>	
<hr class="my-4 ">
</div>

<!--- Two Column Section -->
<div class="container-fluid padding" >
<div class="row padding">
	<div class="col-lg-6">
		<h2>If you build it...</h2>
		<p>Działająca przy zalewie elektrownia stwarza idealne warunki do rozwoju ryb. Wodę, która nigdy całkowicie nie zamarza, upodobały sobie szczególnie sumy.</p>
		<p>- Koledzy wyciągają tu czasami okazy po około 2,4 metra, ale takie ponad 2,5 metra to rzadkość - przyznaje. Nie zamierza jednak spocząć na laurach i zapowiada, że marzy mu się pobicie kolejnej granicy - złowienie ryby ponad 2,7 metra.</p>
		<p>Wyciąganie suma na brzeg trwało kilkanaście minut. Pan Szymon przyznaje, że na szczęście akurat łowił z kolegami. Gdyby był sam, wyciągnięcie ponad 100-kilogramowego giganta mogłoby okazać się niemożliwe.</p>
		<a href="https://wiadomosci.wp.pl/nowy-rekord-polski-mieszkaniec-tychow-wylowil-giganta-6307943340857473a" class="btn btn-primary">Dowiedz się wiecej</a>
		</div>
		<br>
	<div class="col-lg-6">
		<img src="img/sum.png" class="image-fluid">
	</div>
	</div>
</div>

<hr class="my-4">
<!--- Fixed background -->
<figure>
	<div class="fixed-wrap">
		<div id="fixed">
		</div>
	</div>
</figure>

<!--- Emoji Section -->
<button class="fun btn-outline-light" data-toggle="collapse" data-target="#emoji">Rozwiń</button>
 <div id="emoji" class="collapse">
<div class="container-fluid padding">
<div class="row text-center">
	<div class="col-sm-8 col-md-4">
		<img class="gif" src="img/gif/fish.gif">
	</div>
	<div class="col-sm-8 col-md-4">
		<img class="gif" src="img/gif/fish.gif">
	</div>
	<div class="col-sm-8 col-md-4">
		<img class="gif" src="img/gif/fish.gif">
	</div>		
</div>
</div>
 </div>

<!--- Meet the team -->
<div class="container-fluid" align="center">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-5">Met the team</h1>
		</div>
		<hr>
	</div>
</div>
<hr class="my-4">
<!--- Cards -->
<div class="container-fluid padding">
	<div class="row padding">
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="img/team1.png">
				<div class="card-body">
					<h4 class="card-title">John Doe</h4>
					<p class="card-text">Był renesansowym polihistorem, poza astronomią zajmował się również matematyką, prawem, ekonomią, strategią wojskową, astrologią, był także lekarzem oraz tłumaczem.</p>
					<a href="#" class="btn btn-outline-secondary">Sea Profile</a>
				</div>	
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="img/team2.png">
				<div class="card-body">
					<h4 class="card-title">Johnny Sins</h4>
					<p class="card-text">Polski menedżer, bankowiec i polityk. Od 2017 prezes Rady Ministrów. Prezes zarządu Banku Zachodniego WBK w latach 2007–2015, wiceprezes Rady Ministrów, minister rozwoju, a następnie minister rozwoju i finansów.</p>
					<a href="#" class="btn btn-outline-secondary">Sea Profile</a>
				</div>	
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="img/team3.png">
				<div class="card-body">
					<h4 class="card-title">Jane Doe</h4>
					<p class="card-text">Polska piosenkarka, wykonująca muzykę pop i dance. Od debiutu w 2004 wydała pięć albumów studyjnych i wylansowała przeboje, takie jak m.in. „Pozwól żyć”, „Słowa”, „Trochę ciepła” i „Otwórz oczy”.</p>
					<a href="#" class="btn btn-outline-secondary">Sea Profile</a>
				</div>	
			</div>
		</div>
	</div>	
</div>


<!--- Two Column Section -->
<div class="container-fluid padding">
<div class="row padding">
	<div class="col-lg-6">
		<h2>Nasze cele</h2>
		<p class="psize"> TESTOWAŁEM TUTAJ CSS DO WIELKOŚCI PARAGRAFÓW. POTEM MOŻNA ZMIENIĆWykonaliśmy w terenie wielką pozytywistyczną pracę. Wierzę, że to przyniesie sukces. Prognozować jednak nie będę, bo wierzę w zasadę, że najlepszym sposobem przewidywania przyszłości jest jej tworzenie. </p>
		<p>- Jestem przekonany, że stworzyliśmy mocne podwaliny pod dobry wynik wyborczy.</p>
	</div>
	<div class="col-lg-6">
		<img src="img/bootstrap22.png" class="image-fluid">
	</div>
</div>
<hr class="my-4">
</div>

<!--- Connect -->
<div class="container-fluid padding">
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
<footer>
	<div class="container-fluid">
	<div class="row text-center">
		<div class="col-md-4">
			<img src="img/w3newbie.png">
			<hr class="light">
			<ul>
				<li>tel: 7981568</li>
				<li>adress: X</li>
				<li>e-mail: xxx@gmail.com</li>
				<li>Miasto: Gdańsk</li>
			</ul>
		</div>
		<div class="col-md-4">
			<hr>
			<h5>Godziny otwarcia</h5>
			<hr class="light">
			<p>Poniedziałek</p>
			<p>Wtorek</p>
			<p>Środa</p>
			<p>Czwartek</p> 
			<p>Piątek</p> 
		</div>
		<div class="col-md-4">
			<hr>
			<h5>Coś tam</h5>
			<hr class="light">
			<p>Jeden</p>
			<p>Dwa</p>
			<p>Trzy</p>
		</div>
		<div class="col-12">
			<hr class="light-100">
			<h5>&copy; xxx.com</h5>
	</div>
	</div>	
</footer>

</body>
</html>