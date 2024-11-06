<?php

class ShareSystem_Controller extends CI_Controller {
    
    public $actionLink = [
        'actionName' => '',
        'controllerName' => '',
        'actionUrl' => '',
        'jsTemplate' => ''
    ];
    
    public function __construct() {
        parent::__construct();
        $this->load->setActionConfig($this->actionLink);
        $this->load->library('form_validation');
    }
    
    /**
     * Json Message with Ajax
     * @param type $data
     * @param type $message
     * @param type $error
     * @return html
     */
    public function sendAjaxMsg($data = array(), $message = '', $error = false) {
        $this->output->set_content_type('application/json;charset=utf-8');
        echo json_encode([
            'code' => $error == false ? 200 : 500,
            'data' => $data,
            'message' => $message,
            'token' => get_instance()->security->get_csrf_hash()
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    /**
     * Ajax 提交的表单验证错误
     * return html
     */
    public function formErrorAjax($message = '') {
        if($this->form_validation->error_array()) {
            $this->sendAjaxMsg($this->form_validation->error_array(), '参数有误', true);
        } else {
            $this->sendAjaxMsg([$message], $message, true);
        }
    }
    
    /**
     * 错误提示
     * return html
     */
    public function errorMessage($errorMessage = '表单资料填写不正确', $errorData = array()) {
        if(!$errorData) {
            $errorData = $this->form_validation->error_array();
        }
        $this->viewSendMsg($errorData, $errorMessage, true);
    }

    /**
     * 普通提示
     * return html
     */
    public function sendMessage($data = array(), $message = '数据提交成功') {
        $this->viewSendMsg($data, $message);
    }

    public function pageCreate($url, $totalNum, $args = '') {
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $totalNum;
        $config['per_page'] = $this->per_page;
        $this->pagination->initialize($config);
        $this->actionLink['pageLink'] = $this->pagination->create_links();
    }
    
    /**
     * sendMsg
     * @param type $data
     * @param type $message
     * @param type $error
     * @return html
     */
    private function viewSendMsg($data = array(), $message = '', $error = false) {
        if(empty($data)) {
            $data = null;
        }
        if ($this->input->is_ajax_request() == true) {
            $this->sendJson($data, $message, $error);
        } else {
            $this->sendWeb($data, $message);
        }
        exit;
    }

    private function sendWeb($data, $message = '') {
        if(isset($data['url'])) {
            $url = $data['url'];
        } else {
            $url = null;
        }
        showMessage($message, $url);
    }

    private function sendJson($data = array(), $message = '', $error = false) {
        $this->output->set_content_type('application/json;charset=utf-8');
        echo json_encode([
            'code' => $error == false ? 200 : 500,
            'data' => $data,
            'message' => $message,
            'token' => $this->security->get_csrf_hash()
        ]);
    }
    
    
}