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

