<?php

include_once "../processes/registration.php";

?>


<?php include_once "../templates/header.php"; ?>
<style>
    body {
        padding: 50px;
        background-image: url("../images/login_1.jpg");
    }

</style>
<div class="container w-50 register">
    <h1 class="text-white">Регистрация</h1>
    <form action="" method="post">
        <div class="form-group">
            <label class="text-white">Name</label>
            <input type="text" class="form-control" name="name" value="<?= $_POST['name'] ?? '' ?>" required>
            <div class="error">
                <?= $errors['name']; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="text-white">Email</label>
            <input type="text" class="form-control" name="email" value="<?= $_POST['email'] ?? '' ?>" required>
            <div class="error">
                <?= $errors['email']; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="text-white">Password</label>
            <input type="password" class="form-control" name="password" value="<?= $_POST['password'] ?? '' ?>" required>
            <div class="error">
                <?= $errors['password']; ?>
            </div>
        </div>
        <input type="submit" value="Register" class="btn btn-outline-light float-right" name="submit">
    </form>
</div>

<?php include_once "../templates/footer.php"; ?>
