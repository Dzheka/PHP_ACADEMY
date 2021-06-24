<?php if ($errors): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
        <div><?= $error ?></div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $name ?>">
    </div>
    <div class="form-group">
        <label for="surname">Surname</label>
        <input type="text" class="form-control" name="surname" id="surname" value="<?= $surname ?>">
    </div>
    <div class="form-group">
        <label for="bio">bio</label><br>
        <textarea name="bio" id="bio"></textarea>
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label><br>
        <input type="file" name="avatar" id="avatar">
    </div>
    <div>
        <input type="submit" name="" value="submit" class="btn btn-success">
    </div>
</form>