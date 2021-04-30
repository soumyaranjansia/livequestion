<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<title>Accueil de Livequestion</title>
</head>
<body>

		<!--- navbar --->

	<header>
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid navleft">
				<a class="navbar-brand" href="#"><b>Saint Vincent BTS 1</b></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
				<div class="collapse navbar-collapse navright" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Lien1
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Lien2
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Lien3
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Lien4
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
					</ul>
					<a href="Log-in.php"><button class="btn btn-primary taille_connecte">Se connecter</button></a>
				</div>
			</div>
		</nav>
	</header>

		<!--- Main --->

		<main>

			<!--- Section 1 --->
			<div class="section_1_background">
				<div class="lorem">
					<h1><b>Lorem ipsum <br> dolor sit <br>amet.</b></h1>

					<p>Sed elit libero, accumsan et volutpad id, aliquam<br>
						tristique odio. Mauris sed lectus a justo malesuada<br>
						dapibus. Morbi eleifend tellus nisi, sed ullamcorper<br>
						mi tincidunt faucibus. Mauris justo tortor, tempor<br>
					ut odio in, dictum malesuada eros.</p>
					<button class="btn btn-primary taille_cta" type="submit">Bouton CTA</button>
				</div>

				<img class="step_1" src="ressources/step-1.png" alt="step_1">
			</div>
			<div class="container">
				<div class="row trio_txt">
					<div class="col">
						<img src="ressources/i1.png" alt="image1">
						<h4><b>Suits Your Style</b></h4>
						<p>Drogon sed ut perspiciatis unde omnis iste error<br>
							sit voluptatem accusantium doloremque<br>
						laudantium, totam aperiam, eaque Arya.</p>
					</div>
					<div class="col">
						<img src="ressources/i2.png" alt="image2">
						<h4><b>Ut posuere melestie</b></h4>
						<p>Duis convallis convallis tellus imp interdum. Non<br>
							diam phasellus vestibulum lorem sed risus <br>
						ultricies Tyrion. Enim blandit volutpat.</p>
					</div>
					<div class="col">
						<img src="ressources/i3.png" alt="image3">
						<h4><b>Vestibulum ut erat consectetur</b></h4>
						<p>Eunuch sed blandit libero volutpat sed cras.<br>
							Cersei quis imperdiet tincidunt unuch pulvinar<br>
						sapien. Habitasse platea Davos vestibulum.</p>
					</div>
				</div>
			</div>
			<!--- Section 2 --->
			<div class="section_2_background">
				<div class="aenean">
					<h2><b>Aenean magna odio</b></h2>

					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem <br>
					accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</p>
					<div class="lien_button">
						<button id="lien1" type="button" class="btn btn-outline-primary">Lien1</button>
						<button id="lien2" type="button" class="btn btn-outline-primary">Lien2</button>		
						<button id="lien3" type="button" class="btn btn-outline-primary">Lien3</button>
					</div>
				</div>

				<!--- Section 2 L1--->

				<div id="l1">

					<img class="img_l1" src="ressources/step-2.jpg" alt="step_3">

					<div class="txt_l1">
						<h3><b>Praesent vitae velit<br> tristique old alos</b></h3>
						<p>Ned ut perspiciatis unde omnis iste natus error sit<br>
							voluptatem accusantium doloremque laudantium,<br>
						totam rem aperiam, eaque ipsa.</p>


						<img src="ressources/commentaire-home1.png" alt="commentaire">
					</div>
				</div>

				<!--- Section 2 L2--->

				<div id="l2">

					<img class="img_l2" src="ressources/step-3.jpg" alt="step_3">

					<div class="txt_l2">
						<h3><b>Duis et eros lorem.</b></h3>
						<p>Ned ut perspiciatis unde omnis iste natus error sit<br>
							voluptatem accusantium doloremque laudantium,<br>
						totam rem aperiam, eaque ipsa.</p>

						<img src="ressources/commentaire-home2.png" alt="commentaire">

					</div>
				</div>

				<!--- Section 2 L3--->

				<div id="l3">

					<img class="img_l2" src="ressources/step-4.png" alt="step_4">

					<div class="txt_l2">
						<h3><b>Curabitur gravida<br>
							metus at mi<br>
						malesuada.</b></h3>
						<p>Ned ut perspiciatis unde omnis iste natus error sit<br>
							voluptatem accusantium doloremque laudantium,<br>
						totam rem aperiam, eaque ipsa.</p>

						<img src="ressources/commentaire-home3.png" alt="commentaire">
					</div>
				</div>
			</div>
		<!--- Section 3 --->

		<div class="nulla">
			<img class="play_button" src="ressources/iplay.png" alt="play_button">
			<div class="txt_play_button">
				<p><b>"Nulla venenatis magna fringilla"</b></p>
			</div>
		</div>

		<!--- Section 4 --->

		<div class="section_4_background">
			<div class="etiam">
				<h2>Etiam laot, alique sceleris.</h2>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem<br>
				accusantium doloremque laudantium, totam rem aperiam eaque ipsa</p>
			</div>

			<div class="marque">

				<div class="marque_1">

					<img class="img_marque_1" src="ressources/marque1.jpg" alt="marque1"> 

					<div class="txt_marque_1">
						<p><b>Kyan Boards</b></p>
					</div>
				</div>

				<div class="marque_autre">
					<img class="img_marque_autre" src="ressources/marque2.jpg" alt="marque2"> 

					<div class="txt_marque_autre">
						<p><b>Atica</b></p>
					</div>
				</div>

				<div class="marque_autre">
					<img class="img_marque_autre" src="ressources/marque3.jpg" alt="marque3"> 
					<div class="txt_marque_autre">
						<p><b>Treva</b></p>
					</div>
				</div>

				<div class="marque_autre">
					<img class="img_marque_autre" src="ressources/marque4.jpg" alt="marque4"> 
					<div class="txt_marque_autre">
						<p><b>Kanba</b></p>
					</div>
				</div>

				<div class="marque_5">
					<img class="img_marque_5" src="ressources/marque5.jpg" alt="marque5"> 
					<div class="txt_marque_5">
						<p><b>Tvit Forms</b></p>
					</div>
				</div>

				<div class="marque_autre_l2">
					<img class="img_marque_autre_l2" src="ressources/marque7.jpg" alt="marque6"> 
					<div class="txt_marque_autre_l2">
						<p><b>Aven</b></p>
					</div>
				</div>

				<div class="marque_autre_l2">
					<img class="img_marque_autre_l2" src="ressources/marque6.jpg" alt="marque7"> 
					<div class="txt_marque_autre_l2">
						<p><b>Utosia</b></p>
					</div>
				</div>

			</div>
		</div>

		<!--- Section 5 --->
		<div class="faq_titre">
			<h2>FAQ</h2>

			<p>Sed ut perpicatis unde omnis iste natus error sit voluptatem<br>
			accusantium doloremque laudantium, total rem aperiam, eaque ipsa.</p>
		</div>

		<button class="collapsible"><b>Can I upgrade later on?</b></button>
		<div class="content">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
		<button class="collapsible"><b>Can I port my data from another provider?</b></button>
		<div class="content">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
		<button class="collapsible"><b>Are my food photos stored forever in the cloud?</b></button>
		<div class="content">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
		<button class="collapsible"><b>Who foots the bill for that?</b></button>
		<div class="content">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
		<button class="collapsible"><b>What's the real coat?</b></button>
		<div class="content">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
		<button class="collapsible"><b>Can my company request a custom plan?</b></button>
		<div class="content">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>

		<div class="lien_question">
			<p>Still have unanswered question?
			<a link href="http://www.lycee-stvincent.fr/" target="_BLANK" style="color:#ED008C;"><b>Get in touch</b></a></p>
		</div>

	</main>
	<footer>
		<div class="radius_blanc"></div>
		<p>	 © 2019 Page protected by reCAPTCHA and subject to Google's Privacy Policy and Terms of Service</p>
		<img class="logo_reseau" src="ressources/links.jpg" alt="logo_reseau">
	</footer>
</body>

		<!--- Script --->
<script src="JS/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="JS/home.js" type="text/javascript"> </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
</html>