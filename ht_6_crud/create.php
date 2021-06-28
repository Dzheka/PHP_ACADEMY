<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="./action.php" method="post">
                <div class="form-group">
                    <label for="cityName">City Name</label>
                    <input id="cityName" name="cityName" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="population">Population</label>
                    <input id="population" name="population" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="countryID">Country ID</label>
                    <input id="countryID" name="countryID" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="area">Area</label>
                    <input id="area" name="area" type="text" class="form-control">
                </div><br />
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
            <table class="table">
                <h1>Countries ID</h1>
                <tbody>
                <tr><td>1 - Tajikistan</td></tr>
                <tr><td>2 - Russian</td></tr>
                <tr><td>3 - Germany</td></tr>
                <tr><td>3 - Germany</td></tr>
                <tr><td>4 - USA</td></tr>
                <tr><td>5 - Australia</td></tr>
                <tr><td>6 - India</td></tr>
                <tr><td>7 - Uzbekistan</td></tr>
                <tr><td>8 - France</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
