<?php
session_start();

if (!isset($_SESSION['level']) || !isset($_SESSION['operator']) || !isset($_SESSION['numItems']) || !isset($_SESSION['maxNum'])) {
    header ("Location: index.php");
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
    if (isset($_POST['answer']) && isset ($_POST['correctAnswer'])) {
        if (intval($_POST['answer']) === intval($_POST['correctAnswer'])) {
            $_SESSION['correct'] ++;
        } else {
            $_SESSION['wrong'] ++;
        }
    }
    $_SESSION['currentQuestion']++;
    if ($_SESSION['currentQuestion'] > $numItems) {
        header("Location: end.php");
        exit();
    }
}
?>

    
    
