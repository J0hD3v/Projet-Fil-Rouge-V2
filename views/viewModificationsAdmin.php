<?php
function renderModificationsAdmin($tab_actualites,$message_actualites,$message_medias){
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
                    <p><?php echo $message_actualites ?></p>
                    <!--  -->
                    <input type="submit" name="submit_actualites" value="Enregistrer">
                    <input type="reset" name="reset_actualites" value="Annuler">
                    
                </form>

            </section>

            <!-- DISPONIBILITE TERRAINS -->

            <section>
                <h2>Ajouter une image / vidéo - EN COURS</h2>

                <form action="" method="post">

                    <section class="container_medias">

                        <!--  -->
                        <section class="col_names">
                            <h3>Nom</h3>
                            <h3>Description</h3>
                            <h3>Lien du fichier</h3>
                            <h3>Date</h3>
                            <h3>Type</h3>
                            <h3>ID utilisateur (à remplacer par son nom)</h3>
                        </section>
                        <!--  -->
                        
                        <section>
                            <input type="text" name="name_media">
                            <textarea name='description_media'></textarea>
                            <input type="text" name="link_media">
                            <input type='datetime-local' name='date_media'>
                            <select name="id_type_media">
                                <option value=1>Image</option>
                                <option value=2>Video</option>
                            </select>
                            <input type="text" name="id_user_media">
                        </section>

                    </section>


                    
                    <!--  -->
                    <?php
                    if(gettype($tab_actualites) == "string") {
                        ?>
                            <p><?php echo $tab_actualites ?></p>
                        <?php
                    }
                    ?>
                    <p><?php echo $message_medias ?></p>
                    <!--  -->
                    <input type="submit" name="submit_medias" value="Ajouter">
                    <input type="reset" name="reset_medias" value="Annuler">
                    
                </form>
                
            </section>
        </main>

<?php
        return ob_get_clean();
    }
}
?>