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

        $this->view->setVar("role", $this->session->get("role"));

        $this->view->setVar("cityList", $this->getCityList($this->session->get("cityId")));

        $this->view->setVar('resTypeList', $this->getDict(200));
    }

    /**
     * 查找
     * Ajax
     */
    public function findAction(){
        $this->view->disable();

        $resName = $this->request->getPost('resName');
        $resType = $this->request->getPost('resType');
        $cityId = $this->request->getPost('cityId');
        $pageNumber = $this->request->getPost('pageNumber');

        if($cityId == 0){
            if($this->session->get('cityId') > 0){
                $cityId = $this->session->get('cityId');
            }
        }

        $result = [
            "code" => 0,
            "count" => 0,
            "data" => null
        ];

        switch ($resType) {
            case Dict::RESTYPE_AUTH1_TITLE:
                $titleList = CRPageTitle::find([
                    "city_id = $cityId",
                    "order"     =>  "id desc",
                    "offset"    => $pageNumber * 10,
                    "limit"     => 10
                ]);

                $count = CRPageTitle::count();

                if($titleList){
                    $result['count'] = $count;
                    $result['data'] = $titleList->toArray();
                }

                break;
            case Dict::RESTYPE_AUTH1_BANNER:
            case Dict::RESTYPE_AUTH1_COPYRIGHT:
            case Dict::RESTYPE_AUTH1_CITYAVERT:
            case Dict::RESTYPE_AUTH1_HOTREC:

                $condition = "res_type_id = " .  $resType . " AND city_id = $cityId";
                if($resName){
                    $condition .= " AND name like '%$resName%'";
                }

                $avertList = CRAdvert::find([
                    $condition,
                    "order"     =>  "id desc",
                    "offset"    => $pageNumber * 10,
                    "limit"     => 10
                ]);

                $count = CRAdvert::count($condition);

                if($avertList){
                    $result['count'] = $count;
                    $result['data'] = $avertList->toArray();
                }

                break;
        }

        echo json_encode($result);
    }

    /**
     * 添加
     */
    public function addAction()
    {
        $this->view->setVar("nav1", "移动端");
        $this->view->setVar("nav2", "新增认证页资源");
        $this->view->setVar("nav2Href", "#");
        $this->view->setVar("menu", "");    //选中的menuId

        $this->view->setVar("cityList", $this->getCityList($this->session->get("cityId")));
    }

    /**
     * 保存
     * Ajax调用
     */
    public function saveAction()
    {
        $this->view->disable();

        $result = [
            "code" => 0,
            "message" => "OK"
        ];

        $resName = $this->request->getPost('resName');
        $resType = $this->request->getPost('resType');
        $cityId = $this->request->getPost('cityId');

        if($cityId == 0){
            if($this->session->get('cityId') > 0){
                $cityId = $this->session->get('cityId');
            }
        }

        $provinceId = 0;
        if ($cityId > 0) {
            $provinceId = substr($cityId, 0, 3);
        }

        switch ($resType) {
            case Dict::RESTYPE_AUTH1_TITLE:
                $titleContent = $this->request->getPost('titleContent');

                if (!$titleContent || $titleContent == '') {
                    $result['code'] = 1001;
                    $result['message'] = '页眉标题内容不能为空！';

                    break;
                }

                $title = new CRPageTitle();
                $title->name = $resName;
                $title->content = $titleContent;
                $title->province_id = $provinceId;
                $title->city_id = $cityId;
                $title->add_user = $this->session->get('userId');
                $title->insert_time = date('Y-m-d H:i:s');

                try {
                    if($title->save() == false){
                        $result['code'] = 1003;
                        foreach ($title->getMessages() as $message){
                            $result['message'] .= $message;
                        }
                    }
                } catch (Exception $e) {

                    $result['code'] = 1002;

                    if ($e->getCode() == 23000) {
                        $result['message'] = '配置已经存在，请无重复配置！';
                    } else {
                        $result['message'] = $e->getCode();
                    }
                }

                break;
            case Dict::RESTYPE_AUTH1_BANNER:
                $bannerImgFile = $_FILES["resImg"];

                if (!$bannerImgFile || $bannerImgFile["error"] > 0) {
                    $result['code'] = 2001;
                    $result['message'] = "上传文件失败: " . $bannerImgFile["error"];

                    break;
                }

                $subDir = "/res/auth1/banner/";
                $dir = $this->config->upload->dir . $subDir;
                $fileName = uniqid() . strrchr($bannerImgFile["name"], ".");
                if (!file_exists($dir)) {
                    if (!mkdir($dir, 0777, true)) {
                        $result['code'] = 2002;
                        $result['message'] = "创建文件目录失败";

                        break;
                    }
                }

                //保存文件
                if (!move_uploaded_file($bannerImgFile["tmp_name"], $dir . $fileName)) {
                    $result['code'] = 2003;
                    $result['message'] = "保存文件失败";

                    break;
                }

                $advert = new CRAdvert();
                $advert->name = $resName;
                $advert->img_url = $subDir . $fileName;
                $advert->res_type_id = Dict::RESTYPE_AUTH1_BANNER;
                $advert->province_id = $provinceId;
                $advert->city_id = $cityId;
                $advert->add_user = $this->session->get('userId');
                $advert->insert_time = date('Y-m-d H:i:s');

                try {
                    if($advert->save() == false){
                        $result['code'] = 2005;
                        $result['message'] = '保存数据错误:';
                        foreach ($advert->getMessages() as $message){
                            $result['message'] .= $message;
                        }
                    }
                } catch (Exception $e) {

                    $result['code'] = 2004;

                    if ($e->getCode() == 23000) {
                        $result['message'] = '配置已经存在，请无重复配置！';
                    } else {
                        $result['message'] = $e->getCode();
                    }
                }

                break;
            case Dict::RESTYPE_AUTH1_CITYAVERT:
                $logoFile = $_FILES["resImg"];

                if (!$logoFile || $logoFile["error"] > 0) {
                    $result['code'] = 3001;
                    $result['message'] = "上传文件失败: " . $logoFile["error"];

                    break;
                }

                $subDir = "/res/auth1/hotrec/";
                $dir = $this->config->upload->dir . $subDir;
                $fileName = uniqid() . strrchr($logoFile["name"], ".");
                if (!file_exists($dir)) {
                    if (!mkdir($dir, 0777, true)) {
                        $result['code'] = 3002;
                        $result['message'] = "创建文件目录失败";

                        break;
                    }
                }

                //保存文件
                if (!move_uploaded_file($logoFile["tmp_name"], $dir . $fileName)) {
                    $result['code'] = 3003;
                    $result['message'] = "保存文件失败";

                    break;
                }

                $advert = new CRAdvert();
                $advert->name = $resName;
                $advert->img_url = $subDir . $fileName;
                $advert->res_type_id = Dict::RESTYPE_AUTH1_CITYAVERT;
                $advert->province_id = $provinceId;
                $advert->city_id = $cityId;
                $advert->add_user = $this->session->get('userId');
                $advert->insert_time = date('Y-m-d H:i:s');

                try {
                    if($advert->save() == false){
                        $result['code'] = 3005;
                        $result['message'] = '保存数据错误:';
                        foreach ($advert->getMessages() as $message){
                            $result['message'] .= $message;
                        }
                    }
                } catch (Exception $e) {

                    $result['code'] = 3004;

                    if ($e->getCode() == 23000) {
                        $result['message'] = '配置已经存在，请无重复配置！';
                    } else {
                        $result['message'] = $e->getCode();
                    }
                }

                break;
            case Dict::RESTYPE_AUTH1_HOTREC:
                $logoFile = $_FILES["resImg"];

                if (!$logoFile || $logoFile["error"] > 0) {
                    $result['code'] = 4001;
                    $result['message'] = "上传文件失败: " . $logoFile["error"];

                    break;
                }

                $subDir = "/res/auth1/hotrec/";
                $dir = $this->config->upload->dir . $subDir;
                $fileName = uniqid() . strrchr($logoFile["name"], ".");
                if (!file_exists($dir)) {
                    if (!mkdir($dir, 0777, true)) {
                        $result['code'] = 4002;
                        $result['message'] = "创建文件目录失败";

                        break;
                    }
                }

                //保存文件
                if (!move_uploaded_file($logoFile["tmp_name"], $dir . $fileName)) {
                    $result['code'] = 4003;
                    $result['message'] = "保存文件失败";

                    break;
                }

                $advert = new CRAdvert();
                $advert->name = $resName;
                $advert->img_url = $subDir . $fileName;
                $advert->res_type_id = Dict::RESTYPE_AUTH1_HOTREC;
                $advert->province_id = $provinceId;
                $advert->city_id = $cityId;
                $advert->add_user = $this->session->get('userId');
                $advert->insert_time = date('Y-m-d H:i:s');

                try {
                    if($advert->save() == false){
                        $result['code'] = 4005;
                        $result['message'] = '保存数据错误:';
                        foreach ($advert->getMessages() as $message){
                            $result['message'] .= $message;
                        }
                    }
                } catch (Exception $e) {

                    $result['code'] = 4004;

                    if ($e->getCode() == 23000) {
                        $result['message'] = '配置已经存在，请无重复配置！';
                    } else {
                        $result['message'] = $e->getCode();
                    }
                }


                break;
            case Dict::RESTYPE_AUTH1_COPYRIGHT:
                $imageFile = $_FILES["resImg"];

                if (!$imageFile || $imageFile["error"] > 0) {
                    $result['code'] = 5001;
                    $result['message'] = "上传文件失败: " . $imageFile["error"];

                    break;
                }

                $subDir = "/res/auth1/hotrec/";
                $dir = $this->config->upload->dir . $subDir;
                $fileName = uniqid() . strrchr($imageFile["name"], ".");
                if (!file_exists($dir)) {
                    if (!mkdir($dir, 0777, true)) {
                        $result['code'] = 5002;
                        $result['message'] = "创建文件目录失败";

                        break;
                    }
                }

                //保存文件
                if (!move_uploaded_file($imageFile["tmp_name"], $dir . $fileName)) {
                    $result['code'] = 5003;
                    $result['message'] = "保存文件失败";

                    break;
                }

                $resImgHref = $this->request->getPost('resImgHref');
                if(!$resImgHref || $resImgHref == ''){
                    $resImgHref = '#';
                }

                $advert = new CRAdvert();
                $advert->name = $resName;
                $advert->img_url = $subDir . $fileName;
                $advert->href_url = $resImgHref;
                $advert->res_type_id = Dict::RESTYPE_AUTH1_COPYRIGHT;
                $advert->province_id = $provinceId;
                $advert->city_id = $cityId;
                $advert->add_user = $this->session->get('userId');
                $advert->insert_time = date('Y-m-d H:i:s');

                try {
                    if($advert->save() == false){
                        $result['code'] = 5005;
                        $result['message'] = '保存数据错误:';
                        foreach ($advert->getMessages() as $message){
                            $result['message'] .= $message;
                        }
                    }
                } catch (Exception $e) {

                    $result['code'] = 5004;

                    if ($e->getCode() == 23000) {
                        $result['message'] = '配置已经存在，请无重复配置！';
                    } else {
                        $result['message'] = $e->getCode();
                    }
                }

                break;
        }

        echo json_encode($result);
    }

}

