<?php
// Connection to DB Server
$conn = mysqli_connect("localhost","root","","mydb");
// Check
if (!$conn){
//    echo "Connection to database failed";
//    exit();
}

$email = "";
$result = "";
if (isset($_POST["email"])) {
    $email = $_POST["email"];

    $query = "SELECT email FROM invite_emails WHERE email = '".$email."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result,MYSQLI_NUM);
    $n = mysqli_affected_rows($conn);

    $result = "";
    if ($n >= 1) {
        $result = "Votre email est déjà dans la base des données. Vous serez notifié dès la sortie de notre solution.";
    } else if (!empty($email)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $result = "Veuillez entrer un email valide";
        } else {
            $insert = "INSERT INTO invite_emails (email, date) VALUES ('$email', NOW())";
            mysqli_query($conn,$insert);
            $result = "Votre email " . $email . " à été ajouté avec succès!";
        }
    }
}

mysqli_close($conn);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Loge ici</title>
    <link rel="stylesheet" href="reset.css" type="text/css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <link rel="icon" href="favicon.ico" />
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
        $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
        $('html,body').animate({
        scrollTop: target.offset().top
        }, 1000);
        return false;
        }
        }
        });
        });
    </script>
</head>
<body>

<div id="clouds"></div>

<div id="top-section" class="section">
    <div class="content">
        <img id="logo-img" src="./images/logo.png" alt="Loge ici logo">
    </div>

    <div id="buildings">
        <div class="content">
            <div id="tagline" class="center">
                <h1>Je trouve mon logement où je le veux</h1>
                <h1>Pas ailleurs.</h1>
                <a href='#invitation-block'>
                    <button>Ça m’intéresse!</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="scroll-section">
    <div class="content no-padding">
        <a href='#tagline-section'>
            <img class="center" src="./images/arrow_white.png" alt="down arrow sign">
        </a>
    </div>
</div>

<div id="tagline-section" class="">
    <div class="content">
        <h4>
            Trouver son logement là ou on le veut n'est pas toujours chose facile...
            <br/>Voici une nouvelle façon de rechercher son chez-soi, simple et agréable.
        </h4>
    </div>
</div>
<div id="points-section" class="section">
    <div class="content">
        <div class="column">
            <div>
                <h3>Où je veux</h3>
                <p>
                    Pas loin des copains, proche du métro ou du boulot, un quartier en particulier...
                    <br/>Je suis à proximité !
                </p>
            </div>
            <div>
                <img src="./images/column_map.png" alt="">
            </div>
        </div>
        <div class="column">
            <div>
                <img src="./images/column_windows.png" alt="">
            </div>
            <div>
                <h3>Comme je veux</h3>
                <p>
                    Des résultats selon mes besoins
                    <br/> et mes offres préférées toujours sous la main.
                    Tout ça sans créer de compte !
                </p>
            </div>
        </div>
        <div class="column last-column">
            <div>
                <h3>En quelques clics</h3>
                <p>
                    Fini les intermédiaires,
                    <br/>je dépose ma candidature et je prends
                    <br/>directement contact avec le propriétaire
                </p>
            </div>
            <div>
                <img src="./images/column_paper-plane.png" alt="">
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="content no-padding">
        <a href='#invitation-section'>
            <img class="center" src="./images/arrow_red.png" alt="down arrow sign">
        </a>
    </div>
</div>
<div id="invitation-section" class="section">
    <div class="content no-padding">
        <div id="invitation-block">
            <h2>Ça m’intéresse !</h2>
            <h3>
                Je veux tester Loge'ici dès sa sortie,
                <br/><span class="dark">Je m'inscris !</span>
            </h3>

            <div id="email-form">
                <form name="subscribe" action="#invitation-block" method="GET">
                    <input type="email" placeholder="Adresse e-mail" name="email">
                    <button type="submit">M’avertir</button>
                </form>
            </div>

            <p>
                <?php echo $result; ?>
            </p>
        </div>

        <div id="lantern">
            <img src="images/lantern.png">
        </div>
    </div>
</div>
<div id="team-section" class="section">
    <div class="content">
        <img class="center" alt="Exclusive Diversity" src="./images/ed_logo.png"/>
        <h4>We are Exclusive Diversity</h4>
        <p>Créer en 2013 au sein d’une école du web, cette passion nous a réuni naturellement de part notre envie
            <br/>commune de bousculer les standards présent sur le web. Ayant des compétences très diverses,
            <br/>complémentarité et notre esprit d’équipe nous permettent de travailler sur des projets
            <br/>d’envergure et atteindre les différents objectifs que nous nous fixerons.</p>
        <br/>
        <p class="bold">« La diversité unit dans un projet commun »</p>
        <div id="members">
            <div>
                <img src="./images/members/david.png">
                <p>David Tang</p>
                <p class="light">Chef de Projet</p>
            </div>
            <div>
                <img src="./images/members/jonas.png">
                <p>Jonas Loco</p>
                <p class="light">Responsable Com'</p>
            </div>
            <div>
                <img src="./images/members/brian.png">
                <p>Brian Marciano</p>
                <p class="light">Responsable Marketing</p>
            </div>
            <div>
                <img src="./images/members/samuel.png">
                <p>Samuel Bodin</p>
                <p class="light">Lead Developer</p>
            </div>
            <div>
                <img src="./images/members/ekaterina.png">
                <p>Ekaterina Johnston</p>
                <p class="light">Développeur</p>
            </div>
            <div>
                <img src="./images/members/josue.png">
                <p>Josué Studer</p>
                <p class="light">Directeur Artistique</p>
            </div>
            <div>
                <img src="./images/members/sebastien.png">
                <p>Sébastien Tsing</p>
                <p class="light">Web Designer</p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="teardrop"></div>
</body>
</html>
