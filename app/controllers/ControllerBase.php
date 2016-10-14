<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize(){
        $username = $this->session->get("username");
        if(!$username){
            return $this->response->redirect("/login/index");
        }

        $this->view->setVar("nav1", "Home");
        $this->view->setVar("nav2", "移动端");
        $this->view->setVar("version", "V3.2");
        $this->view->setVar("nav2Href", "#");
        $this->view->setVar("menu", "");    //选中的menuId
    }

    /**
     * 加载城市列表
     * @param bool $cityId
     * @return Array
     */
    public function getCityList($cityId = false){
        $cacheKey = "CITY_$cityId";

        $cityList = $this->cache->get($cacheKey);

        if($cityList){
           return $cityList;
        }else{
            if($cityId){
                $cityList = OCoMeCity::find("me_id = $cityId");
            }else{
                $cityList = OCoMeCity::find();
            }

            $this->cache->save($cacheKey, $cityList);

            return $cityList;
        }
    }

    /**
     * 获取SSID列表
     * @param int $cityId
     * @return OCuMeSsid[]
     */
    public function getSsid($cityId = 0)
    {
        $cacheKey = "SSID_$cityId";

        $ssidList = $this->cache->get($cacheKey);

        if ($ssidList) {
            return $ssidList;
        } else {
            $ssidList = OCuMeSsid::find("city_id = $cityId");

            $this->cache->save($cacheKey, $ssidList);

            return $ssidList;
        }
    }


    /**
     * 根据SSID查询城市热点
     * @param int $cityId
     * @param bool $ssid
     * @return OCuMeEnterprise[]
     */
    public function getHpBySsid($cityId = 0, $ssid = false)
    {
        $cacheKey = "HP_SSID_$ssid";

        $hpList = $this->cache->get($cacheKey);

        if ($hpList) {
            return $hpList;
        } else {
            if($ssid){
                $ssidHpList = OCuMeSsid::find("city_id = $cityId AND ssid_name = '$ssid'");

                if(!$ssidHpList){
                    return [];
                }

                $hpIds = "0";
                foreach ($ssidHpList as $ssidHp){
                    $hpIds .= ("," . $ssidHp->hp_id);
                }

                $hpList = OCuMeEnterprise::find(
                    "me_id in($hpIds)"
                );
            }else{
                $hpList = OCuMeEnterprise::find();
            }


            $this->cache->save($cacheKey, $hpList);

            return $hpList;
        }
    }
}
