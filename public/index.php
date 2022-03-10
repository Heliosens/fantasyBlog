<?php

require __DIR__ . '/../include.php';

$page = isset($_GET['p']) ?  : 'home';

// page
require __DIR__ . '/../View/partials/header.php';
require __DIR__ . '/../View/' . $page . '.php';
require __DIR__ . '/../View/partials/footer.php';
