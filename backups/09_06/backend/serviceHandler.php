<?php
include("businesslogic/simpleLogic.php");

$param = "";        
$method = "";

$uid = "";
$fid = "";


isset($_GET["method"]) ? $method = $_GET["method"] : false;     //request parameter werden geprüft, Übermitteln der Daten an das Service Handling welches den Response durchführt
isset($_GET["param"]) ? $param = $_GET["param"] : false;

isset($_POST["method"]) ? $method = $_POST["method"] : false;
isset($_POST["param"]) ? $param = $_POST["param"] : false;



$logic = new SimpleLogic();                                     //logik wird aufgerufen
if (isset($_GET["method"])) {
    $result = $logic->handleRequest($method, $param);
    if ($result == null) {                                          //response wird versendet
        response("GET", 400, null);
    } else {
        response("GET", 200, $result);
    }
} else if (isset($_POST['method'])) {
    $logic->handleRequest($method, $param); 
    if ($result == null) {                                          //response wird versendet
        response("GET", 400, null);
    } else {
        response("GET", 200, $result);
    }
}


function response($method, $httpStatus, $data)
{
    header('Content-Type: application/json');    //sends raw HTTP header to client, specifies the header string to send; indicates the media type of the resource
    switch ($method) {
        case "GET":
            http_response_code($httpStatus);    //sets http response status, http Status Code z.B: 200 = ok, 404 = not found,…
            echo (json_encode($data));          //Json_encode() erstellt/formatiert ein Objekt Im JSON Format -> umgekehrt: Json_decode() 
            break;                              //Mittels echo() Methode wird dieResponse zum Client geschickt
        case "POST":
            http_response_code($httpStatus);
            echo (json_encode($data));
            break;
        default:
            http_response_code(405);
            echo ("Method not supported yet!");
    }
}

