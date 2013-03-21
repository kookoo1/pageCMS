<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author webmaster
 */
class Syntra_Auth_Auth extends Zend_Controller_Plugin_Abstract {

    //put your code here

    public function preDispatch(\Zend_Controller_Request_Abstract $request) {

        $loginController = 'Users';
        $loginAction     = 'login';
        $locale          = Zend_Registry::get('Zend_Locale');
        $auth            = Zend_Auth::getInstance(); // wordt maar eenmaal gebruikt disgn pattern singleton ==> static function
        // auth controle uitvoeren
        // if user is not logged in and is not requesting the logon page
        // - redirect to loginpage


        if (!$auth->hasIdentity() && $request->getControllerName() != $loginController && $request->getActionName() != $loginAction) {
        
            $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            //die ('hier');
            //$redirector->gotoUrl('/nl_BE/login');
        }


        if ($auth->hasIdentity()) {
            // hier de rechten kontroleren
            //die('Hello user *wave*');

            $registry = Zend_Registry::getInstance();
            $acl = $registry->get('Zend_Acl');
            $identity = $auth->getIdentity();
            
            $usersModel = new Application_Model_Users();
            $user = $usersModel->getUserByIdentity($indentity);
              
            $role = $user->role;

            // role is een veld binnen onze user tabel
            $isAllowed = $acl->isAllowed($role, $request->getControllerName(), $request->getActionName());

            if (!$isAllowed) {
                $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $redirector->gotoUrl('/noaccess');
            }
        }
    }

}

?>
