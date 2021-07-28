<?php include "Templates/header.php"; ?>
<?php include "Classes/Post.php"; ?>
<?php $post = new Post();
$post = $post->Edit($_GET['id']); ?>
<div align="center">
    <h1>Update Product</h1>

    <div class="text-container">
        <form action="Process.php?id=<?= $post['id'] ?>" method="post">
            <div class="form-group">
                <label>Name </label>
                <input type="text" name="name" class="form-control" value="  <?= $post['name'] ?>" required>

            </div>
            <div class="form-group">
                <label>Category </label>
                <input type="text" name="category" class="form-control" value=" <?= $post['category'] ?>" required>

            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" value=" <?= $post['description'] ?>"
                       required>

            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value=" <?= $post['price'] ?>" required>

            </div>
            <div class="form-group">
                <label>Guarantee year</label>
                <input type="text" name="guarantee" class="form-control" value="  <?= $post['guarantee'] ?>" required>

            </div>
            <div class="form-group">
                <label>Manufacturer</label>
                <input type="text" name="manufacturer" class="form-control" value="  <?= $post['manufacturer'] ?>"
                       required>

            </div>
            <div class="form-group">
                <label>Model</label>
                <input type="text" name="model" class="form-control" value="  <?= $post['model'] ?>" required>

            </div>
            <div class="form-group">
                <label>Year of issue</label>
                <input type="text" name="year_of_issue" class="form-control" value=" <?= $post['year_of_issue'] ?>"
                       required>

            </div>
            <div class="modal-footer">
                <a href="/" type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary" name="update">Update Product</button>
            </div>
    </div>
    </form>
</div>
<?php include "Templates/footer.php"; ?>

