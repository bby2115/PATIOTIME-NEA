<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $em = $_POST['name'];
    $mb = $_POST['surname'];
    $tel = $_POST['tel'];
    $ema = $_POST['email'];
    $persona = intval($_POST['persona']);
    $data = $_POST['data'];
    $ora = $_POST['ora'];

    $sql = "INSERT INTO REZERVIM 
            (REZ_EM, REZ_MB, REZ_TEL, REZ_EMA, REZ_PERSONA, REZ_DATA, REZ_ORA) 
            VALUES ($1, $2, $3, $4, $5, $6, $7)";

    $result = pg_query_params($conn, $sql, array(
        $em,
        $mb,
        $tel,
        $ema,
        $persona,
        $data,
        $ora
    ));

    if ($result && pg_affected_rows($result) > 0) {
        echo "<script>
                alert('Rezervimi u krye me sukses!');
                window.location.href='struktura.html';
              </script>";
    } else {
        echo '<pre>';
        echo 'Gabim gjate ruajtjes se rezervimit: ';
        echo pg_last_error($conn);
        echo '</pre>';
    }

} else {
    header("Location: struktura.html");
    exit();
}
?>