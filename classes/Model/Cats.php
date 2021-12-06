<?php

namespace Techstore\Classes\Models;

use Techstore\Classes\DB;

class Cats extends DB{

    public function __construct()
    {
        $this->table="categories";
        $this->connect();
    }
}