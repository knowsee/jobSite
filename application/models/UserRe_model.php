<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserRe_model extends ShareSystem_Model {
    public $tableName = 'user_recommoned';
    public $tableId = 'id';
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getJoinList($condition = array(), $order = '', $page = 0, $limit = 100) {
        $query = $this->table()->select('jobdetail.*, user_recommoned.*, companydetail.title as companyName')->join('jobdetail', 'jobdetail.jobId = user_recommoned.jobId')->join('companydetail', 'companydetail.cid = user_recommoned.companyId')->limit($limit, $page)->order_by($order)->where($condition)->get();
        return $query->result_array();
    }
    
}
