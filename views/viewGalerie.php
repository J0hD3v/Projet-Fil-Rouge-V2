<?php
function renderGalerie(){
    ob_start();
?>

<main>
    <input id="research_bar" placeholder="🔍 Recherche..."></input>

    <div id="espace_contenu">

        <!-- PICTURES ARE APPENDED HERE -->

    </div>
</main>

<?php
    return ob_get_clean();
}
?>