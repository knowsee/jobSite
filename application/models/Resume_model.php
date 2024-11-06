<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resume_model extends ShareSystem_Model {
    public $tableName = 'resumedetail';
    public $tableId = 'rid';
    
    public function __construct(){
        parent::__construct();
    }
    
    public function foundResumeByJob($jobType, $jobProfessor, $jobAward, $jobExperience, $salary) {
		if($salary == 1) {
			return $this->table()->limit(100, 0)->order_by('updateTime DESC, jobExperience DESC')->where([
				'salary' => $salary,
				'jobExperience >=' => $jobExperience,
				'award >=' => $jobAward,
				'jobProfessor' => $jobProfessor,
				'jobCategory' => $jobType
			])->get()->result_array();
		} else {
			return $this->table()->limit(100, 0)->order_by('updateTime DESC, jobExperience DESC')->where([
				'salary' => $salary,
				'jobExperience >=' => $jobExperience,
				'award >=' => $jobAward,
				'jobProfessor' => $jobProfessor,
				'jobCategory' => $jobType
			])->or_where([
				'salary' => 1,
				'jobExperience >=' => $jobExperience,
				'award >=' => $jobAward,
				'jobProfessor' => $jobProfessor,
				'jobCategory' => $jobType
			])->get()->result_array();
		}
        
    }
    
}
