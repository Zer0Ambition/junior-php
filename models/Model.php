<?php

/**
 * Base model class
 */

class Model {

    protected $db = null;

    public function __construct() {
        $this->db = DB::connectToDB();
    }

}