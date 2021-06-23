<?php

function uploadProfilePicture($data) {
    $filename = "";
    if (!empty($data)) {
        $filename = hash('md5', $data['uphoto']['name'].date()) . pathinfo($data['image']['tmp_name'], PATHINFO_EXTENSION);
        move_uploaded_file($data['image']['tmp_name'], '.photos/'. $filename);
    }
    return $filename;
}