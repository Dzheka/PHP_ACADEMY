<?php

namespace Core\Request;

class Request {
    private $id;
    private $title;
    private $image;
    private $images;
    private $description;
    private $created_at;
    private $user_id;

    private function cleanCase($string) {
        return preg_replace('^[\w\d]/+', $string);
    }

    public function __construct(array $data) {
        if (!empty($data)) {
            if (isset($data['id'])) $this->id = $data['id'];
            if (isset($data['title'])) $this->title = $data['title'];
            if (isset($data['image'])) $this->image = $data['image'];
            if (isset($data['images'])) $this->images = $data['images'];
            if (isset($data['description'])) $this->description = $data['description'];
            if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        }
    }

    public static function show() {

    }

    public static function showById($id) {

    }

    public function create() {

    }

    public function update() {

    }

    public function delete() {

    }
}