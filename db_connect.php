<?php
$host = "aws-1-eu-central-1.pooler.supabase.com";
$port = "5432";
$dbname = "postgres";
$user = "postgres.antfyiwtglchnaoxfmod";
$password = "Patiotime123!";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require");

if (!$conn) {
    $error = error_get_last();
    die("Lidhja deshtoi: " . $error['message']);
}

echo "Lidhja u krye me sukses!";
?>