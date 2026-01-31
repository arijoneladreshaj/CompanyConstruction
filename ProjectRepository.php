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

private function saveLog($module, $itemId, $action, $userId)
{
    if (empty($userId)) return;

    $sql = "INSERT INTO activity (module, item_id, user_id, action)
            VALUES (?,?,?,?)";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$module, $itemId, $userId, $action]);
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
        $projectId = $this->connection->lastInsertId();
$userId = $_SESSION['user_id'] ?? null;
$this->saveLog('projects', $projectId, 'created', $userId);

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
        $userId = $_SESSION['user_id'] ?? null;
$this->saveLog('projects', $id, 'updated', $userId);

    }

    public function deleteProject($id)
    {
               $userId = $_SESSION['user_id'] ?? null;
$this->saveLog('projects', $id, 'deleted', $userId);
        $sql = "DELETE FROM projects WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
 

    }

public function getLogs()
{
    $sql = "SELECT a.module, a.item_id, a.action, a.created_at, u.email AS username
            FROM activity a
            LEFT JOIN users u ON u.id = a.user_id
            ORDER BY a.created_at DESC";

    return $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


}

?>