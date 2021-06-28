
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            padding: 50px;
        }
    </style>
</head>
<body>
<h1>Customer adding table</h1>
<form action="add_info.php" method="post" enctype="multipart/form-data">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Enter name" class="form-control">
    <label for="surname">Surname</label>
    <input type="text" name="surname" placeholder="Enter surname" class="form-control">
    <div>
        <label for="bio">Bio</label>
        <br>
        <textarea name="bio" placeholder="Enter bio" cols="20" rows="10"></textarea>
    </div>
    <label for="avatar">Avatar</label>
    <br>
    <input type="file" name="avatar"   id="fileToUpload" placeholder="Enter avatar">
    <br>
    <input type="submit" name="submit" value="ADD" class="btn btn-primary">
</form>
</body>
</html>
