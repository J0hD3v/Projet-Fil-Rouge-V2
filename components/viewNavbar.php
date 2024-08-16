<?php
function renderNavbar(){
    ob_start();
    // DEBUT DU HEADER
?>

    <!-- le composant -->

<?php
    // FIN DU HEADER
    return ob_get_clean();
}
?>