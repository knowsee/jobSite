<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends ShareSystem_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Catetory_model', 'Company_model', 'Job_model', 'Jobtag_model', 'Applyjob_model', 'Admin_model', 'Resume_model'));
        $this->actionLink['controllerName'] = 'Index';
    }

    public function printResume() {
        $resumeInfo = $this->Resume_model->getOne(['userId' => $this->input->get('userId')]);
        $resumeInfo->resumeJson = json_decode($resumeInfo->resumeJson, true);
        $resumeInfo->skillJson = json_decode($resumeInfo->skillJson, true);
        $this->load->view('singelresume', [
            'resume' => $resumeInfo
        ]);
    }
	
	public function searchName() {
		$search = $this->input->get('query');
		$list = $this->Job_model->table()->or_like('jobTitle', $search)->limit(20, 0)->get()->result_array();
		foreach($list as $name) {
			$nameList[]['value'] = $name['jobTitle'];
		}
		echo json_encode($nameList);
		exit;
	}
	
	public function updateToken() {
		if (!empty($this->userInfo->userId)) {
			$p = $this->input->post();
			$this->Admin_model->updateById(['userClientToken' => $p['channel']], $this->userInfo->userId);
		}
	}

    public function companyDetail() {
        $cid = intval($this->input->get('cid'));
        $company = $this->Company_model->getOneById($cid);
        if (empty($company)) {
            showMessage(lang('company_not_found'), 'Index/index');
        }
        $jobList = $this->Job_model->getList(['companyId' => $cid], 'view Desc', 0, 12);
		$judgeList = $this->Applyjob_model->getList(['companyId' => $cid, 'employeeMessage !=' => ''], 'applyTime Desc', 0, 15);
        $this->load->view('company_detail', [
            'company' => $company,
            'jobList' => $jobList,
			'judgeList' => $judgeList
        ]);
    }

    public function like() {
        $cid = intval($this->input->post('cid'));
        $this->Company_model->like($cid);
        $company = $this->Company_model->getOneById($cid);
        $this->sendAjaxMsg(['like' => $company->userLike], lang('like_message'));
    }

    public function notification() {
        $today = strtotime(date('Y-m-d', time()));
        $lastThreeDay = strtotime('+5 day');
        if ($this->userInfo->userType == 1) {
            $userType = 'user';
            $notificationList = $this->Applyjob_model->getJoinResume(['applyjob.userId' => $this->userInfo->userId, 'applyjob.applyStatus' => 2, 'applyjob.applyInterviewTime >' => $today, 'applyjob.applyInterviewTime <' => $lastThreeDay]);
        } else {
            $userType = 'company';
            $notificationList = $this->Applyjob_model->getJoinResume(['applyjob.companyId' => $this->userInfo->companyId, 'applyjob.applyStatus' => 2, 'applyjob.applyInterviewTime >' => $today, 'applyjob.applyInterviewTime <' => $lastThreeDay]);
        }
        $this->load->view('notifications', [
            'userType' => $userType,
            'notificationList' => $notificationList
        ]);
    }

    public function member() {
        $post = $this->input->post();
        if ($this->input->method() == 'get') {
            $this->actionLink['jsTemplate'] = 'form';
            $this->load->view('member', [
                'userType' => $this->userInfo->userType == 1 ? 'user' : 'company',
            ]);
        } else {
            if (empty($post['oldpass']) || empty($post['newpass'])) {
                $this->formErrorAjax(lang('user_edit_password'));
            }
            $newpasswordHash = $this->Admin_model->editPassword($this->userInfo->userId, $post['oldpass'], $post['newpass']);
            if ($newpasswordHash == -1) {
                $this->formErrorAjax(lang('user_edit_check_password'));
            }
            set_cookie(COOKIES_LOGIN, $this->encryption->encrypt(implode(',', ['userName' => $this->userInfo->userName, 'userId' => $this->userInfo->userId, 'password' => $newpasswordHash])), 86400);
            $this->sendMessage('', lang('user_edit_success'));
        }
    }

    public function firstLoad() {
        $this->Catetory_model->cateCheck();
    }

    public function applyJob() {
        $jobId = intval($this->input->post('jobId'));
        if (empty($this->userInfo->userId)) {
            $applyMessage = lang('apply_message_no_login');
            $this->errorMessage($applyMessage);
        }
        $resume = $this->Resume_model->getOne(['userId' => $this->userInfo->userId]);
        if (empty($resume)) {
            $applyMessage = lang('apply_message_no_resume');
            $this->errorMessage($applyMessage);
        }
        $Job = $this->Job_model->getOne(['jobId' => $jobId]);
        $Company = $this->Company_model->getOne(['cid' => $Job->companyId]);
        $ApplyStatus = $this->Applyjob_model->applyforSeeker($jobId, $this->userInfo->userId, $Job->companyId, $Job->jobTitle, $Company->title);
        if ($ApplyStatus == '-1') {
            $applyMessage = lang('apply_message_isapply');
            $this->errorMessage($applyMessage);
        } else {
            $applyMessage = lang('apply_message_ok');
            $this->Job_model->isApply($jobId);
			$companyUser = $this->Admin_model->getOne(['userId' => $Company->userId]);
			if($companyUser->userClientToken) {
				sendJsMsg($companyUser->userClientToken, $resume->realName . ' Applied for '.$Job->jobTitle.' , please come to check');
				$email = new \SendGrid\Mail\Mail(); 
				$email->setFrom("magiclook@outlook.com", "Acghx job site");
				$email->setSubject($resume->realName.' Applied for '.$Job->jobTitle.' , please come to check');
				$email->addTo($companyUser->userEmail, $companyUser->userName);
				$email->addContent(
					"text/html", $companyUser->userName.":<br>".$resume->realName.' Applied for '.$Job->jobTitle.' , please come to check[<a href="https://fyp.ckc.im/index.php/ManagerCompany/applylist">Manage applications</a>]'
				);
				$sendgrid = new \SendGrid('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');
				$sendgrid->send($email);
			}
            $this->sendMessage('', $applyMessage);
        }
    }
	
	public function rest() {
		$user = $this->Admin_model->getOne(['userEmail' => $this->input->post('email')]);
		
		if($user) {
			$newpass = mt_rand(10000,99999);
			$email = new \SendGrid\Mail\Mail();
			$email->setFrom("magiclook@outlook.com", "Acghx job site");
			$email->setSubject('Rest the password');
			$email->addTo($this->input->post('email'), $user->userName);
			$email->addContent(
				"text/html", 'This is rest mail, your password is update. The new password is '. $newpass
			);
			$sendgrid = new \SendGrid('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');
			$sendgrid->send($email);
			$this->Admin_model->updateById(['userPassword' => md5($newpass)], $user->userId);
		}
		
		$this->sendAjaxMsg();
		
	}

    public function index() {

        $hotlist = $this->Job_model->getJoInList([], 'jobdetail.apply Desc, jobdetail.view Desc', 0, 10);
        $newlist = $this->Job_model->getJoInList([], 'jobdetail.jobId Desc', 0, 10);
        $t = array();
        $t['resume'] = $this->Resume_model->table()->count_all_results();
        $t['job'] = $this->Job_model->table()->count_all_results();
        $t['company'] = $this->Company_model->table()->count_all_results();
        $t['user'] = $this->Admin_model->table()->count_all_results();

        $Catetory = $this->Catetory_model->getList();

        $this->load->view('index', [
            'hotlist' => $hotlist,
            'newlist' => $newlist,
            'catetory' => $Catetory,
            'total' => $t
        ]);
    }
	
	public function cate() {
        $t = array();
        $t['resume'] = $this->Resume_model->table()->count_all_results();
        $t['job'] = $this->Job_model->table()->count_all_results();
        $t['company'] = $this->Company_model->table()->count_all_results();
        $t['user'] = $this->Admin_model->table()->count_all_results();

        $Catetory = $this->Catetory_model->getList();

        $this->load->view('cate', [
            'catetory' => $Catetory,
            'total' => $t
        ]);
    }

    public function post() {
        $this->actionLink['jsTemplate'] = 'form';
        $this->load->view('post');
    }

    public function search() {
        $post = $this->input->post();
        if (empty($post)) {
            $post = $this->input->get();
        }
        $where = array();
        if ($post['salary'] > 0) {
            $where['jobdetail.salary'] = $post['salary'];
        }
        if ($post['jobaward'] > 0) {
            $where['jobdetail.jobAward'] = $post['jobaward'];
        }
        if ($post['location'] > 0) {
            $where['jobdetail.jobLocation'] = $post['location'];
        }
        if ($post['jobtype'] > 0) {
            $where['jobdetail.jobType'] = $post['jobtype'];
        }
        if ($post['simple'] == 1 || empty($post['searchTitle'])) {
            $query = $this->Job_model->table()
                    ->select('*, companydetail.title as companyName')
                    ->join('companydetail', 'companydetail.cid = jobdetail.companyId')
                    ->where($where);
        } else {
            $query = $this->Job_model->table()->where($where)
					->like('jobdetail.jobTitle', $post['searchTitle'])
                    ->or_like('jobdetail.jobTags', $post['searchTitle'])
                    ->or_like('companydetail.title', $post['searchTitle'])
                    ->select('*, companydetail.title as companyName')
                    ->join('companydetail', 'companydetail.cid = jobdetail.companyId');
        }

        $jobNum = $query->count_all_results('', false);
        $this->load->view('search', [
            'searchList' => $query->order_by('companydetail.userLike DESC,jobdetail.view DESC')->limit(20, 0)->get()->result_array(),
            'jobNum' => $jobNum,
            'searchValue' => $post
        ]);
    }

    public function login() {
        if ($this->form_validation->run('login') == true) {
            $post = $this->input->post();
            $this->load->model('admin_model');
            $userCheck = $this->admin_model->loginByUser($post['userName'], $post['password']);
            if ($userCheck !== false) {
                set_cookie(COOKIES_LOGIN, $this->encryption->encrypt(implode(',', ['userName' => $userCheck->userName, 'userId' => $userCheck->userId, 'password' => $userCheck->userPassword]
                        )), 86400);
                if (intval($userCheck->userType) == 1) {
                    $uri = 'Seeker/resume';
                } else {
                    $uri = 'ManagerCompany/edit';
                }
                $this->sendAjaxMsg(['userName' => $userCheck->userName, 'uri' => site_url($uri)]);
            } else {
                $this->formErrorAjax(lang('user_login_password_error'));
            }
        } elseif ($this->form_validation->error_array()) {
            $this->formErrorAjax();
        } else {
            $this->load->view('login');
        }
    }
	
	public function reghtml() {
		$this->load->view('reg');
	}

    public function reg() {
        $this->form_validation->set_message('in_list', 'What is your role, Applicant or Interviewer ?');
        if ($this->form_validation->run('reg') == true) {
            $post = $this->input->post();
            $this->load->model('admin_model');
            $check = $this->admin_model->checkUser($post['userName'], $post['userEmail']);
            if ($check == true) {
                $this->admin_model->regUser($post['userName'], $post['password'], $post['userEmail'], intval($post['userType']));
                $userCheck = $this->admin_model->loginByUser($post['userName'], $post['password']);
                set_cookie(COOKIES_LOGIN, $this->encryption->encrypt(implode(',', ['userName' => $userCheck->userName, 'userId' => $userCheck->userId, 'password' => $userCheck->userPassword]
                        )), 86400);
                if (intval($post['userType']) == 1) {
                    $uri = 'Seeker/resume';
                } else {
                    $uri = 'ManagerCompany/edit';
                }
				$email = new \SendGrid\Mail\Mail(); 
				$email->setFrom("magiclook@outlook.com", "Acghx job site");
				$email->setSubject("Reg success! Welcome to job");
				$email->addTo($post['userEmail'], $post['userName']);
				$email->addContent(
					"text/html", $post['userName'].":<br><strong>【".$post['password']."】This is your password, plz remember!</strong>"
				);
				$sendgrid = new \SendGrid('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');
				$sendgrid->send($email);
                $this->sendAjaxMsg(['userName' => $userCheck->userName. ', We are send mail to your reg email', 'uri' => site_url($uri)]);
            } else {
                $this->formErrorAjax(lang('user_reg_same_email_username'));
            }
        } elseif ($this->form_validation->error_array()) {
            $this->formErrorAjax();
        } else {
            $this->load->view('login');
        }
    }

    public function logout() {
        delete_cookie(COOKIES_LOGIN);
        showMessage(lang('user_logout'), 'Index/index');
    }

    public function jobdetail() {

        $get = $this->input->get();
        $jobId = intval($get['jobId']);

        $Job = $this->Job_model->getOne(['jobId' => $jobId]);
        $Company = $this->Company_model->getOne(['cid' => $Job->companyId]);
        $CompanyJobs = $this->Job_model->getList(['companyId' => $Job->companyId], 'view Desc', 0, 5);
		
		
		
        $this->Job_model->isView($jobId);
        $this->load->view('jobdetail', [
            'job' => $Job,
            'company' => $Company,
            'cJobs' => $CompanyJobs
        ]);
    }

}
