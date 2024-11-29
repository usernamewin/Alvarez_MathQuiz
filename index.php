<?php

include "conn.php";

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Quiz</title>
    <link rel="stylesheet" type="text/css" href="index_style.css"
</head>
<body>';

// Define questions and answers
$questions = [
    [
        "question" => "What is the value of 8 + 12 * 2?",
        "options" => ["40", "32", "28", "24"],
        "answer" => 2
    ],
    [
        "question" => "Simplify 3x - 5x - 2.",
        "options" => ["8x", "8x - 2", "3x - 3", "5x - 2"],
        "answer" => 1
    ],
    [
        "question" => "If y = 3x + 2, what is y when x = 4?",
        "options" => ["12", "14", "10", "20"],
        "answer" => 1
    ],
    [
        "question" => "What is the square root of 121?",
        "options" => ["22", "19", "18", "11"],
        "answer" => 3
    ],
    [
        "question" => "Which of the following is a prime number?",
        "options" => ["23", "15", "21", "27"],
        "answer" => 0
    ]
];

// Initialize score
$score = 0;

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nickname = ($_POST["nickname"]);
    foreach ($questions as $index => $question) {
        if (isset($_POST["question$index"]) && $_POST["question$index"] == $question['answer']) {
            $score++;
        }
    }

    $sql = $conn->prepare("insert into results (nickname, score) 
            values (?, ?)");
    $sql->bind_param("si", $nickname, $score);
    $sql->execute();
    $sql->close();

    echo "<h2>Your Score: $score/" . count($questions) . "</h2>";
    echo '<a href="table.php">View Leadboard</a>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Math Quiz</h1>
    <form method="post" action="">
        <label for="nickname">Nickname: </label>
        <input type="text" id="nickname" name="nickname" required><br><br>
        <?php foreach ($questions as $index => $question): ?>
            <fieldset>
                <legend><?php echo $question['question']; ?></legend>
                <?php foreach ($question['options'] as $optionIndex => $option): ?>
                    <label>
                        <input type="radio" name="question<?php echo $index; ?>" value="<?php echo $optionIndex; ?>">
                        <?php echo $option; ?>
                    </label><br>
                <?php endforeach; ?>
            </fieldset>
        <?php endforeach; ?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
