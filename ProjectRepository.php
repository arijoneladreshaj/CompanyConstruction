<?php
include_once 'Database.php';
include_once 'IProjectsRepository.php';

class ProjectRepository implements IProjectsRepository
{
    private $connection;
    
 function __construct()
{
    $db = new Database();
    $this->connection = $db->getConnection();
}



    public function insertProject($title, $location, $description, $price, $size, $type, $image, $link, $status)
    {
        $sql = "INSERT INTO projects (title, location, description, price, size, type, image, link, status)
                VALUES (?,?,?,?,?,?,?,?,?)";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $title,
            $location,
            $description,
            $price,
            $size,
            $type,
            $image,
            $link,
            $status
        ]);
    }

    public function getAllProjects()
    {
        $sql = "SELECT * FROM projects";
        return $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjectById($id)
    {
        $sql = "SELECT * FROM projects WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProject($id, $title, $location, $description, $price, $size, $type, $image, $link, $status)
    {
        $sql = "UPDATE projects
                SET title=?, location=?, description=?, price=?, size=?, type=?, image=?, link=?, status=?
                WHERE id=?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $title,
            $location,
            $description,
            $price,
            $size,
            $type,
            $image,
            $link,
            $status,
            $id
        ]);
    }

    public function deleteProject($id)
    {
        $sql = "DELETE FROM projects WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
    }
}
?>