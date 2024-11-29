<?php

include "conn.php";

$quiz = "select * from results";
$result = $conn->query($quiz);

echo "<h2>Leadboard</h2>";

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