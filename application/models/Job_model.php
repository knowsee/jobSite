<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Job_model extends ShareSystem_Model {
    public $tableName = 'jobdetail';
    public $tableId = 'jobId';
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getJoInList($condition = array(), $order = '', $page = 0, $limit = 100) {
        $query = $this->table()->select('*, companydetail.title as companyName')->join('companydetail', 'companydetail.cid = jobdetail.companyId')->limit($limit, $page)->order_by($order)->where($condition)->get();
        return $query->result_array();
    }
    
    public function isView($jobId) {
        $this->db->set('view', 'view+1', false)->where(['jobId' => $jobId])->update($this->tableName);
    }
    
    public function isApply($jobId) {
        $this->db->set('apply', 'apply+1', false)->where(['jobId' => $jobId])->update($this->tableName);
    }
    
}
