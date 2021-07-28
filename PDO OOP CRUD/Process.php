<?php
include 'Classes/Post.php';


$post = new Post();
if (isset($_POST['submit'])) {
    $post->setName($_POST['name']);
    $post->setCategory($_POST['category']);
    $post->setDescription($_POST['description']);
    $post->setPrice($_POST['price']);
    $post->setGuarantee($_POST['guarantee']);
    $post->setManufacturer($_POST['manufacturer']);
    $post->setModel($_POST['model']);
    $post->setYearOfIssue($_POST['year_of_issue']);
    $post->Store();
} elseif (isset($_POST['update'])) {
    $post->setId($_GET['id']);
    $post->setName($_POST['name']);
    $post->setCategory(['category']);
    $post->setDescription($_POST['description']);
    $post->setPrice($_POST['price']);
    $post->setGuarantee($_POST['guarantee']);
    $post->setManufacturer($_POST['manufacturer']);
    $post->setModel($_POST['model']);
    $post->setYearOfIssue($_POST['year_of_issue']);
    $post->Update();
} elseif ($_GET['send'] === 'delete') {
    $post->setId($_GET['id']);
    $post->Delete();
}
