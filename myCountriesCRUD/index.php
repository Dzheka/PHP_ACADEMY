<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
</head>
<body>

    <button class="btn btn-success pull-right"><a href="views/createPage.php">Add country</a></button>

    <table class="table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Country Name</th>

                <th>More</th>
                <th>CONTROLS</th>

            </tr>
        </thead>
        <tbody>

            <?php
                include 'config.php';
                foreach ($countries as $country) :
            ?>
                <tr>

                    <td> <?php echo $country[0]; ?></td>
                    <td  style="cursor: pointer">
                        <a href="https:google.com"><?php  echo $country[1];?></a>
                        <input type="hidden" name="id" value="<?php echo $country[0] ?>">
                    </td>

                    <td> <form action="views/showPage.php" method="post">
                            <input type="hidden" name="countryId" value="<?php echo $country[0]?>">
                            <button class="btn-info"> Cities Country </button>
                        </form>
                    </td>
                    <td>  <form action="views/editPage.php" method="post">
                            <input type="hidden" name="countryId" value="<?php echo $country[0]?>">
                            <button class="btn-primary"> edit </button>
                        </form>

                        <form action="crudControllers/delete.php" method="post">
                            <input type="hidden" name="deleteId" value="<?php echo $country[0]?>">
                            <button class="btn-danger"> delete </button>
                        </form>
                    </td>

                </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</body>
</html>

