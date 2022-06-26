<?php
session_start();
require '../../backend/config/db_conn.php';

$result = array();
$message = isset($_POST['message']) ? $_POST['message'] : null;
$from = isset($_POST['from']) ? $_POST['from'] : null;
$from_id = $_SESSION['id'];
//$gid = $_GET['gid'];
$gid = isset($_POST['gid']) ? $_POST['gid'] : null;

if (!empty($message) && !empty($from)) {
    $sql = "INSERT INTO `chat` (`message`, `from`, `from_id`, `gid`) VALUES ('" . $message . "', '" . $from . "', '" . $from_id . "', '" . $gid . "')";
    $result = $conn->query($sql);
}

//print messages
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$items = $conn->query("SELECT * from `chat` WHERE `id` > " . $start);

while ($row = $items->fetch_assoc()) {
    $result['items'][] = $row;
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo json_encode($result);
