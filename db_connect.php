<?php
$database_url = getenv("DATABASE_URL");

if (!$database_url) {
    die("DATABASE_URL nuk eshte vendosur ne Render.");
}

$db = parse_url($database_url);

$host = $db["host"];
$port = $db["port"];
$user = $db["user"];
$password = $db["pass"];
$dbname = ltrim($db["path"], "/");

$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require";

$conn = pg_connect($conn_string);

if (!$conn) {
    die("Lidhja me databazen deshtoi.");
}
?>
