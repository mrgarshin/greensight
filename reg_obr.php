<?php
header('Content-Type: text/html; charset=utf-8');

$name = htmlspecialchars( trim($_POST["name"]));
$lastname = htmlspecialchars( trim($_POST["lastname"]));
$password = htmlspecialchars( trim($_POST["password"]));
$passwordCheck = htmlspecialchars( trim($_POST["password-check"]));
$email = htmlspecialchars( trim($_POST["email"]));

if(empty($name) || empty($lastname) || empty(password) || empty(email)) {
    exit("Не все поля заполнены");
}
if ($password != $passwordCheck) {
    exit("Пароли не совпадают!");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("В адресе электронной почты нет знака -  @! Для успешной регистрации необходимо его добавить!");
}

$password = password_hash($password, PASSWORD_BCRYPT);

require_once("components/db.php");

$result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'")->fetch_assoc();
if(isset($result) ) {
    exit("Такой пользователь уже существует");
}

$result = $mysqli->query("INSERT INTO `users`(`login`, `email`, `password`, `name`, `lastname`) VALUES ('$email', '$email', '$password', '$name', '$lastname')");
if ($result) {
    exit("ok");
} else {
    exit("Не удалось добавить пользователя.");
}