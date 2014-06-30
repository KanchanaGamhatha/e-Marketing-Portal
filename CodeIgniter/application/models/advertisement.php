<?php

class Advertisement extends MY_Model {
    
         const DB_TABLE = 'Advertisement';
         const DB_TABLE_PK = 'advertisement_id';
   
 /**
  *Advertisement unique Identifire.
  * @var int
  */    
public $advertisement_id;
/**
 *Catogory  id
 * @var int
 */
public $catogory_id;
/**
 *Advertisement title.
 * @var string
 */
public $advertisement_title;
/**
 *Advertisement description.
 * @var string
 */
public $advertisement_Description;
/**
 *Advertisement price.
 * @var float
 */
public $advertisement_Price;
/**
 *Advertisement image path.
 * @var float
 */
public $advertisement_image;
/**
 *Advertisement contact number.
 * @var int
 */
public $advertisement_phonnumber;

/**
 *Advertisement location number
 * @var int 
 */
public $advertisement_location; 
/**
 *Advertisement user_id
 * @var int 
 */
public $user_id;

/**
 *Advertisement post_date_time
 * @var datetime 
 */
public $post_date_time;
}
?>