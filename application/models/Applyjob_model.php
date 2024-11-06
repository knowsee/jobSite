<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Applyjob_model extends ShareSystem_Model {
    public $tableName = 'applyjob';
    public $tableId = 'appId';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getJoinResume($condition = array(), $order = '', $page = 0, $limit = 100) {
        $query = $this->table()->select('*, applyjob.userId as userId')->join('resumedetail', 'resumedetail.userId = applyjob.userId', 'LEFT')->limit($limit, $page)->order_by($order)->where($condition)->get();
        return $query->result_array();
    }
    
    public function getJoinResumeCount($condition = array()) {
        return $this->table()->join('resumedetail', 'resumedetail.userId = applyjob.userId', 'LEFT')->where($condition)->count_all_results();
    }
    
    private function checkApply($jobId, $userId) {
        $isApply = $this->getOne(['userId' => $userId, 'jobId' => $jobId, 'applyTime <' => time()+60*60*24*7]);
        if($isApply) {
            return false;
        } else {
            return true;
        }
    }
    
    public function applyforInterview($jobId, $userId, $companyId, $jobName, $companyName) {
        if($this->checkApply($jobId, $userId) == false) {
            return '-1';
        }
        $this->insertApply('interview', $jobId, $userId, $companyId, $jobName, $companyName);
    }
    
    public function applyforSeeker($jobId, $userId, $companyId, $jobName, $companyName) {
        if($this->checkApply($jobId, $userId) == false) {
            return '-1';
        }
        $this->insertApply('seeker', $jobId, $userId, $companyId, $jobName, $companyName);
    }
    
    private function insertApply($appType, $jobId, $userId, $companyId, $jobName, $companyName) {
        
        $this->addData([
            'appType' => $appType,
            'applyTime' => time(),
            'companyId' => $companyId,
            'companyName' => $companyName,
            'jobId' => $jobId,
            'jobName' => $jobName,
            'userId' => $userId,
        ]);
        
    }
}
