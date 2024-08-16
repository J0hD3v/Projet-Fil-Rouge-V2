<?php
function render404(){
    ob_start();
?>

<main>
    <h1>404 NOT FOUND</h1>
    <p>Vous êtes perdu.</p>
</main>

<?php
    return ob_get_clean();
}
?>