<?php
/**
 * System 视图层扩展
 */
class ShareSystem_Loader extends CI_Loader {
    
    public $actionLink = [];
    
    public function __construct(){
        parent::__construct();
        $this->setTemplateDir('js');
    }
    
    /**
     * 后台模板输出控制
     * @param type $viewName
     * @param type $data
     */
    public function adminView($viewName, $data = array()) {
        $baseUrl = array();
        $baseUrl[] = getDirName();
        $baseUrl[] = getControlName();
        $this->actionLink['controllerUrl'] = site_url(implode('/', $baseUrl));
        $baseUrl[] = getMethodName();
        $this->actionLink['actionUrl'] = site_url(implode('/', $baseUrl));
        $this->view($viewName, array_merge($data, $this->actionLink));
    }
    
    public function setActionConfig(&$actionArray) {
        $this->actionLink = &$actionArray;
    }
    
    public function setTemplateDir($dir) {
        $this->_ci_view_paths[VIEWPATH.'/'.$dir.'/'] = TRUE;
    }
    
    public function simpleJs() {
        if(isset($this->actionLink['jsTemplate']) && $this->actionLink['jsTemplate']) {
            $this->view('js_'.$this->actionLink['jsTemplate'], isset($this->actionLink['jsTemplateData']) ? $this->actionLink['jsTemplateData'] : array());
        }
    }
}