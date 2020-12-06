<?php
header('Content-Type: text/html; charset=utf-8');

$name = htmlspecialchars( trim($_POST["name"]));
$lastname = htmlspecialchars( trim($_POST["lastname"]));
$password = htmlspecialchars( trim($_POST["password"]));
$passwordCheck = htmlspecialchars( trim($_POST["password-check"]));
$email = htmlspecialchars( trim($_POST["email"]));

//Дополнительная проверка на заполненность полей
if(empty($name) || empty($lastname) || empty(password) || empty(email)) {
    exit("Не все поля заполнены");
}

//Проверка на совпадение паролей
if ($password != $passwordCheck) {
    exit("Пароли не совпадают!");
}

//Валидатор адреса электронной почты
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("В адресе электронной почты нет знака -  @! Для успешной регистрации необходимо его добавить!");
}

//Дополнительно сделал хэширование паролей
$password = password_hash($password, PASSWORD_BCRYPT);

require_once("db.php");

//Проверка на наличие пользователя с таким-же адресом электронной почты.
$result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'")->fetch_assoc();
if(isset($result) ) {
    exit("Такой пользователь уже существует");
}

//Здесь введённый пользователем email в базе данных сохраняется и в поле email, и в поле login(его удалять не стал, т.к. нужен для учебного проекта, а по правилам
//хостинга, в моём случае, можно иметь только 1 БД.
$result = $mysqli->query("INSERT INTO `users`(`login`, `email`, `password`, `name`, `lastname`) VALUES ('$email', '$email', '$password', '$name', '$lastname')");
if ($result) {
    exit("ok");
} else {
    exit("Не удалось добавить пользователя.");
}
