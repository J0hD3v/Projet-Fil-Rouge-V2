<?php
function renderModificationsAdmin(){
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
                    <!--  -->
                    <section class="wrapper">
                        <input type='text' name='email_connecting_user' placeholder=''>
                        <span>Email</span>
                    </section>
                    <!--  -->
                    <section class="wrapper">
                        <input type='password' name='password_connecting_user' placeholder=''>
                        <span>Mot de passe</span>
                    </section>
                    <!--  -->
                    <p><?php echo "variable message" ?></p>
                    <!--  -->
                    <input type="submit" name="submit" value="Se connecter">
                </form>
                <button><a href="/creation-compte">Pas de compte ? Inscrivez-vous !</a></button>
                
            </section>

            <!-- DISPONIBILITE TERRAINS -->

            <section>
                <h2>Modifier les terrains disponibles - A FAIRE</h2>

                <form action="" method="post">
                    <!--  -->
                    <section class="wrapper">
                        <input type='text' name='email_connecting_user' placeholder=''>
                        <span>Email</span>
                    </section>
                    <!--  -->
                    <section class="wrapper">
                        <input type='password' name='password_connecting_user' placeholder=''>
                        <span>Mot de passe</span>
                    </section>
                    <!--  -->
                    <p><?php echo "variable message" ?></p>
                    <!--  -->
                    <input type="submit" name="submit" value="Se connecter">
                </form>
                <button><a href="/creation-compte">Pas de compte ? Inscrivez-vous !</a></button>
                
            </section>
        </main>

<?php
        return ob_get_clean();
    }
}
?>