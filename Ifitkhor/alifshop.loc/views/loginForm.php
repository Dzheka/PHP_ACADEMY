<?php

include_once "../processes/login.php";

?>

<?php include_once "../templates/header.php"; ?>
<style>
    body {
        padding: 50px;
        background-image: url("../images/login_1.jpg");
        background-size: cover;
    }
</style>
<div class="container w-25 login">
    <h1 class="text-white">Вход</h1>
    <form action="" method="post">
        <?php if ($errors['user']): ?>
            <div class="alert alert-danger">
                <?= $errors['user'] ?>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="" class="text-white">Name</label>
            <input type="text" name="name" class="form-control" value="<?= $_POST['name'] ?? null ?>">
            <div class="error">
                <?= $errors['name']; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="text-white">Password</label>
            <input type="password" name="password" class="form-control" value="<?= $_POST['password'] ?? null ?>">
            <div class="error">
                <?= $errors['password']; ?>
            </div>
        </div>
        <input type="submit" value="Вход" class="btn btn-outline-light" name="login">
    </form>

    <small class="mt-5 text-white">У вас нет аккаунт:
        <a href="../views/registrationForm.php" class="">регистрация</a></small>
</div>