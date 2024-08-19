<?php
function renderCardMedia($lien,$nom,$description,$date_horaire){
    ob_start();
    // DEBUT DU COMPOSANT
?>

    <article class="card_media">

        <img class="image" src="<?php echo $lien; ?>" alt="<?php echo $nom; ?>">
        <p class="nom_image"><?php echo $nom; ?></p>
        <p class="description_image"><?php echo $description; ?></p>
        <p class="date_image"><?php echo $date_horaire; ?></p>

    </article>

<?php
    // FIN DU COMPOSANT
    return ob_get_clean();
}
?>