<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jobtag_model extends ShareSystem_Model {
    public $tableName = 'jobdetail_tag';
    public $tableId = 'id';
    
    public function __construct(){
        parent::__construct();
    }
    
}
