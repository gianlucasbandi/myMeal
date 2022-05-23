<?php
	session_start();
	if (!isset($_SESSION['user_email'])) {
		header("location: loggati.html");
	}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../../img/logo-tiny.ico">
    <link rel="stylesheet" href="./style.css">
  	<title>myMeal</title>
</head>
<body class="text-center">
	<div class="creapasto">
	<div class="box ">
		<form action="./insert.php" id="form" method="POST">
			<label for="date">Data</label>
			<input type="date" name="data" id="data" required>
			<label for="tipo">Pasto</label>
			<select name="tipo" id="tipo" required>
				<option value="colazione">Colazione</option>
				<option value="pranzo">Pranzo</option>
				<option value="cena">Cena</option>
				<option value="spuntino">Spuntino</option>
			</select>
			<label for="alimento">Alimento</label>
			<input type="text" id="alimento" name="alimento" placeholder="Cerca alimento" required autofocus>
		</form>
		<button id="nuova-riga">Inserisci alimento</button>
	</div>
	
	<div id="tabella-container"></div>
	<div id="messaggi"></div>
	</div>

	<!-- Footer -->
	<footer class="text-center text-lg-start text-white mt-5">
		<!-- Grid container -->
		<div class="container p-3">
		  <!--Grid row-->
		  <div class="row my-3">
			<!--Grid column-->
			<div class="mb-4 mb-md-0">
			  <div class="d-flex align-items-center justify-content-center mx-auto" style="width: 150px; height: 150px;">
				<img src="../../img/logo_white_large.png" height="70"/>
			  </div>
			</div>
			<!--Grid column-->
			<div class="row d-flex align-items-center justify-content-center mx-auto">
			  <div class="col-lg-3 col-md-6 mb-4 mb-md-0 mt-5">
				<h5 class="text-center mb-4 ">Gianluca Sbandi</h5>
				<ul class="list-unstyled">
				  <li>
					<i>
					  <a class="d-flex align-items-center justify-content-center mx-auto" href="mailto:sbandi.1792041@studenti.uniroma1.it">sbandi.1792041@studenti.uniroma1.it</a>
					</i>
				  </li>
				</ul>
			  </div>
			  <!--Grid column-->
			  <div class="col-lg-3 col-md-6 mb-4 mb-md-0 mt-5">
				<h5 class="text-center mb-4 ">Alessia Pontiggia</h5>
				<ul class="list-unstyled">
				  <li>
					<i>
					  <a class="d-flex align-items-center justify-content-center mx-auto" href="mailto:pontiggia.99999@studenti.uniroma1.it">pontiggia.99999@studenti.uniroma1.it</a>
					</i>
				  </li>
				</ul>
			  </div>
			  <!--Grid column-->
			  <div class="col-lg-3 col-md-6 mb-4 mb-md-0 mt-5">
				<h5 class="text-center mb-4 ">Lorenzo Proietti Cosimi</h5>
				<ul class="list-unstyled">
				  <li>
					<i>
					  <a class="d-flex align-items-center justify-content-center mx-auto" href="mailto:proietticosimi.99999@studenti.uniroma1.it">proietticosimi.99999@studenti.uniroma1.it</a>
					</i>
				  </li>
				</ul>
			  </div>
			</div>
		  </div>
		  <!--Grid row-->
		</div>
		<!-- Grid container -->
	
		<!-- Copyright -->
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
		  A.A. 2021/2022
		</div>
		<!-- Copyright -->
	</footer>
	<!-- Footer -->

  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="./functions.js"></script>
</body>
</html>