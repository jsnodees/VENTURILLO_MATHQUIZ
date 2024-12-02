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
    
    <div class="form-container">
        <form action="index.php" method="POST">
            <fieldset>
                <legend>Level</legend>
                <label>
                    <input type="radio" name="level" value="1-10" required>
                    Level 1 (1-10) 
                </label>
                <label>
                    <input type="radio" name="level" value="11-100" required>
                    Level 2 (11-100) 
                </label>
                <label>
                    <input type="radio" name="level" value="custom">
                    Custom Level
                    <input type="number" id="num1" name="num1" placeholder="Min" style="width:50px;">
                    -
                    <input type="number" id="num2" name="num2" placeholder="Max" style="width:50px;">
                </label>
            </fieldset>

            <fieldset>
                <legend>Operation</legend>

                <label>
                    <input type="radio" name="operator" value="add" required>
                    Addition
                </label>

                <label>
                    <input type="radio" name="operator" value="subtract" required>
                    Subtraction
                </label>

                <label>
                    <input type="radio" name="operator" value="multiply" required>
                    Multiplication
                </label>
            </fieldset>
            
        </form>
    </div>
</body>
</html>

