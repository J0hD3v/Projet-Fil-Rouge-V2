<?php
function renderGalerie($tab_medias){
    ob_start();
?>

<main>
    
    <input id="research_bar" placeholder="🔍 Recherche..."></input>

    <div id="espace_contenu">
        <!-- PICTURES ARE DISPLAYED HERE -->
        <?php
            if(gettype($tab_medias) !== "string") {
                foreach($tab_medias as $media) {
                    echo renderCardMedia($media['lien'],$media['nom'],$media['description_media'],$media['date_horaire']);
                }
            } else {
            ?>
                <p><?php echo $tab_medias ?></p>
            <?php
            }
        ?>

    </div>

</main>

<?php
    return ob_get_clean();
}
?>







