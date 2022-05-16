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


}
