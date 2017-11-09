<?php

class Model {

    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $this->log = new Logging();
        $this->log->lfile('/Users/satria/Sites/mymvc/model'.date('[d/M/Y]').'.txt');
    }

}