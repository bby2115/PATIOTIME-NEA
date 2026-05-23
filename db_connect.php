<?php
$database_url = getenv("DATABASE_URL");

if (!$database_url) {
    die("DATABASE_URL nuk eshte vendosur ne Render.");
}

$conn = pg_connect($database_url);

if (!$conn) {
    die("Lidhja me databazen deshtoi.");
}
?>
