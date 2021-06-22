<?php include(TEMPLATES. 'header.php'); ?>
<main class="container mt-3">
    <?php require(TEMPLATES. 'alert.php');?>
    <ul class="nav nav-tabs" id="tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link <?=($_GET['md'] === 'city') ? 'active' : ''?>" id="city-tab" data-toggle="tab" href="#city" role="tab" aria-controls="city" aria-selected="true">Add City</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link <?=($_GET['md'] === 'country') ? 'active' : ''?>" id="country-tab" data-toggle="tab" href="#country" role="tab" aria-controls="country" aria-selected="false">Add Country</a>
        </li>
    </ul>
    <div class="tab-content" id="tabcontents">
        <div class="tab-pane fade <?=($_GET['md'] === 'city') ? 'show active' : ''?>" id="city" role="tabpanel" aria-labelledby="home-tab">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php if($_GET['md'] === 'city') { ?>
                    <form id="city-form" action=".?act=update&md=city" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="name">City name</label>
                            <input type="hidden" name="id" id="cid" value="<?=$content['city']['id'];?>">
                            <input type="text" class="form-control" name="name" id="name" required placeholder="City name" value="<?=$content['city']['name']?>">
                        </div>
                        <div class="form-group">
                            <label for="population">Population</label>
                            <input type="number" class="form-control" name="population" id="population" required placeholder="City population" value="<?=$content['city']['population']?>">
                        </div>
                        <div class="form-group">
                            <label for="area">Area</label>
                            <input type="number" class="form-control" name="area" id="area" required placeholder="City area" value="<?=$content['city']['area']?>">
                        </div>
                        <div class="form-group">
                            <label for="area">Density</label>
                            <input type="number" class="form-control" name="density" id="density" required placeholder="City area" value="<?=$content['city']['density']?>">
                        </div>
                        <div class="form-group">
                            <label for="is_active">Active</label>
                            <select name="is_active" id="is_active" class="form-control" required>
                                <option value="0" <?=($content['city']['is_active'] == '0') ? "selected" : "" ?>>FALSE</option>
                                <option value="1" <?=($content['city']['is_active'] == '1') ? "selected" : "" ?>>TRUE</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="country_id">Country</label>
                            <select name="country_id" id="country_id" required class="form-control">
                            <?php foreach ($content['countries'] as $country) { ?>
                                <option value="<?=$country['id']?>" <?=($country['id'] === $content['city']['countryid']) ? "selected" : "" ?>><?=$country['name']?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group text-right">
                            <a class="btn btn-danger" href=".">← Go back</a>
                            <button class="btn btn-primary" type="submit">Update city</button>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade<?=($_GET['md'] === 'country') ? 'show active' : ''?>" id="country" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php if($_GET['md'] === 'country') { ?>
                    <form id="city-form" action=".?act=update&md=country" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="cname">Name</label>
                            <input type="hidden" name="id" id="cid" value="<?=$content['country']['id'];?>">
                            <input type="text" class="form-control" name="name" id="cname" required placeholder="Country name" value="<?=$content['country']['name']?>">
                        </div>
                        <div class="form-group text-right">
                            <a class="btn btn-danger" href=".">← Go back</a>
                            <button class="btn btn-success" type="submit">Update new country</button>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include(TEMPLATES. 'footer.php'); ?>