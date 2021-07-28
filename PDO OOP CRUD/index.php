<?php include 'Templates/header.php' ?>
<?php include 'Classes/Post.php'; ?>
<p><h1 align="center">Technical Market</h1></p>

<div class="text-center">
    <button type="button" class=" my-5 btn btn-primary" data-toggle="modal" data-target="#addPostModal">
        Create Product
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Process.php" method="post">
                        <div class="form-group">
                            <label>Name </label>
                            <input type="text" name="name" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Category </label>
                            <input type="text" name="category" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Guarantee year</label>
                            <input type="text" name="guarantee" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Manufacturer</label>
                            <input type="text" name="manufacturer" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Year of issue</label>
                            <input type="number" name="year_of_issue" class="form-control" required>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php $posts = new Post();
    $row = $posts->Read();
    ?>
    <?php if ($row): ?>
        <?php foreach ($row as $post) : ?>
            <div class="row row-cols-1 row-cols-md-3">

                <div class="col mb-4">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Name:<?= $post['name'] ?></h5>
                            <small>Model: <?= $post['model'] ?></small>
                            <br>
                            <small>Guarantee: <?= $post['guarantee'] ?></small>
                            <p class="card-text"> Description:<?= $post['description'] ?></p>
                            <h4>Price: <?= $post['price'] . " c."; ?></h4>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Year of issue: <?= $post['year_of_issue'] ?></small>
                            <p>
                                <small class="text-muted float-right">Manufacturer:<?= $post['manufacturer'] ?></small>
                            </p>
                            <p><small class="text-muted float-right">Category:<?= $post['category'] ?></small></p>

                        </div>
                        <a href="Edit.php?id=<?= $post['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="Process.php?id=<?= $post['id'] ?>&send=delete" class="btn btn-danger">Delete</a>
                    </div>

                </div>
            </div>

        <?php endforeach; ?>
    <?php else : ?>
        <h1>Data is Empty</h1>
    <?php endif; ?>

</div>
<?php include 'Templates/footer.php'; ?>
<?php include 'RequestsForm.php' ?>
