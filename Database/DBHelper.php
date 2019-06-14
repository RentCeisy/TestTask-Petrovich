<?php

namespace Database;

class DBHelper {

    public $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }


}