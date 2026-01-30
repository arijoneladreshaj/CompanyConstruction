<?php

interface IProjectsRepository
{
    public function insertProject($title, $location, $description, $price, $size, $type, $image, $link, $status);

    public function getAllProjects();

    public function getProjectById($id);

    public function updateProject($id, $title, $location, $description, $price, $size, $type, $image, $link, $status);

    public function deleteProject($id);
}
?>