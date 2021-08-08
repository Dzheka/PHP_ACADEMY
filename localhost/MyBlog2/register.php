<?php
    include ("includes/account.php");
    include ("Classes/constants.php");
        $account = new account();

    include ("includes/registerHandler.php");
    include ("includes/loginHandler.php");
?>

<html>
<head>
    <title>Welcome to my Blog!</title>
</head>
<body>

    <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
            <h2>Вход в Блог</h2>
            <p>
                <label for="loginUsername">Ваше имя</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="Ф.И.О" required>
            </p>
            <p>
                <label for="loginPassword">Пароль</label>
                <input id="loginPassword" name="loginPassword" type="password" required>
            </p>
                <button type="submit" name="loginButton">Войти</button>
        </form>


        <form id="registerForm" action="register.php" method="POST">
            <h2>Зарегистрироваться</h2>

            <p>
                <?php echo $account->getError(constants::$usernameCharacters);?>
                <label for="username">Ваше имя</label>
                <input id="username" name="username" type="text" placeholder="Ф.И.О" required>
            </p>
            <p>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="main@gmail.com" required>
            </p>
            <p>
                <label for="password">Пароль</label>
                <input id="password" name="password" type="password" placeholder="введите пароль" required>
            </p>
            <p>
                <label for="password2">Подтвердите пароль</label>
                <input id="password2" name="password2" type="password" placeholder="повторите пароль" required>
            </p>
            <button type="submit" name="registerButton">Регистрация</button>
        </form>
    </div>


</body>
</html>