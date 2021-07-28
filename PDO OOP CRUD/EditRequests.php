<?php  include "Templates/header.php"; ?>
<?php  include "Classes/RequestsPost.php"; ?>
<?php $requestPostEdit = new RequestsPost();
$requestPostEdit=$requestPostEdit->edit($_GET['id']); ?>

<div align="center">
    <h1>Update Requests</h1>
                    <form action="RequestsProcess.php?id=<?=$requestPostEdit['id']?>" method="post">
                        <div class="form-group">
                            <label>FulName </label>
                            <input type="text" name="ful_name" class="form-control" value="<?= $requestPostEdit['ful_name'] ?>" required>

                        </div>
                        <div class="form-group">
                            <label>Phone Number </label>
                            <input type="text" name="phone_number" class="form-control" value="<?= $requestPostEdit['phone_number'] ?>" required>

                        </div>
                        <div class="form-group">
                            <label>Passport Number</label>
                            <input type="text" name="passport_number" class="form-control" value="<?= $requestPostEdit['passport_number'] ?>" required>

                        </div>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="<?= $requestPostEdit['product_name'] ?>" required>

                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="number" name="product_price" class="form-control" value="<?= $requestPostEdit['product_price'] ?>" required>

                        </div>
                        <div class="form-group">
                            <label>Product Guarantee</label>
                            <input type="text" name="product_guarantee" class="form-control" value="<?= $requestPostEdit['product_guarantee'] ?>" required>
                            <a href="/" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary" name="update">Update requests</button>
                        </div>
                    </form>
</div>

<?php  include "Templates/footer.php"; ?>


