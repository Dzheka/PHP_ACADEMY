<?php include 'header.php' ?>
<?php include 'alert.php' ?>

<main class="container mt-6">
    <div class="row justify-content-center fix-center">
        <div class="col-md-8">
            <div class="jumbotron text-center">
                <h1><strong>WE</strong> Are <strong>HERE!</strong></h1>
                <p><em>And <strong>YOU</strong> should be here too!</em></p>
                <h2>FOLLOWERS: <strong><?=$page['users']['howmany']?></strong></h2>
                <hr />
                <a class="btn btn-lg btn-success" href=".?act=register">Become on of US!</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>