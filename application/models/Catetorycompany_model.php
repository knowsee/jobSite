<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Catetorycompany_model extends ShareSystem_Model {
    public $tableName = 'catetorycompany';
    public $tableId = 'id';
    
    public function __construct(){
        parent::__construct();
    }
}
