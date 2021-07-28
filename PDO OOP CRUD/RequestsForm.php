<?php include 'Classes/RequestsPost.php' ?>
<?php include 'Templates/header.php' ?>
<p><h1 align="center">Requests </h1></p>
<div align="center">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Add Requests</button>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="RequestsProcess.php" method="post">
                        <div class="form-group">
                            <label>FulName </label>
                            <input type="text" name="ful_name" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Phone Number </label>
                            <input type="text" name="phone_number" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Passport Number</label>
                            <input type="text" name="passport_number" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="number" name="product_price" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Product Guarantee</label>
                            <input type="text" name="product_guarantee" class="form-control" required>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Add requests</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div>

<?php $requestPost = new RequestsPost();
$rowRequests = $requestPost->read();
?>

        <div class="row">
<?php if ($rowRequests): ?>
    <?php foreach ($rowRequests as $request) :


    ?>

            <div class=class="row row-cols-1 row-cols-md-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 35rem;">
                            <div class="card-body">
                                <h5 class="card-title">Ful Name:<?= $request['ful_name'] ?></h5>
                                <h6 >Phone Number:<?= $request['phone_number'] ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted">Passport Number:<?= $request['passport_number'] ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted">Product Name:<?= $request['product_name'] ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted">Product Price:<?= $request['product_price'] ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted">Product Guarantee:<?= $request['product_guarantee'] ?></h6>

                                <a href="EditRequests.php?id=<?= $request['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="RequestsProcess.php?id=<?= $request['id'] ?>&send=delete" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

<?php else : ?>
    <h1>Data is Empty</h1>
<?php endif; ?>
</div>
<?php include 'Templates/footer.php'; ?>
