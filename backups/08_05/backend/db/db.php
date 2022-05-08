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

        $sql = "SELECT `fid` FROM `friends` WHERE `uid` = ?";
        if($result = $conn->prepare($sql)){
            $result->bind_param("i", $id);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $data[] = $row;
                }
                //return $data;
            }
        }

        foreach ($data as $key => $fid ){
            return $fid;
            $result = $conn->prepare("SELECT * FROM `posts` WHERE `uid` = ?");
            $result->bind_param("i", $fid);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $resdata[] = $row;
                }
                return $resdata;
            }
        }

    }
}

?>