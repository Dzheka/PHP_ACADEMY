<?php
session_start();

if ($_SESSION['role'] === 'admin'): ?>
    <button type="button" class="plusik" data-toggle="modal" data-target="#ProductForm">
        <div>
            +
        </div>
    </button>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="ProductForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--              Form             -->
                <form action="../processes/create.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name">Product name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Price</label>
                            <input type="number" min="0" class="form-control" name="price" required>
                        </div>

                        <div class="form-group col-md-5">
                            <label>Year of issue</label>
                            <input type="text" class="form-control" name="yearOfIssue" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Guarantee</label>
                            <input type="number" min="0" class="form-control" name="guarantee" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Model</label>
                            <input type="text" class="form-control" name="model" required>
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
                        <input type="text" class="form-control" name="manufacturer" required>
                    </div>

                    <div class="custom-file">
                        <input type="file" name="product_image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>