<?php
include_once 'Database.php';

class StatsRepository
{
    private $connection;

    function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function getAllStats()
    {
        $stmt = $this->connection->prepare("SELECT * FROM stats ORDER BY ord ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStat($id, $nr, $txt)
    {
        $stmt = $this->connection->prepare("UPDATE stats SET nr=?, txt=? WHERE id=?");
        $stmt->execute([$nr, $txt, $id]);
        $userId = $_SESSION['user_id'] ?? null;
$this->saveLog('stats', $id, 'updated', $userId);


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
