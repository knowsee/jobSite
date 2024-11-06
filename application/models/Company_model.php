<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company_model extends ShareSystem_Model {
    public $tableName = 'companydetail';
    public $tableId = 'cid';
    
    public function __construct(){
        parent::__construct();
    }
    
    public function like($cid) {
        $this->db->set('userLike', 'userLike+1', false)->where(['cid' => $cid])->update($this->tableName);
    }
}
