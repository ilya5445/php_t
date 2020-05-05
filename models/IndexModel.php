<?

class IndexModel extends Model {

    public function getAllTasks() {
        $result = array();
        $sql = "SELECT * FROM `tasks`";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }

    public function getLimitTasks($leftLimit, $rightLimit, $sort = 'id', $type = 'ASC') {
        $result = array();
        $sort = htmlspecialchars($sort);
        $type = htmlspecialchars($type);
        // $sql = "SELECT *, ts.`id` AS `tsid`, t.`id` AS tid FROM `tasks` t LEFT JOIN `task_status` ts ON t.`status` = ts.`id` ORDER BY t.`$sort` LIMIT :leftLimit, :rightLimit";
        $sql = "SELECT * FROM `tasks` ORDER BY `$sort` $type LIMIT :leftLimit, :rightLimit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":leftLimit", $leftLimit, PDO::PARAM_INT);
        $stmt->bindValue(":rightLimit", $rightLimit, PDO::PARAM_INT);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;

    }

    public function setTask($data) {
        $sql = "INSERT INTO `tasks` (`name`, `email`, `text`) VALUES ('".addslashes(htmlspecialchars($data['name']))."', '".addslashes(htmlspecialchars($data['email']))."', '".addslashes(htmlspecialchars($data['text']))."');";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function updateTask($id, $text, $status, $admin = 0) {

        if (!isset($admin)) { $admin = 0; }
        
        $sql = "UPDATE `tasks` SET `text` = '$text', `status` = $status, `editadmin` = '$admin' WHERE `id` = '$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function getTaskById($id) {
        $result = array();
        $sql = "SELECT * FROM `tasks` WHERE `id` = '$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result = $row;
        }
        return $result;
    }

}