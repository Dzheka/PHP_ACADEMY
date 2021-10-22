<?php
include("Includes/Account.php");
include("Validators/ValidatorMessageConstants.php");
include("Validators/AccountValidator.php");

include("Includes/registerHandler.php");
include("Includes/loginHandler.php");
?>

<html>
<head>
    <title>Welcome to my Blog!</title>
</head>
<body>

<div id="inputContainer">
    <form id="registerForm" action="register.php" method="POST">
        <h2>Зарегистрироваться</h2>


        <p>
            <?php echo $validator->getError("username"); ?>

            <label for="username">Ваше имя</label>
            <input id="username" name="username" type="text" placeholder="Ф.И.О" required>
        </p>

        <button type="submit" name="registerButton">Регистрация</button>
    </form>
</div>


</body>
</html>
