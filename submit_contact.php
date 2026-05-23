<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $em = $_POST['name'];
    $mb = $_POST['surname'];
    $tel = $_POST['tel'];
    $ema = $_POST['email'];
    $sub = $_POST['subject'];
    $mes = $_POST['message'];

    $sql = "INSERT INTO KONTAKT 
            (KON_EM, KON_MB, KON_TEL, KON_EMA, KON_SUB, KON_MES) 
            VALUES ($1, $2, $3, $4, $5, $6)";

    $result = pg_query_params($conn, $sql, array($em, $mb, $tel, $ema, $sub, $mes));

    if ($result) {
        echo "<script>
                alert('Mesazhi u dergua me sukses!');
                window.location.href='contact.html';
              </script>";
    } else {
        echo "<script>
                alert('Gabim! Mesazhi nuk u dergua.');
                window.location.href='contact.html';
              </script>";
    }

} else {
    header("Location: contact.html");
    exit();
}
?>