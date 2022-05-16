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

    public function getFriendRequests($id){
        $conn = $this->conn;

        $sql = "SELECT `fid` FROM `friends` WHERE `uid` = ? AND `accepted` = 0";
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
            else {
                return -1;
            }
        }

        foreach ($data as $fid ){
            $result = $conn->prepare("SELECT `username`, `id` FROM `users` WHERE `id` = ?");
            
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

    public function deleteFriend($data){
        $conn = $this->conn;

        $data = json_decode($data);
        $uid = $data->uid;
        $fid = $data->fid;
    
        $result = $conn->prepare("DELETE FROM `friends` WHERE `uid` = ? AND `fid` = ?");
        $result->bind_param("ii", $uid, $fid);
        $result->execute();

        $result = $conn->prepare("DELETE FROM `friends` WHERE `uid` = ? AND `fid` = ?");
        $result->bind_param("ii", $fid, $uid);
        $result->execute();
        
        return $result;
    }

    public function acceptFriend($data){
        $conn = $this->conn;

        $data = json_decode($data);
        $uid = $data->uid;
        $fid = $data->fid;

        $one = 1;
    
        $result = $conn->prepare("UPDATE `friends` SET `accepted` = 1 WHERE `uid` = ? AND `fid` = ?");
        $result->bind_param("ii", $uid, $fid);
        $result->execute();

        $result = $conn->prepare("INSERT INTO `friends` (`uid`, `fid`, `accepted`) VALUES (?, ?, ?)");
        $result->bind_param("iii", $fid, $uid, $one);
        $result->execute();
        
        return $result;
    }

    public function getFriends($id){
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
            else {
                return -1;
            }
        }

        foreach ($data as $fid ){
            $result = $conn->prepare("SELECT `username`, `id` FROM `users` WHERE `id` = ?");
            
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

    public function getUsers($uname){
        $conn = $this->conn;

        $uname = '%' . $uname . '%';
        $sql = "SELECT `id`, `username` FROM `users` WHERE `username` LIKE ?";
        if($result = $conn->prepare($sql)){
            $result->bind_param("s", $uname);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $data[] = $row;
                }
                //return $data;
            }
            else {
                return -1;
            }
        }
        return $data;
    }


    public function checkFriend($data){
        $conn = $this->conn;

        $data = json_decode($data);
        $uid = $data->uid;
        $fid = $data->fid;

        $sql = "SELECT `accepted` FROM `friends` WHERE `uid` = ? AND `fid` = ?";
        if($result = $conn->prepare($sql)){
            $result->bind_param("ii", $uid, $fid);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $res[] = $row;
                }
                //return $data;
            }
            else {
                return -1;
            }
        }
        return $res;

    }

    public function getID($uname){
        $conn = $this->conn;

        $sql = "SELECT `id` FROM `users` WHERE `username` = ?";
        if($result = $conn->prepare($sql)){
            $result->bind_param("s", $uname);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $data[] = $row;
                }
            }   
        }
        return $data;

    }

    public function sendRequest($data){
        $conn = $this->conn;

        $data = json_decode($data);
        $uid = $data->uid;
        $fid = $data->fid;

        $zero = 0;

        $sql = "SELECT * FROM `friends` WHERE `uid` = ? AND `fid` = ?";
        if($result = $conn->prepare($sql)){
            $result->bind_param("ii", $fid, $uid);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                return -1;
            } else{
                $result = $conn->prepare("INSERT INTO `friends` (`uid`, `fid`, `accepted`) VALUES (?, ?, ?)");
                $result->bind_param("iii", $fid, $uid, $zero);
                $result->execute();
                
                return $result; 
            }
        }
        
    }


    public function getProfile($id){
        $conn = $this->conn;

        /*$sql = "SELECT `users`.`salutation`, `users`.`name`, `users`.`surname`, `posts`.`caption`, `posts`.`file_path`, `posts`.`datetime`  
            FROM `users` 
            INNER JOIN `profilepic` ON `users`.`id` = `profilepic`.`user_id`
            INNER JOIN  `posts` ON `users`.`id` = `posts`.`uid`
            WHERE `users`.`id` = ?
            ORDER BY `posts`.`datetime` DESC";

        if($result = $conn->prepare($sql)){
            $result->bind_param("i", $id);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $data[] = $row;
                }
            } else{
                return -3;
            }
            return $data;
        }*/

        $sql = "SELECT `users`.`salutation`, `users`.`name`, `users`.`surname` FROM `users` WHERE `users`.`id` = ?";
        if($result = $conn->prepare($sql)){
            $result->bind_param("i", $id);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        /*$sql = "SELECT `profilepic`.`pic_path` FROM `profilepic` WHERE `profilepic`.`user_id` = ?";
        if($result = $conn->prepare($sql)){
            $result->bind_param("i", $id);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $data2[] = $row;
                }
            } else{
                $data2 = [];
            }

        }

        //$testdata[] = array_merge($data, $data2);
        //return $testdata;

        $sql = "SELECT `posts`.`caption`, `posts`.`file_path`, `posts`.`datetime` FROM `posts` WHERE `posts`.`uid` = ? ORDER BY `posts`.`datetime` DESC";
        if($result = $conn->prepare($sql)){
            $result->bind_param("i", $id);
            $result->execute();
            $stmt = $result->get_result();
            $row = $stmt->num_rows;
            if ($row > 0) {
                while ($row = $stmt->fetch_assoc()) {
                    $data3[] = $row;
                }
            } else{
                $data3 = [];
            }
            //$testdata[] = array_merge($data, $data2, $data3);
            $testdata = (object) array_merge((array) $data, (array) $data2, (array) $data3);
            return $testdata;
        
        
    }*/
}
}











?>