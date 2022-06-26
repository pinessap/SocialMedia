<?php

require "db.php";

class DataHandler                                   //normalerweise auf DB zugegegriffen
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function queryPosts($id)
    {
        $res =  $this->db->getPosts($id);
        return $res;
    }

    public function queryRequests($id)
    {
        $res =  $this->db->getFriendRequests($id);
        return $res;
    }

    public function deleteFriend($data)
    {
        $res =  $this->db->deleteFriend($data);
        return $res;
    }

    public function acceptFriend($data)
    {
        $res =  $this->db->acceptFriend($data);
        return $res;
    }

    public function queryFriends($data)
    {
        $res =  $this->db->getFriends($data);
        return $res;
    }

    public function queryUsername($uname)
    {
        $res =  $this->db->getUsers($uname);
        return $res;
    }

    public function checkFriend($data)
    {
        $res =  $this->db->checkFriend($data);
        return $res;
    }

    public function getID($uname)
    {
        $res =  $this->db->getID($uname);
        return $res;
    }

    public function sendRequest($data)
    {
        $res =  $this->db->sendRequest($data);
        return $res;
    }

    public function getProfile($id)
    {
        $res =  $this->db->getProfile($id);
        return $res;
    }

    public function queryGroups($id)
    {
        $res =  $this->db->getGroups($id);
        return $res;
    }

    public function makeGroup($data)
    {
        $res =  $this->db->makeGroup($data);
        return $res;
    }

    public function queryMembers($id)
    {
        $res =  $this->db->getMembers($id);
        return $res;
    }

    public function leaveGroup($data)
    {
        $res =  $this->db->leaveGroup($data);
        return $res;
    }

    public function queryGroupsFr($data)
    {
        $res =  $this->db->getGroupsFr($data);
        return $res;
    }

    public function addToGroup($data)
    {
        $res =  $this->db->addToGroup($data);
        return $res;
    }

    public function deleteProfile($id)
    {
        $res =  $this->db->deleteProfile($id);
        return $res;
    }
}
