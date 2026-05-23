<?php
$host = "aws-1-eu-central-1.pooler.supabase.com";
$port = "5432";
$dbname = "postgres";
$user = "postgres.antfywtglchnaoxfmod";
$password = getenv("DB_PASSWORD");

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require");

if (!$conn) {
    die("Lidhja me databazen deshtoi.");
}
?>
