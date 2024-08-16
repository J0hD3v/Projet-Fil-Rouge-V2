<?php
function renderInformationsUtilisateur($tab_infosUtilisateur){
    ob_start();
?>

<main>
    <h1>Vos informations</h1>
    <p>Affichage des informations de l'utilisateur...</p>
    <ul>
        <?php
            foreach($tab_infosUtilisateur as $infoUtilisateur) {
                ob_start();
            ?>
                <li><?php echo $infoUtilisateur ?></li>
            <?php
            }
            echo ob_get_clean();
        ?>
    </ul>
</main>

<?php
    return ob_get_clean();
}
?>