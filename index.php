<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="upload.php" method="post" enctype='multipart/form-data'>
    <p>
        <label>Name: <input type="text" name="first_name"></label>
    </p>
    <p>
        <label>Surname: <input type="text" name="last_name"></label>
    </p>
    <p>
        <label>Photo: <input type="file" name="avatar"></label>
    </p>
    <p>
        <textarea name="bio" cols="30" rows="10"></textarea>
    </p>
    <button type="submit" name="submit">Сохранить</button>
</form>
</body>
</html>