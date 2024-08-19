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
                echo renderCardMedia($media['lien'],$media['nom'],$media['description_media'],$media['date_horaire']);
            }
        ?>

    </div>















</main>

<?php
    return ob_get_clean();
}
?>