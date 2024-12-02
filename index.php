<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['level'] = $_POST['level'];
    $_SESSION['operator'] = $_POST['operator'];
    $_SESSION['numItems'] =intval($_POST['numitem']);
    $_SESSION['maxNum'] = intval($_POST['maxnum']);

    if ($_SESSION['level'] === 'custom') {
        $_SESSION['customMin'] = intval($_POST['num1']);
        $_SESSION['customMax'] = intval($_POST['num2']);
    }
    header("Location: .php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MATH QUIZ</title>
</head>
<body>
    <header>
        <h1>MATH QUIZ</h1>
    </header>
    
</body>
</html>

