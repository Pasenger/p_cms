<?php

/**
 * 首次认证页资源配置
 * Class Rauth1Controller
 */

require __DIR__ . '/../utils/Dict.php';

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

        $this->view->setVar("cityList", $this->getCityList($this->session->get("cityId")));
    }

    public function saveAction(){
        $this->view->disable();

        $result = [
            "code"  =>  0,
            "message"   => "OK"
        ];

        $resName = $this->request->getPost('resName');
        $resType = $this->request->getPost('resType');
        $cityId = $this->request->getPost('cityId');

        $provinceId = 0;
        if($cityId > 0){
            $provinceId = substr($cityId, 0, 3);
        }

        switch ($resType){
            case Dict::RESTYPE_AUTH1_TITLE:

                $titleContent = $this->request->getPost('titleContent');

                $title = new CRPageTitle();
                $title->name = $resName;
                $title->content = $titleContent;
                $title->province_id = $provinceId;
                $title->city_id = $cityId;
                $title->add_user = $this->session->get('userId');
                $title->insert_time = date('Y-m-d H:i:s');

                try{
                    $title->save();
                }catch (Exception $e){

                    $result['code'] = 1;

                    if($e->getCode() == 23000){
                        $result['message'] = '配置已经存在，请无重复配置！';
                    }else{
                        $result['message'] = $e->getCode();
                    }
                }

//                echo json_encode($title->save());
//                if($title->save() === false){
//                    $result['code'] = 1;
//
//                    $messages = $title->getMessages();
//                    foreach ($messages as $message) {
//                        $result['message'] .= $message;
//                    }
//                }

                break;
            case Dict::RESTYPE_AUTH1_BANNER:

                break;
            case Dict::RESTYPE_AUTH1_CITYAVERT:

                break;
            case Dict::RESTYPE_AUTH1_HOTREC:

                break;
            case Dict::RESTYPE_AUTH1_COPYRIGHT:

                break;
        }

        echo json_encode($result);
    }

}

