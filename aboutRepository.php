<?php
include_once 'Database.php';


class AboutRepository 
{
    private $connection;

function __construct()
{
    $db = new Database();
    $this->connection = $db->getConnection(); 
}

    public function getAboutById($id)
    {
        $sql = "SELECT * FROM about WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    public function updateAbout($id, $year, $title, $text1, $text2, $img)
    {
        $sql = "UPDATE about
                SET year=?, title=?, text1=?, text2=?, img=?
                WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$year, $title, $text1, $text2, $img, $id]);
        /*marrja e te dhenave te activity */
        $userId = $_SESSION['user_id'] ?? null;
$this->saveLog('about', $id, 'updated', $userId);

    }


    public function saveLog($module, $itemId, $action, $userId)
{
    if (empty($userId)) return;

    $sql = "INSERT INTO activity (module, item_id, user_id, action)
            VALUES (?,?,?,?)";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$module, $itemId, $userId, $action]);
}

}
?>