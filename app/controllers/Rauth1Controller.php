<?php

/**
 * 首次认证页资源配置
 * Class Rauth1Controller
 */
class Rauth1Controller extends ControllerBase
{

    public function indexAction()
    {
        $this->view->setVar("nav1", "移动端");
        $this->view->setVar("nav2", "首次认证页资源配置");
        $this->view->setVar("nav2Href", "#");
        $this->view->setVar("menu", "");    //选中的menuId

        $this->view->setVar("cityList", $this->getCityList($this->session->get("cityId")));

        if($this->session->get("cityId") > 0){
            $this->view->setVar("ssidList", $this->getSsidList($this->session->get("cityId")));
        }else{
            $this->view->setVar("ssidList", '');
        }
    }

    /**
     * 添加
     */
    public function addAction(){
        $this->view->setVar("nav1", "移动端");
        $this->view->setVar("nav2", "新增认证页资源");
        $this->view->setVar("nav2Href", "#");
        $this->view->setVar("menu", "");    //选中的menuId
    }

}

