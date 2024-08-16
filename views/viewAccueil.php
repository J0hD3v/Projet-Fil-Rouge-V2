<?php
function renderAccueil(){
    ob_start();
?>

<main>
    <section class="home_background">
        <img src="./Images/logo tempo.png" alt="logo" class="logo">
        <a href="./Pages/reservation.html" class="btn_reservation">Réserver un terrain</a>
    </section>
    <section class="news_bar">
        <!-- carroussel -->


        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="swiper-caption">
                        <p>Lundi 1 Avril, ouverture des votes pour le point du mois ! <a href="#" class="link">cliquez ici</a></p>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="swiper-caption">
                        <p>Lundi 1 Avril, ouverture des votes pour le point du mois ! <a href="#" class="link">cliquez ici</a></p>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="swiper-caption">
                        <p>Lundi 1 Avril, ouverture des votes pour le point du mois ! <a href="#" class="link">cliquez ici</a></p>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="swiper-slide">
                    <div class="swiper-caption">
                        <p>Lundi 1 Avril, ouverture des votes pour le point du mois ! <a href="#" class="link">cliquez ici</a></p>
                    </div>
                </div>
                <!-- Slide 5 -->
                <div class="swiper-slide">
                    <div class="swiper-caption">
                        <p>Lundi 1 Avril, ouverture des votes pour le point du mois ! <a href="#" class="link">cliquez ici</a></p>
                    </div>
                </div>
                <!-- Slide 6 -->
                <div class="swiper-slide">
                    <div class="swiper-caption">
                        <p>Lundi 1 Avril, ouverture des votes pour le point du mois ! <a href="#" class="link">cliquez ici</a></p>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        
            <!-- Navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        
            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->
        </div>


        <!-- fin carroussel -->
    </section>

    <section class="home_informations">
        <p class="info_1">
            <strong>A propos de nous :</strong>
            <br><br>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore necessitatibus possimus fugiat
            sapiente voluptatem provident! Odio doloremque vero sunt praesentium numquam aliquam repellat architecto
            soluta. In beatae ad qui dicta.
        </p>
        <p class="info_2">
            <strong>Horaires d'ouverture :</strong>
            <br><br>
            Du lundi au samedi : de 10h à 19h
            <br>
            Le dimanche : sur réservation
        </p>
    </section>
</main>

<?php
    return ob_get_clean();
}
?>