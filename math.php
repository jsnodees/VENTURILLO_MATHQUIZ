<?php
session_start();

if (!isset($_SESSION['level']) || !isset($_SESSION['operator']) || !isset($_SESSION['numItems']) || !isset($_SESSION['maxNum'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['currentQuestion'])) {
    $_SESSION['currentQuestion'] = 1;
    $_SESSION['correct'] = 0;
    $_SESSION['wrong'] = 0;
}

$level = $_SESSION['level'];
$operator = $_SESSION['operator'];
$numItems = $_SESSION['numItems'];
$maxNum = $_SESSION['maxNum'];

if ($level === "1-10") {
    $min = 1;
    $max = 10;
} elseif ($level === "11-100") {
    $min = 11;
    $max = 100;
} else {
    $min = $_SESSION['customMin'];
    $max = $_SESSION['customMax'];
}

$num1 = rand($min, $max);
$num2 = rand($min, $max);

switch ($operator) {
    case 'add':
        $correctAnswer = $num1 + $num2;
        $symbol = '+';
        break;
    case 'subtract':
        $correctAnswer = $num1 - $num2;
        $symbol = '-';
        break;
    case 'multiply':
        $correctAnswer = $num1 * $num2;
        $symbol = '*';
        break;
    default:
        $correctAnswer = 0;
        $symbol = '?';
}

$choices = [$correctAnswer];
while (count($choices) < 4) {
    $choice = $correctAnswer + rand(-$maxNum, $maxNum);
    if (!in_array($choice, $choices) && $choice >= 0) {
        $choices[] = $choice;
    }
}
shuffle($choices);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['answer']) && isset($_POST['correctAnswer'])) {
        if (intval($_POST['answer']) === intval($_POST['correctAnswer'])) {
            $_SESSION['correct']++;
        } else {
            $_SESSION['wrong']++;
        }
    }

    $_SESSION['currentQuestion']++;
    if ($_SESSION['currentQuestion'] > $numItems) {
        header("Location: end.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="math.css">
    <title>Math Quiz</title>
    <style>
    </style>
</head>
<body>
    <header>
        <h1>Math Quiz</h1>
        <h2>Question <?php echo $_SESSION['currentQuestion']; ?> of <?php echo $numItems; ?></h2>
    </header>

    <div class="form-container">
        <h2><?php echo "$num1 $symbol $num2 = ?"; ?></h2>
        <form method="POST">
            <input type="hidden" name="correctAnswer" value="<?php echo $correctAnswer; ?>">
            <?php foreach ($choices as $choice): ?>
                <button type="submit" name="answer" value="<?php echo $choice; ?>"><?php echo $choice; ?></button><br>
            <?php endforeach; ?>
        </form>

        <fieldset>
            <legend>Score</legend>
            Correct: <?php echo $_SESSION['correct']; ?><br>
            Wrong: <?php echo $_SESSION['wrong']; ?><br>
        </fieldset>

        <form method="POST" action="end.php">
            <button type="submit" name="end">End Quiz</button>
        </form>
    </div>
</body>
</html>
