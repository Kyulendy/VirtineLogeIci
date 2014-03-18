<?php
// Connection to DB Server
$conn = mysqli_connect("localhost","root","","mydb");
// Check
if (!$conn){
    echo "Connection to database failed";
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
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <link rel="icon" href="favicon.ico" />
</head>
<body>
<div id="top-section" class="section">
    <div class="content">
        <div id="drop" class="center"></div>
        <div id="logo" class="center">
            <h1>Loge ici</h1>
            <p id="subtitle">et pas ailleurs</p>
            <p>Avec Loge’ici, je trouve mon logement où je le veux</p>
        </div>
    </div>
</div>
<div id="buildings">
    <div class="content">

        <!--            <div id="chevron" class="center"></div>-->
        <a href='#invitation-block'><button>Ça m’intéresse!</button></a>
    </div>
</div>

<div id="tagline-section" class="section">
    <div class="content">
        <p class="tagline">
            Combien de fois avons-nous eu l’occasion de visiter des dizaines de sites de
            <br/>recherche immobilière, regorgés de divers fonctionnalités
            <br/> mais ne répondant pas toujours à nos besoins ?
        </p>
        <p class="tagline bold">
            Nous savons combien il n’est jamais évident de trouver un logement où on le veut.
            <br/>Selon nous, tout devrait rester simple et agréable à utiliser.
            <br/>C’est pourquoi nous avons imaginé une nouvelle façon de rechercher un bien,
            <br/>pour répondre à vos réels besoins.
        </p>
        <!--        <hr id="line">-->
    </div>
</div>
<div id="points-section" class="section">
    <div class="content">
        <div class="point point-text-right">
            <div>
                <div id="first-oval" class="oval"></div>
            </div>
            <div>
                <h3>Où je veux</h3>
                <p>Un quartier en particulier, pas loin des copains, proche du métro ou du boulot!</p>
            </div>
        </div>
        <div class="clear"></div>
        <div class="point point-text-left">
            <div>
                <h3>Comme je veux</h3>
                <p>Des résultats selon mes besoins, mes offres préférées toujours sous la main… et tout ça sans créer de compte!</p>
            </div>
            <div>
                <div id="second-oval" class="oval"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="point point-text-right">
            <div>
                <div id="third-oval" class="oval"></div>
                <div class="clear"></div>
            </div>
            <div>
                <h3>En quelques clics</h3>
                <p>Fini les intermédiaires, je dépose ma candidature et je prends directement contact avec le propriétaire!</p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="invitation-section" class="section">
    <div class="content">
        <div id="invitation-block">
            <h2>Invitation</h2>
            <p id="subtitle">Ça m’intéresse !</p>
            <p>
                Recevez une notification pour tester
                <br/>notre plateforme dès sa sortie
            </p>

            <div id="email-form">
                <form name="subscribe" action="#invitation-block" method="GET">
                    <input type="email" placeholder="Mon e-mail..." name="email">
                    <input type="submit" value="M’avertir">
                </form>
            </div>

            <p class="tagline bold"><?php echo $result; ?></p>

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
