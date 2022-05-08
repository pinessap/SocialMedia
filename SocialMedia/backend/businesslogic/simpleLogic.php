<?php
include("db/dataHandler.php");          //include Repository Logik

class SimpleLogic                       //Business Logik entscheidet (anhand Parameter, Methode,…) wie Applikation auf Anfrage reagiert
{
    private $dh;
    function __construct()
    {
        $this->dh = new DataHandler();          //Instanz der Repository Logik wird erstellt       
    }

    function handleRequest($method, $param)         //anhand der Logik wird response Inhalt vorbereitet
    {
        switch ($method) {
            case "queryPosts":
                $res = $this->dh->queryPosts($param);
                break;
            default:
                $res = null;
                break;
        }
        return $res;
    }

}
