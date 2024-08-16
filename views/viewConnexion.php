<?php
function renderConnexion($message){
    ob_start();
?>

<main>
    
    <h1>Connexion</h1>

    <section class="container_form">
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
            <p><?php echo $message ?></p>
            <!--  -->
            <input type="submit" name="submit" value="Se connecter">
        </form>
        <button><a href="/creation-compte">Pas de compte ? Inscrivez-vous !</a></button>
    </section>

</main>

<?php
    return ob_get_clean();
}
?>