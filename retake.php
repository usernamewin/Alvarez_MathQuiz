<?php

include "conn.php";

if (isset($_GET["nickname"])) {
    $nickname = ($_GET["nickname"]);

    $sql = $conn->prepare("delete from results where nickname=?");
    $sql->bind_param("s", $nickname);
    $sql->execute();
    $sql->close();

    header("Location: index.php");
    exit;
}
else {
    echo "Retake request failed.";
}

$conn->close();

?>