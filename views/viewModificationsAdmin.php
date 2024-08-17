<?php
function renderModificationsAdmin($tab_actualites){
    ob_start();

    // si l'utilisateur n'est pas administrateur (atteint la page via l'URL)
    if(!isset($_SESSION["is_admin"]) || ($_SESSION["is_admin"] != true)){
        echo "<main></main>";
        return ob_get_clean();
    } else {
?>

        <main>
            <h1>Modifs Admin</h1>

            <!-- ACTUALITES -->

            <section>
                <h2>Modifier les articles d'actualités</h2>

                <form action="" method="post">

                    <section class="container_actualites">

                        <!--  -->
                        <section class="col_names">
                            <h3>Texte</h3>
                            <h3>Date</h3>
                            <h3>Visibilité</h3>
                        </section>
                        <!--  -->
                        <?php
                        if(gettype($tab_actualites) != "string") {
                            foreach($tab_actualites as $actualite) {
                                ob_start();
                            ?>
                                <article>
                                    <textarea name='texte_article_<?php echo $actualite["id_actualite"] ?>'><?php echo $actualite["texte"] ?></textarea>
                                    <input type='datetime-local' name='date_article_<?php echo $actualite["id_actualite"] ?>' value='<?php echo $actualite["date_horaire"] ?>'>
                                    <input type='checkbox' name='visibilite_article_<?php echo $actualite["id_actualite"] ?>' <?php if($actualite["est_affiche"] == 1){echo 'checked';} ?>>
                                </article>
                            <?php
                            }
                            echo ob_get_clean();
                        }
                        ?>

                    </section>


                    
                    <!--  -->
                    <?php
                    if(gettype($tab_actualites) == "string") {
                        ?>
                            <p><?php echo $tab_actualites ?></p>
                        <?php
                    }
                    ?>
                    <!--  -->
                    <input type="submit" name="submit" value="Enregistrer">
                    <input type="reset" name="reset" value="Annuler">
                    
                </form>

            </section>

            <!-- DISPONIBILITE TERRAINS -->

            <section>
                <h2>Modifier les terrains disponibles - A FAIRE</h2>

                
                
            </section>
        </main>

<?php
        return ob_get_clean();
    }
}
?>