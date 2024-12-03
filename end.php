<?php
session_start();

$numItems = $_SESSION['numItems'];
$correct = $_SESSION['correct'];
$grade = ($correct / $numItems) * 50 + 50;

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="end.css">

<title>Quiz Results</title>
<body>
<header>
    <h1>Math Quiz Results</h1>
</header>

<div class="form-container">
    <p><strong>Correct Answers:</strong> <?php echo $correct; ?></p>
    <p><strong>Wrong Answers:</strong> <?php echo $_SESSION['wrong']; ?></p>
    <p><strong>Your Grade:</strong> <?php echo $grade; ?>%</p>

    <form action="index.php">
        <button type="submit">Take Quiz Again</button>
    </form>
</div>
</body>
</html>

