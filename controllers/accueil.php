<?php

echo renderHeader($_ENV['liens_css']['accueil'],$_ENV['liens_js']['accueil']);
echo renderAccueil(getActualites());
echo renderFooter();

?>