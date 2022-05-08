<?php

    require_once 'config/db_conn.php';
    
class DB
{
    private $conn;

    public function __construct()
    {
        global $con;
        $this->conn = $con;
    }

    private function Close($con)
    {
        mysqli_close($con);
    }

    public function getPosts($id){
        $conn = $this->conn;

        $sql = "SELECT `fid` FROM `friends` WHERE `uid` = ? AND `accepted` = 1";
        if($result = $conn->prepare($sql)){
            $result->bind_param("i", $id);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $data[] = $row['fid'];
                }
                //return $data;
            }
        }
        
        foreach ($data as $fid ){
            $result = $conn->prepare("SELECT `posts`.`caption`, `posts`.`file_path`, `posts`.`datetime`, `users`.`username` 
                    FROM `posts` INNER JOIN `users`  
                    ON `posts`.`uid` = `users`.`id`
                    WHERE `posts`.`uid` = ?
                    ORDER BY `posts`.`datetime` DESC");

            
            $result->bind_param("i", $fid);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $resdata[] = $row;
                }
                //return $resdata;
            }
        }
        return $resdata;
    }
}

?>