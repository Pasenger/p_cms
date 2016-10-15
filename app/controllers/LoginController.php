<?php

class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->disableLevel(\Phalcon\Mvc\View::LEVEL_MAIN_LAYOUT);

        $errorMsg = $this->dispatcher->getParam('errorMsg');
        if(isset($errorMsg)){
            $this->view->setVar("errorMsg", $errorMsg);
        }else{
            $this->view->setVar("errorMsg", "");
        }

        $username = $this->dispatcher->getParam('username');
        if(isset($username)){
            $this->view->setVar("username", $username);
        }else{
            $this->view->setVar("username", "");
        }

        $password = $this->dispatcher->getParam('password');
        if(isset($password)){
            $this->view->setVar("password", $password);
        }else{
            $this->view->setVar("password", "");
        }
    }

    /**
     * 登录
     */
    public function loginAction(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cuser = CUUser::findFirst("username = '$username' AND password = '" . md5($password) . "'");

        if(!$cuser){    //未查找到
            $this->view->setVar("errorMsg", "用户名或密码错误");
            $this->view->setVar("username", $username);
            $this->view->setVar("password", $password);

            $this->dispatcher->setParam('errorMsg', '用户名或密码错误');
            $this->dispatcher->setParam('username', $username);
            $this->dispatcher->setParam('password', $password);

            $this->dispatcher->forward(
                [
                    "controller"    =>  "login",
                    "action"        =>  "index"
                ]
            );
        }else{
            //查询角色
            $userrole = CUUserRole::find("user_id = " . $cuser->id);

            //查询角色, 并缓存
            $roles = CURole::find();

            $roleArray = [];
            if($roles){
                foreach ($roles as $role){
                    $roleArray[$role->id] = $role->name;
                }
            }

            //保存用户信息到Session
            $this->session->set("username", $username);
            $this->session->set("userId", $cuser->id);
            $this->session->set("cityId", $cuser->city_id);
            $this->session->set("provinceId", $cuser->province_id);
            $this->session->set("email", $cuser->email);

            if($userrole){
                $userRoleList = "|";
                foreach ($userrole as $ur){
                    $userRoleList .= ($ur->role_id . "|");
                }

                $this->session->set("roles", $userRoleList);
            }

            return $this->response->redirect("/index/index");
        }

    }

    /**
     * 注销
     */
    public function logoutAction(){
        $this->session->destroy();

        return $this->response->redirect("/login/index");
    }
}

