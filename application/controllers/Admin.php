<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends ShareSystem_Controller {
    
    public function __construct() {
        parent::__construct();
        /**
         * 定位模板的目录
         */
        $this->load->setTemplateDir('system');
        $this->load->model(array('admin_model'));
        /**
         * 主控制器的名字设定
         */
        $this->actionLink['controllerName'] = '系统模块';
    }

    public function index() {
        $this->actionLink['actionName'] = '帐号管理';
        $list = $this->admin_model->getList();
        $this->load->adminView('list', [
            'list' => $list
        ]);
    }

    public function info() {
        $this->actionLink['actionName'] = '用户信息';
        $this->actionLink['jsTemplate'] = 'form';
        $userId = $this->input->get('userId');
        if($userId) {
            $userInfo = $this->admin_model->getOneById($userId);
        }
        $this->load->adminView('info', [
            'userId' => $userId,
            'info' => $userInfo
        ]);
    }

    public function edit() {
        $post = $this->input->post();
        if ($this->form_validation->run('system') == true) {
            if($post['userId']) {
                $data = [];
                if(strlen($post['userPassword']) < 16) {
                    $data['userPassword'] = $post['userPassword'];
                }
                $this->admin_model->updateByUser($post['userId'], $data);
            } else {
                $this->admin_model->regUser($post['userName'], $post['userPassword']);
            }
            $this->sendAjaxMsg([]);
        } else {
            $this->formErrorAjax();
        }
    }

}
