<?php
include_once 'Database.php';

class HomeRepository
{
    private $connection;

    function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    
    public function getHome()
    {
        $sql = "SELECT * FROM home_versions
                ORDER BY created_at DESC
                LIMIT 1";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

return $data ?: [
  'hero_title' => '',
  'hero_text' => '',
  'services_intro' => '',
  'cta_text' => ''
];

    }

    
    public function saveHome($heroTitle, $heroText, $servicesIntro, $ctaText)
    {
        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) return;

        $sql = "INSERT INTO home_versions
                (hero_title, hero_text, services_intro, cta_text, created_by)
                VALUES (?,?,?,?,?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $heroTitle,
            $heroText,
            $servicesIntro,
            $ctaText,
            $userId
        ]);

        $this->saveLog('home', $this->connection->lastInsertId(), 'created', $userId);
    }

    public function saveLog($module, $itemId, $action, $userId)
    {
        $sql = "INSERT INTO activity (module, item_id, user_id, action)
                VALUES (?,?,?,?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$module, $itemId, $userId, $action]);
    }
}

