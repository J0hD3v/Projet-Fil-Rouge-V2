<?php
function renderFooter(){
    ob_start();
    // DEBUT DU FOOTER
?>

        <footer>

        <section id="footer_medias">
            <a href="/"><img src="../Images/icons/icon-facebook.png" class="icon" alt="facebook"></a>
            <a href="/"><img src="../Images/icons/icon-twitter.png" class="icon" alt="twitter"></a>
            <a href="/"><img src="../Images/icons/icon-instagram.png" class="icon" alt="instagram"></a>
        </section>

        <section id="footer_informations">
            <h2>Notre partenaire</h2>
            <img src="../Images/partenaire.png" alt="">
        </section>

        <section id="footer_map">
            <section class="container_contacts">
                <img src="../Images/icons/location-icon.png" class="icon" alt="icon position">
                <p>99 Rue Machin, 12345 Ville</p>
                <img src="../Images/icons/phone-icon.png" class="icon" alt="icon phone">
                <p>01.23.45.67.89</p>
            </section>
            <div id="map"></div>
        </section>

    </footer>

    </body>
    </html>

<?php
    // FIN DU FOOTER
    return ob_get_clean();
}
?>