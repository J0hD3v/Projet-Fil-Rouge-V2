<?php
function renderComponent(){
    ob_start();
    // DEBUT DU COMPOSANT
?>

    <!-- le composant -->

<?php
    // FIN DU COMPOSANT
    return ob_get_clean();
}
?>