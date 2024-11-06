<?php

class Authority {

    private $core;
    private $action = array();

    public function __construct() {
        $this->core = &get_instance();
		$this->core->load->model(['catetory_model', 'catetorycompany_model']);
		$list = $this->core->catetory_model->getList();
		foreach($list as $cate) {
			$cateList[$cate['cid']] = $cate['cateName'];
		}
		$list = $this->core->catetorycompany_model->getList();
		foreach($list as $cateC) {
			$cateCompanyList[$cateC['id']] = $cateC['name'];
		}
		$this->core->config->set_item('JobType', $cateList);
		$this->core->config->set_item('Ctype', $cateCompanyList);
    }

    public function Load() {
        $this->setGuess();
        $this->authCheck();
    }

    private function authCheck() {
        $this->checkUserLogin();
        return true;
    }

    private function setGuess() {
        $this->action = array(
            'M' => ucfirst(getDirName()),
            'C' => ucfirst(getControlName()),
            'A' => ucfirst(getMethodName())
        );
        $this->core->userInfo->userName = '未登录';
        $this->core->userInfo->userId = $this->core->userInfo->dealer_city = $this->core->userInfo->shopId = 0;
    }

    private function checkUserLogin() {
        $cookUser = $this->core->encryption->decrypt(get_cookie(COOKIES_LOGIN));
        list($userName, $userId, $userPassword) = explode(',', $cookUser);
        if ($userId) {
            $this->core->load->model('admin_model');
            $userInfo = $this->core->admin_model->getOneById($userId);
            if ($userPassword == $userInfo->userPassword) {

                $today = strtotime(date('Y-m-d', time()));
                $lastThreeDay = strtotime('+5 day');
                if ($userInfo->userType == 1) {
                    $this->core->userInfo->notifitionNum = $this->core->Applyjob_model->getJoinResumeCount(['applyjob.userId' => $userInfo->userId, 'applyjob.applyStatus' => 2, 'applyjob.applyInterviewTime >' => $today, 'applyjob.applyInterviewTime <' => $lastThreeDay]);
                } else {
                    $this->core->userInfo->notifitionNum = $this->core->Applyjob_model->getJoinResumeCount(['applyjob.companyId' => $userInfo->companyId, 'applyjob.applyStatus' => 2, 'applyjob.applyInterviewTime >' => $today, 'applyjob.applyInterviewTime <' => $lastThreeDay]);
                }

                $this->core->userInfo->userName = $userInfo->userName;
                $this->core->userInfo->userId = $userInfo->userId;
                $this->core->userInfo->userEmail = $userInfo->userEmail;
                $this->core->userInfo->companyId = $userInfo->companyId;
                $this->core->userInfo->userType = $userInfo->userType;
                $this->core->userInfo->userTypeName = $userInfo->userType == 1 ? lang('user_type_appt') : lang('user_type_interview');
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function getGuessAllow() {
        return array(
            'M' => '',
            'C' => 'Index',
            'A' => 'Login'
        );
    }

}
