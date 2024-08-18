<?php
function renderGalerie($tab_medias){
    ob_start();
?>

<main>
    <input id="research_bar" placeholder="🔍 Recherche..."></input>

    <div id="espace_contenu">

        <!-- PICTURES ARE APPENDED HERE -->

        <?php
            foreach($tab_medias as $media) {
                ob_start();
        ?>
                <img src="<?php echo $media['lien']; ?>" alt="<?php echo $media['nom']; ?>">
                <p><?php echo $media['description_media']; ?></p>
        <?php
            }
            echo ob_get_clean();
        ?>

    </div>















</main>

<?php
    return ob_get_clean();
}
?>