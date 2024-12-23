<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['level'] = $_POST['level'];
    $_SESSION['operator'] = $_POST['operator'];
    $_SESSION['numItems'] = intval($_POST['numitem']);
    $_SESSION['maxNum'] = intval($_POST['maxnum']);

    if ($_SESSION['level'] === 'custom') {
        $_SESSION['customMin'] = intval($_POST['num1']);
        $_SESSION['customMax'] = intval($_POST['num2']);
    }

    header("Location: math.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Math Quiz</title>
</head>
<body>
    <header>
        <h1>Math Quiz</h1>
    </header>

    <div class="form-container">
        <form action="index.php" method="POST">
            <fieldset>
                <legend>Level</legend>
                <label>
                    <input type="radio" name="level" value="1-10" required>
                    Level 1 (1-10)
                </label>
                <label>
                    <input type="radio" name="level" value="11-100">
                    Level 2 (11-100)
                </label>
                <label>
                    <input type="radio" name="level" value="custom">
                    Custom Level
                    <input type="number" id="num1" name="num1" placeholder="Min" style="width: 60px;">
                    -
                    <input type="number" id="num2" name="num2" placeholder="Max" style="width: 60px;">
                </label>
            </fieldset>

            <fieldset>
                <legend>Operation</legend>

                <label>
                    <input type="radio" name="operator" value="add" required>
                    Addition
                </label>

                <label>
                    <input type="radio" name="operator" value="subtract">
                    Subtraction
                </label>

                <label>
                    <input type="radio" name="operator" value="multiply">
                    Multiplication
                </label>
            </fieldset>

            <label for="numitem">Number of items:</label>
            <input type="number" id="numitem" name="numitem" placeholder="e.g., 10" required>
            
            <label for="max">Max Difference of choices from the correct answer:</label>
            <input type="number" id="max" name="maxnum" placeholder="e.g., 10" required>

            <button type="submit">Start Quiz</button>
        </form>
    </div>
</body>
</html