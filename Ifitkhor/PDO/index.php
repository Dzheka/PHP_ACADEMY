<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Notes</h1>
<form action="add.php" method="post">
    Note: <input type="text" name="note">
    <button type="submit">Add</button>
</form>

<?php
require "dbconfig.php";

$stmt = $pdo->query("SELECT * FROM notes");
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo "<ul>";
    echo "<li>{$row->note}           <a href='delete.php?id={$row->id}'><button>Delete</button></a>
<a href='edit.php?id={$row->id}'><button>Edit</button></a></li>";
    echo "</ul>";
}

?>
</body>
</html>
<?php
