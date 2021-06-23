<?php include(TEMPLATES. 'header.php'); ?>
<main class="container mt-3">
    <?php require(TEMPLATES. 'alert.php');?>
    <ul class="nav nav-tabs" id="tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="city-tab" data-toggle="tab" href="#city" role="tab" aria-controls="city" aria-selected="true">Add City</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="country-tab" data-toggle="tab" href="#country" role="tab" aria-controls="country" aria-selected="false">Add Country</a>
        </li>
    </ul>
    <div class="tab-content" id="tabcontents">
        <div class="tab-pane fade show active" id="city" role="tabpanel" aria-labelledby="home-tab">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form id="city-form" action=".?act=create&md=city" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="name">City name</label>
                            <input type="text" class="form-control" name="name" id="name" required placeholder="City name">
                        </div>
                        <div class="form-group">
                            <label for="population">Population</label>
                            <input type="number" class="form-control" name="population" id="population" required placeholder="City population">
                        </div>
                        <div class="form-group">
                            <label for="area">Area</label>
                            <input type="number" class="form-control" name="area" id="area" required placeholder="City area">
                        </div>
                        <div class="form-group">
                            <label for="is_active">Active</label>
                            <select name="is_active" id="is_active" class="form-control" required>
                                <option value="0" default>FALSE</option>
                                <option value="1">TRUE</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="country_id">Country</label>
                            <select name="country_id" id="country_id" required class="form-control">
                            <?php foreach ($content['countries'] as $country) { ?>
                                <option value="<?=$country['id']?>"><?=$country['name']?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group text-right">
                            <a class="btn btn-danger" href=".">← Go back</a>
                            <button class="btn btn-success" type="submit">Add new city</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="country" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form id="city-form" action=".?act=create&md=country" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="cname">Name</label>
                            <input type="text" class="form-control" name="name" id="cname" required placeholder="Country name">
                        </div>
                        <div class="form-group text-right">
                            <a class="btn btn-danger" href=".">← Go back</a>
                            <button class="btn btn-success" type="submit">Add new country</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include(TEMPLATES. 'footer.php'); ?>