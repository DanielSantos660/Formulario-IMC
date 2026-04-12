<?php
include "conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM calculo WHERE calc_id = $id");
}

header("Location: hist.php");
exit();
?>