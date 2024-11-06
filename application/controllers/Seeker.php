<?php

use Dompdf\Dompdf;

defined('BASEPATH') OR exit('No direct script access allowed');

class Seeker extends ShareSystem_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->setTemplateDir('seeker');
        $this->load->model(array('Resume_model', 'Applyjob_model', 'Job_model', 'UserRe_model'));
        $this->actionLink['controllerName'] = 'Seeker';
    }

    public function index() {
        $resume = $this->Resume_model->getOne(['userId' => $this->userInfo->userId]);
		
		$jobRdList = $this->Job_model->getJoInList([
			'jobdetail.jobType' => $resume->jobCategory,
			'jobdetail.jobAward' => $resume->award
		], 'jobdetail.apply Desc, jobdetail.view Desc', 0, 10);
		
		
        $this->load->view('index', [
            'resume' => $resume,
			'reList' => $jobRdList
        ]);
    }

    public function recommended() {
		$resume = $this->Resume_model->getOne(['userId' => $this->userInfo->userId]);
		
        $jobRdList = $this->Job_model->getJoInList([
			'jobdetail.jobType' => $resume->jobCategory,
			'jobdetail.jobAward' => $resume->award
		], 'jobdetail.apply Desc, jobdetail.view Desc', 0, 10);
		
        $this->load->view('alert', [
            'jobList' => $jobRdList
        ]);
    }
	
	public function judge() {
		$post = $this->input->get();
        $appId = $post['appId'];
		$applyInfo = $this->Applyjob_model->getOne(['appId' => $appId]);
		$this->load->view('judge', [
            'applyInfo' => $applyInfo
        ]);
	}
	
	public function postJudge() {
		$post = $this->input->post();
		
		$this->Applyjob_model->updateById(['employeeMessage' => $post['employeeMessage']], intval($this->input->post('appId')));
		$this->sendAjaxMsg();
	}

    public function alert() {
		
		$list = $this->UserRe_model->getJoinList(['user_recommoned.userId' => $this->userInfo->userId]);
		
		
		
		
        $this->load->view('recommended', [
            'jobList' => $list,
        ]);
    }

    public function resumeView() {
        $resumeInfo = $this->Resume_model->getOne(['userId' => $this->userInfo->userId]);
        $resumeInfo->resumeJson = json_decode($resumeInfo->resumeJson, true);
        $resumeInfo->skillJson = json_decode($resumeInfo->skillJson, true);

        $this->load->view('resumeview', [
            'resume' => $resumeInfo
        ]);
    }

    public function downResume() {
        $jsonString = file_get_contents('http://sg.acghx.net:3000/get?pdfUrl='.site_url('Index/printResume').'/?userId='.$this->userInfo->userId.'&pdfName='.md5($this->userInfo->userId));
        $json = json_decode($jsonString, true);
        $viewFile = file_get_contents($json['file']);
        $resumeInfo = $this->Resume_model->getOne(['userId' => $this->userInfo->userId]);
        header('Accept-Ranges: bytes');
        header('Accept-Length: ' . strlen($viewFile));
        header('Content-Transfer-Encoding: binary');
        header('Content-type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $resumeInfo->realName . '.pdf"');
        header('Content-Type: application/octet-stream; name="' . $resumeInfo->realName . '.pdf"');
        echo $viewFile;
        exit;
    }

    public function resume() {
        $resumeInfo = $this->Resume_model->getOne(['userId' => $this->userInfo->userId]);

        if ($this->form_validation->run('resume') == true) {
            $post = $this->input->post();
            $resume = array();
            $resume['realName'] = $post['realName'];
            $resume['email'] = $post['email'];
            $resume['phone'] = $post['phone'];
            $resume['birthday'] = strtotime($post['birthday']);
            $resume['award'] = $post['award'];
            $resume['jobLocation'] = $post['jobLocation'];
            $resume['jobCategory'] = $post['jobCategory'];
            $resume['jobProfessor'] = $post['jobProfessor'];
            $resume['salary'] = $post['salary'];
            $resume['updateTime'] = time();
            $resumeJson = array();
            foreach ($post['edu'] as $k => $edu) {
                $resumeJson['edu'][] = array(
                    'award' => $edu['Award'],
                    'fieldname' => $edu['FieldName'],
                    'school' => $edu['School'],
                    'from' => $edu['From'],
                    'end' => $edu['End']
                );
            }
            $wdExperience = 0;
            foreach ($post['wd'] as $k => $wd) {
                $wd['From'] = intval($wd['From']);
                $wd['End'] = intval($wd['End']);
                if ($wd['From'] > $wd['End']) {
                    $this->formErrorAjax('Work From Year bigger than End');
                }
                $wdExperience = $wdExperience + (($wd['End'] - $wd['From']) < 0.5 ? 0.5 : 1);
                $resumeJson['wd'][] = array(
                    'type' => $wd['jobType'],
                    'company' => $wd['Name'],
                    'from' => $wd['From'],
                    'end' => $wd['End'],
                    'desc' => $wd['Description']
                );
            }
			$sklArray = array();
			foreach($post['skill'] as $key => $skl) {
				if($skl['name']) {
					$sklArray[$key] = $skl;
				}
			}
            $resume['jobExperience'] = $wdExperience;
            $resume['skillJson'] = json_encode($sklArray);
            $resume['resumeJson'] = json_encode($resumeJson);
            $upConfig = array();
            $upConfig['allowed_types'] = 'gif|jpg|png|pdf|zip|rar';
            $this->load->library('upload', $upConfig);
            if ($this->upload->do_upload('coverFile')) {
                $uTemp = $this->upload->data();
                if (!empty($uTemp['file_name'])) {
                    $resume['coverFile'] = $uTemp['file_name'];
                } else {
                    $resume['coverFile'] = $resumeInfo->coverFile;
                }
            }

            $this->Resume_model->updateByWhere($resume, ['userId' => $this->userInfo->userId]);
            $this->sendAjaxMsg(['message' => 'Update Success', 'uri' => site_url('Seeker/resume')]);
        } elseif ($this->form_validation->error_array()) {
            $this->formErrorAjax();
        } else {
            $this->actionLink['jsTemplate'] = 'form';
            $resumeInfo->resumeJson = json_decode($resumeInfo->resumeJson, true);
            $resumeInfo->skillJson = json_decode($resumeInfo->skillJson, true);
            $this->load->view('resume', [
                'resume' => $resumeInfo
            ]);
        }
    }

    public function apply() {
        $applyList = $this->Applyjob_model->getList(['userId' => $this->userInfo->userId], 'applyStatus ASC, appId DESC');
        $statusName = [0 => lang('apply_status_0'), 1 => lang('apply_status_1'), 2 => lang('apply_status_2'), 3 => lang('apply_status_3'), 5 => lang('apply_status_5')];
        $this->load->view('apply', [
            'applyList' => $applyList,
            'statusName' => $statusName
        ]);
    }

}
