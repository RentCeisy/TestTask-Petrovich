<?php

use Database\DB;

require_once 'Database/DB.php';
require_once 'Database/DBHelper.php';
$url = $_POST['url'];

if(isset($url) && !empty($url)) {
    create_url($url);
}

function create_url($url) {
    if(false !== strpos($url,'http://') || false !== strpos($url, 'https://')) {
        $db = new Database\DBHelper();
    try {
        $db->db->query('"CREATE TABLE IF NOT EXISTS ' . DB::$db_name . ' (
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            OriginalLink VARCHAR(255) NOT NULL,
            ChangedLink VARCHAR(30) NOT NULL;"'
        );
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    }
}