<?php

if (!empty($_GET['alert-type']) && !empty($_GET['alert-message'])) { ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-<?= $_GET['alert-type']; ?> alert-dismissible fade show" role="alert">
                <?= $_GET['alert-message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php } ?>