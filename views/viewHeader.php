<?php
function renderHeader($tab_liens_css=[],$tab_liens_js=[]){
    ob_start();
    // DEBUT DU HEADER
?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- liens carousel swiper -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- liens CSS base -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/style-header.css">
        <link rel="stylesheet" href="../css/style-footer.css">
        <link rel="stylesheet" href="../css/style-navbar.css">
        <!-- liens CSS page -->
        <?php
        foreach($tab_liens_css as $lien_css) {
            ob_start();
        ?>
            <link rel="stylesheet" href="../css/<?php echo $lien_css ?>">
        <?php
        }
        echo ob_get_clean();
        ?>
        <!-- liens JS base -->
        <script src="./JS/mobile-navbar.js" defer></script>
        <script src="./JS/map.js" defer></script>
        <!-- liens JS page -->
        <?php
        foreach($tab_liens_js as $lien_js) {
            ob_start();
        ?>
            <script src="../JS/<?php echo $lien_js ?>" defer></script>
        <?php
        }
        echo ob_get_clean();
        ?>
        <!-- liens API map -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    </head>
    <body>
    <header>
        <div class="header_informations">
            <img src="../Images/icons/phone-icon.png" alt="icon phone" class="icon">
            <p>01.23.45.67.89</p>
            <img src="../Images/icons/location-icon.png" alt="icon position" class="icon">
            <p>Numero Rue, CP Ville</p>
        </div>
        <div class="header_center">
            <img src="../Images/logo-tempo.png" alt="logo" class="logo btn_home">
            <h1>Padel Club - Pau</h1>
            <div class="menu_burger">
                <button id="btn_open_navbar" class="open_navbar" title="open navbar" type="button"></button>
            </div>
        </div>
    </header>

    <!-- NAVBAR -->

    <nav class="header_nav">

        <a href="/">Accueil</a>

        <div class="btn_nav">
            <span href="">Reservation</span>
            <div class="dropdown_nav">
                <a href="/">Terrain</a>
                <a href="/">Cours</a>
                <a href="/">Seminaire</a>
            </div>
        </div>

        <div class="btn_nav">
            <span href="">Evenements</span>
            <div class="dropdown_nav">
                <a href="/">Tournois</a>
                <a href="/">Point du mois</a>
            </div>
        </div>

        <a href="/galerie">Galerie</a>
        <a href="/">Nous contacter</a>

        <!-- si connecté : onglet Profil -->
        <?php
        if(isset($_SESSION["is_connected"]) && ($_SESSION["is_connected"] == true)) {
            ob_start();
        ?>
            <div class="btn_nav btn_profil">
                <span href="">Profil</span>
                <div class="dropdown_nav">
                    <a href="/informations-utilisateur">Mes informations</a>
                    <a href="/">Mes réservations</a>
                    <a href="/">Ma galerie</a>
                    <!-- si administrateur -->
                    <?php
                    if(isset($_SESSION["is_admin"]) && ($_SESSION["is_admin"] == true)) {
                        ob_start();
                    ?>
                        <a href="/modifications-admin">Modifications Admin</a>
                    <?php
                    }
                    echo ob_get_clean();
                    ?>
                    <!-- fin special admin -->
                    <a href="/deconnexion">Déconnexion</a>
                </div>
            </div>
        <?php
        }
        echo ob_get_clean();
        ?>

        <!-- si déconnecté : onglet Se connecter -->
        <?php
        if(!isset($_SESSION["is_connected"]) || ($_SESSION["is_connected"] != true)) {
            ob_start();
        ?>
            <a href="/connexion" class="btn_connexion">Connexion</a>
        <?php
        }
        echo ob_get_clean();
        ?>

    </nav>

<?php
    // FIN DU HEADER
    return ob_get_clean();
}
?>