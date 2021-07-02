<?php


?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Add User</title>
</head>
<body>
<div class="container mt-5 mb-5">
    <div class="row">
        <form action="action.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="text" id="name" name="name" placeholder="Your name">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="surname" name="surname" placeholder="Your surname">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="bio" cols="30" rows="10" placeholder="Write anything about you"></textarea>
            </div>
            <div class="form-group">
                <label for="avatar">Choose file</label><br />
                <input type="file" name="avatar" id="avatar">
            </div><br />
            <button class="btn btn-success" type="submit">Send</button>
        </form>
    </div>
</div>

</body>
</html>