<?php

require_once "../classes/Product.php";

$product = new Product();

$id = $_GET['id'];

$row = $product->show(null, $id);

require_once "../processes/update.php";
?>

<?php require_once "../templates/header.php"; ?>

<div class="row justify-content-center">
    <form action="" method="post" enctype="multipart/form-data" class="w-50">
    <h1>Update <?= $row[0]->product_name; ?></h1>
        <div class="form-group">
            <label for="product_name">Product name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $row[0]->product_name; ?>" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Price</label>
                <input type="number" min="0" class="form-control" name="price" value="<?= $row[0]->price; ?>" required>
            </div>

            <div class="form-group col-md-5">
                <label>Year of issue</label>
                <input type="text" class="form-control" name="yearOfIssue" value="<?= $row[0]->year_of_issue; ?>" required>
            </div>
            <div class="form-group col-md-3">
                <label>Guarantee</label>
                <input type="number" class="form-control" min="0" name="guarantee" value="<?= $row[0]->guarantee; ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Model</label>
                <input type="text" class="form-control" name="model" value="<?= $row[0]->model; ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label>Category</label>
                <select name="category" id="" class="form-control">
                    <option value="all" selected>select...</option>
                    <option value="mobile">Mobile</option>
                    <option value="Something">Something</option>
                    <option value="test">Test</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Manufacturer</label>
            <input type="text" class="form-control" name="manufacturer" value="<?= $row[0]->manufacturer; ?>" required>
        </div>

        <div class="custom-file">
            <input type="file" name="product_image" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <a href="/public" class="btn btn-secondary mt-4">cancel</a>
        <input type="submit" class="btn btn-success mt-4 float-right" name="update" value="save">
    </form>
</div>

<?php require_once "../templates/footer.php"; ?>

