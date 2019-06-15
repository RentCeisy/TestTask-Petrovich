<?php

namespace Database;

class DBHelper {

    public $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function createTableIfNotExist()
    {
        $stm = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB::$db_table . " (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, original VARCHAR(255) NOT NULL, changed VARCHAR(30) NOT NULL)");
    }

    public function checkExistsUrl($url)
    {
        $stm = $this->db->prepare("SELECT changed FROM test WHERE original = :url;");
        $stm->execute(['url' => $url]);
        $res = $stm->fetchColumn();
        return $res;
    }

    public function createChangedLink($url, $changedLink)
    {
        $stm = $this->db->prepare("INSERT INTO " . DB::$db_table . " (original, changed) VALUES (?, ?)");
        $stm->execute([$url, $changedLink]);
        if ($stm->rowCount() > 0) {
            return ['result' => "Your new changed link is: <a href='" . $_SERVER['HTTP_ORIGIN'] . '/' . $changedLink . "'>" . $_SERVER['HTTP_ORIGIN'] . '/' . $changedLink . "</a>"];
        }
    }

    public function checkQueryString($queryString)
    {
        $stm = $this->db->prepare("SELECT original FROM test WHERE changed = :queryString");
        $stm->execute(['queryString' => $queryString]);
        $res = $stm->fetchColumn();
        return $res;
    }

}