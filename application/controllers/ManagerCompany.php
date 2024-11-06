<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerCompany extends ShareSystem_Controller {

    public $companyInfo = array();

    public function __construct() {
        parent::__construct();
        $this->load->setTemplateDir('company');
        $this->load->model(array('Catetory_model', 'Company_model', 'Job_model', 'Jobtag_model', 'Applyjob_model', 'Resume_model', 'UserRe_model', 'Admin_model'));
        $this->actionLink['controllerName'] = 'Manager';
    }

    public function findresume() {
        $jobId = intval($this->input->get('jobId'));
        $jobInfo = $this->Job_model->getOne(['jobId' => $jobId]);
        $tagBase = explode(',', $jobInfo->jobTags);
        $commendList = $this->Resume_model->foundResumeByJob($jobInfo->jobType, $jobInfo->jobProfessor, $jobInfo->jobAward, $jobInfo->experience, $jobInfo->salary);
        $nCommendList = array();
        $resumeCommendList = array();
        foreach ($commendList as $resume) {
            $tagResume = json_decode($resume['skillJson'], true);
            foreach ($tagResume as $tag) {
                if (in_array($tag['name'], $tagBase)) {
                    $resumeCommendList[$resume['rid']] = intval($resumeCommendList[$resume['rid']]) + $tag['value'];
                }
            }
            $nCommendList[$resume['rid']] = $resume;
        }
        asort($resumeCommendList);
        foreach ($resumeCommendList as $rid => $px) {
            $resume = $nCommendList[$rid];
            unset($nCommendList[$rid]);
            array_unshift($nCommendList, $resume);
        }
        $this->load->view('findresume', [
            'jobInfo' => $jobInfo,
            'reCommend' => $nCommendList
        ]);
    }
    
    public function sendRecommend() {
        $rid = intval($this->input->post('rid'));
        $resumeInfo = $this->Resume_model->getOne(['rid' => $rid]);
        $this->UserRe_model->addData([
            'companyId' => $this->userInfo->companyId,
            'userId' => $resumeInfo->userId,
            'jobId' => intval($this->input->post('jobId'))
        ]);
        $this->sendAjaxMsg([], lang('hr_recommend_ok'));
    }

    public function manageApply() {
        $post = $this->input->post();
        if (empty($post)) {
            $post = $this->input->get();
        }
        $appId = $post['appid'];
        $applyInfo = $this->Applyjob_model->getOne(['appId' => $appId]);
        $resumeInfo = $this->Resume_model->getOne(['userId' => $applyInfo->userId]);
        $optionStatus = $post['optionStatus'];
        if ($optionStatus == 2 || $optionStatus == 5) {
            $this->load->view('applyManager', [
                'applyInfo' => $applyInfo,
                'resumeInfo' => $resumeInfo,
                'optionStatus' => $optionStatus
            ]);
        } else {
            $this->Applyjob_model->updateById(['applyStatus' => 3], intval($this->input->post('appId')));
            $this->sendAjaxMsg(['uri' => site_url('ManagerCompany/applylist')]);
        }
    }

    public function postApply() {
        $post = $this->input->post();
        if ($post['optionStatus'] == '5') {
            $data = array('applyStatus' => 5, 'evaluateMessage' => $post['evaluateMessage'], 'evaluateOntime' => intval($post['evaluateOntime']));
            $this->Applyjob_model->updateByWhere($data, ['appId' => intval($post['appId'])]);
        } else {
            if (strtotime($post['interviewdate']) < 1) {
                $this->errorMessage('interview date is not a datetime');
            }
            $data = array('applyStatus' => 2, 'applyInterviewTime' => strtotime($post['interviewdate']));
            $this->Applyjob_model->updateByWhere($data, ['appId' => intval($post['appId'])]);
			
			$applyUser = $this->Applyjob_model->getOne(['appId' => intval($post['appId'])]);
			$applyUserInfo = $this->Admin_model->getOne(['userId' => $applyUser->userId]);
			if($applyUserInfo->userClientToken) {
				sendJsMsg($applyUserInfo->userClientToken, $applyUser->companyName . ' is agree you apply '.$applyUser->jobName.' , the interview time is '. $post['interviewdate']);
			}
        }
        $this->sendAjaxMsg(['uri' => site_url('ManagerCompany/applylist')]);
    }

    public function postJob() {
        $this->companyInfo = $this->Company_model->getOne(['userId' => $this->userInfo->userId]);
        if ($this->form_validation->run('jobs') == true) {
            $post = $this->input->post();
            $job['jobTitle'] = $post['jobTitle'];
            $job['jobType'] = $post['jobType'];
            $job['jobLocation'] = $post['jobLocation'];
            $job['jobAward'] = $post['jobAward'];
            $job['jobProfessor'] = $post['jobProfessor'];
            $job['jobTags'] = $post['jobTags'];
            $job['jobDescription'] = $post['jobDescription'];
            $job['endDay'] = strtotime($post['endDay']);
            $job['endDay'] = $job['endDay'] < 1 ? time() + 30 * 24 * 60 * 60 : $job['endDay'];
            $job['salary'] = $post['salary'];
            $job['experience'] = $post['experience'];
            $job['companyId'] = $this->companyInfo->cid;
            $job['createtime'] = mdate('%y-%m-%d', time());
            $jobId = $this->Job_model->addData($job);
            $job['jobTags'] = str_replace('，', ',', $job['jobTags']);
            $jobTags = array_filter(explode(',', $job['jobTags']));
            foreach ($jobTags as $tags) {
                $this->Jobtag_model->addData(['jobId' => $jobId, 'value' => $tags, 'type' => 'info']);
            }
            $this->Catetory_model->add($post['jobType']);
            $this->sendAjaxMsg(['message' => 'Update Success', 'uri' => site_url('ManagerCompany/joblist')]);
        } elseif ($this->form_validation->error_array()) {
            $this->formErrorAjax();
        } else {
            $this->actionLink['jsTemplate'] = 'form';
            $this->load->view('postjob', [
                'jobs' => [],
            ]);
        }
    }

    public function editJob() {
        $this->companyInfo = $this->Company_model->getOne(['userId' => $this->userInfo->userId]);
        $get = $this->input->get();
        $post = $this->input->post();
        $jobId = intval($get['jobId']) ? intval($get['jobId']) : $post['jobId'];
        $this->jobInfo = $this->Job_model->getOne(['jobId' => $jobId]);
        if ($this->form_validation->run('jobs') == true) {
            $post = $this->input->post();
            $job['jobTitle'] = $post['jobTitle'];
            $job['jobType'] = $post['jobType'];
            $job['jobLocation'] = $post['jobLocation'];
            $job['jobAward'] = $post['jobAward'];
            $job['jobProfessor'] = $post['jobProfessor'];
            $job['jobTags'] = $post['jobTags'];
            $job['jobDescription'] = $post['jobDescription'];
            $job['endDay'] = strtotime($post['endDay']);
            $job['salary'] = $post['salary'];
            $job['experience'] = $post['experience'];
            $job['companyId'] = $this->companyInfo->cid;
            $this->Job_model->updateById($job, $post['jobId']);
            $job['jobTags'] = str_replace('，', ',', $job['jobTags']);
            $jobTags = array_filter(explode(',', $job['jobTags']));
            $this->Jobtag_model->deleteByWhere(['jobId' => $post['jobId']]);
            foreach ($jobTags as $tags) {
                $this->Jobtag_model->addData(['jobId' => $post['jobId'], 'value' => $tags, 'type' => 'info']);
            }
            if ($this->jobInfo->jobType !== $job['jobType']) {
                $this->Catetory_model->add($post['jobType']);
                $this->Catetory_model->take($this->jobInfo->jobType);
            }
            $this->sendAjaxMsg(['message' => 'Update Success', 'uri' => site_url('ManagerCompany/joblist')]);
        } elseif ($this->form_validation->error_array()) {
            $this->formErrorAjax();
        } else {
            $this->actionLink['jsTemplate'] = 'form';
            $this->load->view('postjob', [
                'jobs' => $this->jobInfo,
            ]);
        }
    }

    public function edit() {
        $this->companyInfo = $this->Company_model->getOne(['userId' => $this->userInfo->userId]);
        if ($this->form_validation->run('company') == true) {
            $post = $this->input->post();
            $this->load->library('upload');
            $company = array();
            if (!$this->upload->do_upload('companyLogo') && empty($this->companyInfo->logo)) {
                $this->formErrorAjax($this->upload->display_errors('', ''));
            } else {
                $uTemp = $this->upload->data();
                if (!empty($uTemp['file_name'])) {
                    $company['logo'] = $uTemp['file_name'];
                } else {
                    $company['logo'] = $this->companyInfo->logo;
                }
            }
			if ($this->upload->do_upload('identificationImg')) {
                $uTemp = $this->upload->data();
                if (!empty($uTemp['file_name'])) {
                    $company['identificationImg'] = $uTemp['file_name'];
                } else {
                    $company['identificationImg'] = $this->companyInfo->identificationImg;
                }
				$company['identification'] = 0;
            }
			
            $company['title'] = $post['title'];
            $company['type'] = $post['type'];
            $company['people'] = $post['people'];
            $company['description'] = $post['description'];
            $company['website'] = $post['website'];
            $company['location'] = $post['location'];
            $company['address'] = $post['address'];
			$company['identificationImg'] = $post['identificationImg'];
            $company['userId'] = $this->userInfo->userId;
            $this->Company_model->updateByWhere($company, ['userId' => $this->userInfo->userId]);

            $this->sendAjaxMsg(['message' => 'Update Success', 'uri' => site_url('ManagerCompany/edit')]);
        } elseif ($this->form_validation->error_array()) {
            $this->formErrorAjax();
        } else {
            $this->actionLink['jsTemplate'] = 'form';
            $this->load->view('edit', [
                'companyInfo' => $this->companyInfo
            ]);
        }
    }

    public function joblist() {
        $this->companyInfo = $this->Company_model->getOne(['userId' => $this->userInfo->userId]);
        $list = $this->Job_model->getList(['companyId' => $this->companyInfo->cid]);

        $this->load->view('jobs', [
            'list' => $list
        ]);
    }

    public function applylist() {
        $applyList = $this->Applyjob_model->getJoinResume(['applyjob.companyId' => $this->userInfo->companyId], 'applyjob.applyStatus ASC, applyjob.appId DESC');
        $statusName = [0 => lang('apply_status_0'), 1 => lang('apply_status_1'), 2 => lang('apply_status_2'), 3 => lang('apply_status_3'), 5 => lang('apply_status_5')];
        $this->load->view('apply', [
            'applyList' => $applyList,
            'statusName' => $statusName
        ]);
    }

    public function resumeView() {
        $resumeId = $this->input->get('resumeId');
        $resumeInfo = $this->Resume_model->getOne(['rid' => $resumeId]);
        $resumeInfo->resumeJson = json_decode($resumeInfo->resumeJson, true);
        $resumeInfo->skillJson = json_decode($resumeInfo->skillJson, true);
        $this->Applyjob_model->updateByWhere(['applyStatus' => 1], ['appId' => intval($this->input->get('appId')), 'applyStatus' => 0]);
        $jobApply = $this->Applyjob_model->getList(['userId' => $resumeInfo->userId, 'applyStatus' => 5], 'applyInterviewTime DESC', 0, 10);

        $this->load->view('resumeview', [
            'resume' => $resumeInfo,
            'applyList' => $jobApply
        ]);
    }

}
