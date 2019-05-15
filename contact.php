<?php
    
    $error = '';
    $name = '';
    $email = '';
    $subject = '';
    $message = '';

    function clean_text($string){
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);

    }

    if(isset($_POST["submit"])){
        if(empty($_POST["name"])){
            $error .= '<p><lable class="text-danger">SVP donner votre Nom</label></p>';
        }
        else{
            $name = clean_text($_POST["name"]);
            if(!preg_match("/^[a-zA-Z]*$/",$name)){
                $error .= '<p><lable class="text-danger">Seulement des lettres
                           qui sont autorisé pour votre Nom</label></p>';
            }
        }
        if(empty($_POST["email"])){
            $error .= '<p><lable class="text-danger">SVP donner votre émail</label></p>';

        }
        else{
            $email = clean_text($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error .= '<p><lable class="text-danger">Votre émail est invalide
                           rééssayer avec un émail valide</label></p>';

            }

        }
        if(empty($_POST["subject"])){
            $error .= '<p><lable class="text-danger">Donner un object 
                         à votre émail</label></p>';

        }
        else{
            $subject = clean_text($_POST["subject"]);
        }
        
        if(empty($_POST["message"])){
            $error .= '<p><lable class="text-danger">Message est obligatoire </label></p>';

        }
        else{
            $message = clean_text($_POST["message"]);

        }

        if($error != ''){
			require '/PHPMailer/PHPMailer/PHPMailerAutoload.php';
          //  require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'smtp.gmail.com:';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = $_POST["email"]; //"thirdiallo@gmail.com";
            $mail->Password = "";
            $mail->SMTPSecure = 'ssl';
            $mail->setFrom = $_POST["email"];
            $mail->FromName = $_POST["name"];
            $mail->addAddress = $_POST["email"]; //("thirdiallo@gmail.com"); // =$_POST["email"]; //("thirdiallo@gmail.com");
            $mail->addCC($_POST["email"], $_POST["name"]);
            $mail->IsHTML(true);
            $mail->Subject = $_POST["subject"];
            $mail->Body = $_POST["message"];
            if ($mail->send()) {
				
                 $error = '<label class="text-success"> Votre message est bien
						   envoyé et merci de mavoir contacter </label>';
						    
    
            } else {
                $error = '<label class="text-success"> Votre message né pas
						   envoyé rééssayer encore </label>'; 
						  
            }

            $name = '';
            $email = '';
            $subject = '';
            $message = '';

		}
	
}
		//header('location:contact.php');
      

?>



<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>CV en Ligne | Contact Moi</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Online Resume Services Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/animation-aos.css">
	<link href='css/aos.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<!-- animation css -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/all.min.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->
 
    <!-- //SweetAlert -->
	<link rel="stylesheet" href="css/sweetalert.css">

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Pacifico&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body>
	<div class="mian-content-2">
			<!-- header -->
		<header data-aos="fade-down">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="logo text-left">
						<h1>
							<a class="navbar-brand" href="index.php"><i class="fas fa-copy"></i> CV en Ligne</a>
						</h1>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
	
						</span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-lg-auto text-lg-right text-center">
							<li class="nav-item">
								<a class="nav-link" href="index.php">Accueil
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php">A Propos</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false">
									Qui-suis-Je
								</a>
								<div class="dropdown-menu text-lg-left text-center" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="index.php">Competences</a>
									<a class="dropdown-item" href="index.php">Formations</a>
									<a class="dropdown-item" href="index.php">Expériences</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php">Projects</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="contact.php">Contact
						
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- //header -->
	
			<!--  particles  -->
			<div id="particles-js"></div>
			<!-- //particles -->
		</div>
		<!-- //main -->

	<div>	
		<h2 class="font-w3ls-style text-white">Contact Moi</h2>
	</div>
	<!-- main -->

	<!-- contact -->
	
	<section class="banner-bottom-w3layouts pt-5">
		<div class="container-fluid pt-xl-5 pt-lg-3">
			<!-- heading title -->
			<div class="mb-lg-5 mb-4 text-center">
			<div><?php echo $error ?></div>
				<h3 class="title-wthree text-dark mb-2">
					<span class="mb-2"></span>Contact Moi</h3>
				<p class="sub-tittle-2">Pour me contacter c'est simple, il suffit de m'appeler ou de 
					m'écrire un émail
				</p>
			</div>
			<!-- //heading title -->
			<!-- contact address -->
			<div class="container">
				<div class="address row py-sm-5 pt-sm-0 pt-3 pb-sm-0 pb-5 mb-sm-5">
					<div class="col-lg-4 address-grid" data-aos="zoom-out-up">
						<div class="row address-info">
							<div class="col-3 address-left text-lg-center text-right">
								<i class="far fa-map text-center"></i>
							</div>
							<div class="col-9 address-right text-left">
								<h6 class="ad-info text-uppercase mb-2">Addresse</h6>
								<p> Hann-Mariste 2 / Dakar, SENEGAL</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 address-grid my-lg-0 my-4" data-aos="zoom-out-up">
						<div class="row address-info">
							<div class="col-3 address-left text-lg-center text-right">
								<i class="far fa-envelope text-center"></i>
							</div>
							<div class="col-9 address-right text-left">
								<h6 class="ad-info text-uppercase mb-2">Email</h6>
								<p>Email :
									<a href="mailto:thirdiallo@gmail.com"> thirdiallo@gmail.com</a>
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 address-grid" data-aos="zoom-out-up">
						<div class="row address-info">
							<div class="col-3 address-left text-lg-center text-right">
								<i class="fas fa-mobile-alt text-center"></i>
							</div>
							<div class="col-9 address-right text-left">
								<h6 class="ad-info text-uppercase mb-2">Téléphone</h6>
								<p>(+221) 77 944 03 10 ou 76 508 28 97</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //contact address -->
				<div class="row" data-aos="fade-down"
				data-aos-easing="linear"
				data-aos-duration="1500">
					<!-- map -->
					<div class="col-lg-6 map">

							<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1Rjs1hPAP0F2AqkPWq6ZcNTkdwDpJrb1h" width="640" height="480"
								allowfullscreen>
							</iframe>
					</div>
					<!-- //map -->

					<!-- contact form -->
					<div class="col-lg-6 main_grid_contact">
						<div class="form">
							<h4 class="mb-4 text-left">Envoyez moi un message</h4>
							
							<form method="post">
								<div class="form-group">
									<label class="my-2">Votre Nom</label>
									<input class="form-control" type="text" name="name" placeholder="" required=""
									value="<?php echo $name ?>">
								</div>
								<div class="form-group">
									<label class="my-2">Votre Email</label>
									<input class="form-control" type="text" name="email" placeholder="" required=""
									value="<?php echo $email ?>">
								</div>

								<div class="form-group">
									<label class="my-2">Object</label>
									<input class="form-control" type="text" name="subject" placeholder="" required=""
									value="<?php echo $subject ?>">
								</div>

								<div class="form-group">
									<label class="my-2">Message</label>
									<textarea id="textarea" name="message" placeholder="" value="<?php echo $message ?>"></textarea>
								</div>
								<div class="input-group1">
									<input class="form-control" type="submit" name="submit" value="Envoyer">
								</div>
							</form>
						</div>
					</div>
					<!-- //contact form -->
				</div>
		</div>
	</section>
	<!-- //contact -->

	<!-- footer -->
	<footer>
		<div class="w3ls-footer-grids py-4">
			<div class="container py-xl-5 py-lg-3">
				<div class="row">
					<div class="col-lg-5 w3l-footer-logo">
						<!-- footer logo -->
						<a class="navbar-brand" href="index.php"><i class="fas fa-copy"></i> CV en Ligne</a>
						<!-- //footer logo -->
					</div>
					<!-- button -->
					<div class="col-lg-5 w3l-footer text-lg-right text-center mt-3">
						<ul class="list-unstyled footer-nav-wthree">
							<li class="mr-4">
								<a href="index.php" class="active">Accueil</a>
							</li>
							<li class="mr-4">
								<a href="index.php">A Propos</a>
							</li>
							<li class="mr-4">
								<a href="index.php">Mes Services</a>
							</li>
							<li>
								<a href="index.php">Projects</a>
							</li>
						</ul>
					</div>
					<!-- //button -->
					<div class="col-lg-2 mt-lg-0 mt-3">
						<div class="button-w3ls mt-0 text-lg-right text-center">
							<a href="contact.php" class="btn btn-sm animated-button thar-four">Contact Moi</a>
						</div>
					</div>
				</div>
				<div class="row border-top mt-4 pt-lg-4 pt-3 text-lg-left text-center">
					<!-- copyright -->
					<p class="col-lg-8 copy-right-grids mt-lg-1">Copyrith | @
						<a href="https://thirdiallo@gmail.Com/" target="_blank">tairou diallo</a>
					</p>
					<!-- //copyright -->
					<!-- social icons -->
					<div class="col-lg-4 w3social-icons text-lg-right text-center mt-lg-0 mt-3">
						<ul>
							<li>
								<a href="https://www.facebook.com/masterou@hotmail.fr/" class="rounded-circle">
									<i class="fab fa-facebook-f"></i>
								</a>
							</li>
							<li>
								<a href="#" class="rounded-circle">
									<i class="fab fa-twitter"></i>
								</a>
							</li>
						</ul>
					</div>
					<!-- //social icons -->
				</div>
			</div>
		</div>
	</footer>
	<!-- //footer -->


	<!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->

	<!-- animation js -->
	<script src='js/aos.js'></script>
	<script>
		AOS.init({
            easing: 'ease-out-back',
            duration: 1000
        });

    </script>
	<!-- //animation js -->

	<!-- //apopup js -->

	<!-- <script type="text/javascript">
				function validation(){
					if(($mail->send()){
						swal("Bien!!","Vous venez de me contacter","Votre message est bien envoyé")

					}
					else{
						sweetalert("Oup's...", "Votre message n'est pas envoyé",
						"reéessayer encore!!")
					}

				}
				
</script> -->
<!-- //popup js -->
	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- move-top -->
	<script src="js/move-top.js"></script>
	<!-- easing -->
	<script src="js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="js/online-resume.js"></script>

	<script src="js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

   	<!-- //SweetAlert -->
<!-- 	<script src="js/sweetalert.js"></script> -->
		<!-- //Js files -->

</body>

</html>