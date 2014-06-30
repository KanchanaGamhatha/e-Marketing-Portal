<?php

class Catogory extends MY_Model {
    
        const DB_TABLE = 'Catogory';
        const DB_TABLE_PK = 'catogory_id';
    /**
     *Catogory unique identifire
     * @var int
     */
    public $catogory_id;
    /**
     *Catogory name
     * @var string
     */
    public $catogory_name;
}

