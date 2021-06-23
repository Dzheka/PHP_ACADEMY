<?php
require 'config.php';

function getCityById($id, $conn) {
    $query = "SELECT c.id, c.name AS city_name, c.square, c.population, c.is_active, ctrs.name AS country_name FROM cities c
  INNER JOIN countries ctrs ON ctrs.id = c.country_id WHERE c.id = $id";
    $result = mysqli_query($conn, $query);
   return mysqli_fetch_assoc($result);
}

function getCities($conn) {
$query = "SELECT c.id, c.name AS city_name, c.square, c.population, c.is_active, ctrs.name AS country_name, c.density FROM cities c
  INNER JOIN countries ctrs ON ctrs.id = c.country_id
ORDER BY c.population DESC";
$result = mysqli_query($conn, $query);
return $result;
}

function getCountries($conn) {
    $query = "SELECT * FROM countries";
    $result = mysqli_query($conn, $query);
    return $result;
}

function updateCity($data, $conn) {
    $query = "UPDATE cities SET name='{$data['city_name']}', population={$data['population']}, square={$data['square']}, ";
    $query .= "density={$data['dencity']}, country_id={$data['country_id']} WHERE id={$data['id']}";
    $stmt = $conn->prepare($query);
    $stmt->execute();
}

function deleteCity($id, $conn) {
    $query = "DELETE FROM cities WHERE id=$id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
}

function createCity($data, $conn) {
    $query = "INSERT INTO cities(name, population, square, density, country_id) VALUES ('{$data['city_name']}', {$data['population']}, {$data['square']}, {$data['dencity']}, {$data['country_id']})";
    $stmt = $conn->prepare($query);
    $stmt->execute();
}