<?php if ($row) : ?>

    <?php foreach ($row as $item) : ?>
        <div class="col mb-4">
            <div class="card">
                <div style="margin: 0 auto;">
                    <img src="<?= $item->product_image ?>" class="card-img-top" alt="..."
                         style="max-width: 180px; height: 220px">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $item->product_name ?></h5>
                    <small>Model: <?= $item->model ?></small>
                    <br>
                    <small>Guarantee: <?= $item->guarantee ? $item->guarantee . ' year' : "No guarantee" ?></small>
                    <p class="card-text"><?= $item->description ?></p>
                    <h4>Price: <?= $item->price . " c."; ?></h4>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Year of issue: <?= $item->year_of_issue ?></small>
                    <small class="text-muted float-right"><?= $item->manufacturer ?></small>
                </div>

                <?php if (!isset($_SESSION) || empty($_SESSION)): ?>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#register">Заказать
                    </button>
                    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">вы не регистрованы</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h3>У вас нет Аккаунт</h3>
                                    <a href="../views/registrationForm.php">Регистрируйтесь</a>
                                    или сделайте <a href="../views/loginForm.php">Вход</a>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <a href="../views/loginForm.php" class="btn btn-outline-success">Заказать</a>-->

                <?php elseif ($_SESSION['role'] === 'user'): ?>
                    <a href="../processes/order.php" class="btn btn-outline-primary">Заказать
                    </a>
                <?php endif; ?>

                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <div>
                        <form action="../processes/delete.php" method="post" class="d-inline-block">
                            <input type="hidden" name="id" value="<?= $item->id ?>">
                            <input type="submit" value="Delete" class="btn btn-outline-danger">
                        </form>
                        <a href="../views/updateForm.php?id=<?= $item->id ?>" class="btn btn-outline-success">Edit</a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <h1>No Products is here</h1>
<?php endif ?>
