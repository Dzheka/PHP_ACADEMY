<?php
include 'MyBlog.php';
if (isset($_POST['blogSave'])){
    $post = new Blog(
        $_POST['name'],
        $_POST['email'],
        $_POST['pass']
    );
    $post->create();
}

$post = new Blog(

);