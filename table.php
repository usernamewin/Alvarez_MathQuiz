<?php

include "conn.php";

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Quiz Leadboard</title>
    <link rel="stylesheet" type="text/css" href="table_style.css"
</head>
<body>
<h2>LEADBOARD</h2>';

$quiz = "select * from results order by score desc";
$result = $conn->query($quiz);

if ($result->num_rows > 0) {
    echo "<table border=1 cellspacing=0 cellpadding=0>
            <tr>
                <th>Nickname</th>
                <th>Score</th>
                <th>Retake Quiz</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nickname"] . "</td>
                <td>" . $row["score"] . "</td>
                <td><a href='retake.php?nickname=" . urlencode($row["nickname"]) . "'>Retake</a></td>
            </tr>";
    }
    echo "</table>";
}
else {
    echo "No result found.";
}

$conn->close();

?>