<?php if ($errors): ?>
    <div class="alert alert-danger mt-4">
        <?php foreach ($errors as $error): ?>
            <div><?= $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="" method="post" class="form">
    <div class="mt-4 form-group">
        <label for="city_name">Name</label>
        <input type="text" class="form-control" name="city_name" id="city_name" value="<?= $cityName ?>">
    </div>
    <div class="form-group">
        <label for="population">Population</label>
        <input type="number" class="form-control" name="population" id="population" value="<?= $population ?>">
    </div>
    <div class="form-group">
        <label for="area">Area</label>
        <input type="text" class="form-control" name="area" id="area" value="<?= $area ?>">
    </div>
    <div class="mt-3 d-inline">
        <input type="submit" class="btn btn-primary" value="<?= $btnValue ?>">
    </div>
    <a href="index.php" class="btn btn-danger float-right">Отмена</a>
</form>