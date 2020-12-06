<?php
    $title = "Регистрация";
    require_once("header.php");
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="my-4 text-center">Регистрация</h1>
            </div>
            <div class="col-6">
                <form action="reg_obr.php" method="POST" class="reg-form">
                    <p class="error-text" style="color: red;"></p>
                    <input type="text" class="form-control" placeholder="Введите имя" name="name">
                    <input type="text" class="form-control" placeholder="Введите фамилию" name="lastname">
                    <input type="password" class="form-control" placeholder="Введите пароль" name="password">
                    <input type="password" class="form-control" placeholder="Повторите пароль" name="password-check">
                    <input type="text" class="form-control" placeholder="Введите e-mail" name="email">
                    <input type="submit" value="Зарегистрироваться" class="btn btn-primary btn-block reg-button">
                </form>
            </div>
        </div>
    </div>
<?php
    require_once("footer.php");
?>
