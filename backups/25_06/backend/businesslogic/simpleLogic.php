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
            case "queryRequests":
                $res = $this->dh->queryRequests($param);
                break;
            case "deleteFriend":
                $res = $this->dh->deleteFriend($param);
                break;
            case "acceptFriend":
                $res = $this->dh->acceptFriend($param);
                break;
            case "queryFriends":
                $res = $this->dh->queryFriends($param);
                break;
            case "queryUsername":
                $res = $this->dh->queryUsername($param);
                break;
            case "checkFriend":
                $res = $this->dh->checkFriend($param);
                break;
            case "getID":
                $res = $this->dh->getID($param);
                break;
            case "sendRequest":
                $res = $this->dh->sendRequest($param);
                break;
            case "getProfile":
                $res = $this->dh->getProfile($param);
                break;
            case "queryGroups":
                $res = $this->dh->queryGroups($param);
                break;
            case "makeGroup":
                $res = $this->dh->makeGroup($param);
                break;
            case "queryMembers":
                $res = $this->dh->queryMembers($param);
                break;
            case "leaveGroup":
                $res = $this->dh->leaveGroup($param);
                break;
            case "queryGroupsOfFriend":
                $res = $this->dh->queryGroupsFr($param);
                break;
            case "addToGroup":
                $res = $this->dh->addToGroup($param);
                break;
            case "deleteProfile":
                $res = $this->dh->deleteProfile($param);
                break;
            default:
                $res = null;
                break;
        }
        return $res;
    }
}
