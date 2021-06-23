<?php

require "../config.php";
include "../functions.php";
$res = mysqli_query($mysqli,"SELECT * FROM cities ORDER BY id DESC");
$i = 1;

?>

<?php include "header.php"; ?>

    <h1 class="d-inline">Cities CRUD</h1>
    <a href="create.php" class="btn btn-success my-2 float-right">Добавить Город</a>
    <table class="table table-striped">
        <tr class="text-white bg-dark">
            <th>№</th>
            <th>Name</th>
            <th>Population</th>
            <th>Area</th>
            <th>Density</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $res->fetch_assoc()): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['population'] ?></td>
                <td><?= $row['area'] ?>км<sup>2</sup></td>
                <td><?= number_format($row['density'])?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                    <form action="delete.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
            $i++;
        endwhile;
        ?>
    </table>

<?php include "footer.php"; ?>