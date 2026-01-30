<?php

class Project
{
    private $id;
    private $title;
    private $location;
    private $description;
    private $price;
    private $size;
    private $type;
    private $image;
    private $link;
    private $status;

    public function __construct($id, $title, $location, $description, $price, $size, $type, $image, $link, $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->location = $location;
        $this->description = $description;
        $this->price = $price;
        $this->size = $size;
        $this->type = $type;
        $this->image = $image;
        $this->link = $link;
        $this->status = $status;
    }

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getLocation() { return $this->location; }
    public function getDescription() { return $this->description; }
    public function getPrice() { return $this->price; }
    public function getSize() { return $this->size; }
    public function getType() { return $this->type; }
    public function getImage() { return $this->image; }
    public function getLink() { return $this->link; }
    public function getStatus() { return $this->status; }
}

?>
