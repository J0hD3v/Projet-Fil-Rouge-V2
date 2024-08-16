<?php
function renderCreationCompte($message){
    ob_start();
?>

<main>
    
    <h1>Créer un compte</h1>
    
    <section class="container_form">
        <form action="" method="post">
            <!--  -->
            <section class="wrapper">
                <input type="text" name="name_user" placeholder="">
                <span>Nom</span>
            </section>
            <!--  -->
            <section class="wrapper">
                <input type="text" name="firstname_user" placeholder="">
                <span>Prenom</span>
            </section>
            <!--  -->
            <section class="wrapper">
                <input type="email" name="email_user" placeholder="">
                <span>Email</span>
            </section>
            <!--  -->
            <section class="wrapper">
                <input type="tel" name="phone_user" placeholder="">
                <span>Telephone</span>
            </section>
            <!--  -->
            <section class="wrapper">
                <input type="date" name="dob_user" placeholder="">
                <span>Date de naissance</span>
            </section>
            <!--  -->
            <section class="wrapper">
                <input type="password" name="password_user" placeholder="">
                <span>Mot de passe</span>
            </section>
            <!--  -->
            <p><?php echo $message ?></p>
            <!--  -->
            <input type="submit" name="submit" value="Créer un compte">
            <!--  -->
        </form>
        <button><a href="/connexion">J'ai déjà un compte</a></button>
    </section>

</main>

<?php
    return ob_get_clean();
}
?>