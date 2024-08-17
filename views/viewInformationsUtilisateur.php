<?php
function renderInformationsUtilisateur($tab_infosUtilisateur,$message){
    ob_start();
?>

<main>

    <section class="container_informations">

        <h1>Vos informations</h1>

        <form action="" method="post">
            <!--  -->
            <section class="wrapper">
                <input type="text" name="name_user" placeholder="" value="<?php echo $tab_infosUtilisateur["name"] ?>">
                <span>Nom</span>
            </section>
            <!--  -->
            <section class="wrapper">
                <input type="text" name="firstname_user" placeholder="" value="<?php echo $tab_infosUtilisateur["first_name"] ?>">
                <span>Prenom</span>
            </section>
            <!--  -->
            <section class="wrapper">
                <input type="email" name="email_user" placeholder="" value="<?php echo $tab_infosUtilisateur["email"] ?>">
                <span>Email</span>
            </section>
            <!--  -->
            <section class="wrapper">
                <input type="tel" name="phone_user" placeholder="" value="<?php echo $tab_infosUtilisateur["phone"] ?>">
                <span>Telephone</span>
            </section>
            <!--  -->
            <section class="wrapper">
                <input type="date" name="dob_user" placeholder="" value="<?php echo $tab_infosUtilisateur["dob"] ?>">
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
            <input type="submit" name="submit" value="Modifier">
            <!--  -->
        </form>


    
    </section>
</main>

<?php
    return ob_get_clean();
}
?>