<?php
include "conn.php";

$conn->query("DELETE FROM calculo");

header("Location: hist.php");
exit();
?>