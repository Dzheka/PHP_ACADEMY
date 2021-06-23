<?php include 'header.php' ?>

<main class="container mt-6">
    <div class="row justify-content-center fix-center">
        <div class="col-md-8">
            <div class="jumbotron">
                <h1 class="text-center">Today <strong>YOU</strong> can become <strong>ONE OF US</strong>!</h1>
                <p class="text-center"><em>You will be better then who you are right now!</em></p>
                <hr />

                <form action=".?act=register" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="uname">Name: </label>
                        <input type="text" class="form-control" name="uname" id="uname" required placeholder="You beautiful name" />
                    </div>
                    <div class="form-group">
                        <label for="usurname">Surname: </label>
                        <input type="text" class="form-control" name="usurname" id="usurname" required placeholder="You beautiful surname"/>
                    </div>
                    <div class="form-group">
                        <label for="ubio">Bio: </label>
                        <textarea class="form-control" name="ubio" id="ubio" rows="5" placeholder="Something about yourself..."></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="uphoto" id="uphoto">
                            <label class="custom-file-label" for="uphoto">Choose your profile picture</label>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg btn-primary">ADD ME TOO!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>