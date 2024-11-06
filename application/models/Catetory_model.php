<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Catetory_model extends ShareSystem_Model {
    public $tableName = 'catetory';
    public $tableId = 'cid';
    
    public function __construct(){
        parent::__construct();
    }
    
    public function cateCheck() {
        foreach($this->config->item('JobType') as $cid => $cName) {
            $this->replaceData(['cid' => $cid, 'cateName' => $cName]);
        }
    }
    
    public function add($cid) {
        $this->db->set('jobNum', 'jobNum+1', false)->where(['cid' => $cid])->update($this->tableName);
    }
    
    public function take($cid) {
        $this->db->set('jobNum', 'jobNum-1', false)->where(['cid' => $cid])->update($this->tableName);
    }
}
