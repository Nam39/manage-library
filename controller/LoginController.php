<?php
require_once "../model/UserModel.php";

session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["login_id"];
    $password = $_POST["password"];

    if (empty($username)) {
        $errors[] = "Hãy nhập loginid.";
    } elseif (strlen($username) < 4) {
        $errors[] = "Loginid phải có ít nhất 4 ký tự.";
    }

    if (empty($password)) {
        $errors[] = "Hãy nhập password.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password phải có ít nhất 6 ký tự.";
    }

    if (UserModel::login($username, $password)) {
        $_SESSION['login_id'] = $username;
        header("Location: ../view/home.php");
    } else {
        $errors[] = "loginid và password không đúng.";
        $_SESSION['errors'] = $errors;
        header("Location: ../view/index.php");
    }
}
?>
