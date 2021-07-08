<?php
include 'Post.php';
if (isset($_POST['postSave'])){
    $post = new Post(
        $_POST['price'],
        $_POST['description'],
        $_POST['address'],
        $_POST['user_id']
    );
    $post->create();

}
