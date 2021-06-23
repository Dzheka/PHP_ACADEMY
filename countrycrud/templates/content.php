<?php include(TEMPLATES. 'header.php'); ?>
<main class="container mt-3">
    <?php require(TEMPLATES. 'alert.php');?>
    <ul class="nav nav-tabs" id="tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="city-tab" data-toggle="tab" href="#city" role="tab" aria-controls="city" aria-selected="true">Cities</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="country-tab" data-toggle="tab" href="#country" role="tab" aria-controls="country" aria-selected="false">Countries</a>
        </li>
    </ul>
    <div class="tab-content" id="tabcontents">
        <div class="tab-pane fade show active" id="city" role="tabpanel" aria-labelledby="home-tab">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th scope="col">
                                        ID
                                    </th>
                                    <th scope="col">
                                        CITY NAME
                                    </th>
                                    <th scope="col">
                                        POPULATION
                                    </th>
                                    <th scope="col">
                                        AREA
                                    </th>
                                    <th scope="col">
                                        DENSITY
                                    </th>
                                    <th scope="col">
                                        COUNTRY
                                    </th>
                                    <th scope="col">
                                        CONTROLS
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($content['cities'] as $city) { ?>
                                <tr scope="row" class="text-center">
                                    <td>
                                        <?= $city['id']; ?>
                                    </td>
                                    <td>
                                    <?= $city['name']; ?>
                                    </td>
                                    <td>
                                    <?= $city['population']; ?>
                                    </td>
                                    <td>
                                    <?= $city['area']; ?> &#13217;
                                    </td>
                                    <td>
                                    <?= $city['density']; ?>
                                    </td>
                                    <td>
                                    <?= $city['country']; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href=".?act=update&md=city&id=<?= $city['id']; ?>">Edit</a>
                                        <form action=".?act=delete" method="POST" style="display: initial;">
                                            <input type="hidden" value="<?= $city['id']; ?>" name="id" id="id">
                                            <input type="hidden" value="city" name="type" id="type">
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="country" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th scope="col">
                                        ID
                                    </th>
                                    <th scope="col">
                                        COUNTRY NAME
                                    </th>
                                    <th scope="col">
                                        TOTAL POPULATION
                                    </th>
                                    <th scope="col">
                                        TOTAL AREA
                                    </th>
                                    <th scope="col">
                                        TOTAL DENSITY
                                    </th>
                                    <th scope="col">
                                        TOTAL CITIES
                                    </th>
                                    <th scope="col">
                                        CONTROLS
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($content['countries'] as $country) { ?>
                                <tr scope="row" class="text-center">
                                    <td>
                                        <?= $country['id']; ?>
                                    </td>
                                    <td>
                                    <?= $country['name']; ?>
                                    </td>
                                    <td>
                                    <?= $country['totalpopulation']; ?>
                                    </td>
                                    <td>
                                    <?= $country['totalarea']; ?> &#13217;
                                    </td>
                                    <td>
                                    <?= $country['totaldensity']; ?>
                                    </td>
                                    <td>
                                    <?= $country['totalcities']; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href=".?act=update&md=country&id=<?= $country['id']; ?>">Edit</a>
                                        <form action=".?act=delete" method="POST" style="display: initial;">
                                            <input type="hidden" value="<?= $country['id']; ?>" name="id" id="id">
                                            <input type="hidden" value="country" name="type" id="type">
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include(TEMPLATES. 'footer.php'); ?>