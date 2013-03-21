<?php

class UsersController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        // action body
        
        $loginForm = new Appliction_Form_Login();
        $this->view->form->$loginForm;
        
        // dit altijd uitvoeren om een formulier uit te lzeen
        if($this->getRequest()->getPost()) {
            $postParams =$this->getRequest()->getPost();// $_POST
            
            if ($this->view->form->isValid($postParams)) {
                
                $params = $this->view->form->getValues();
                
                $auth = Zend_Auth::getInstance();
                // meegeven welek database driver we gebruiken
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'));
                
                // alle gegevens 
                $authAdapter->setTableName('users')
                            ->setIdentityColumn('username')
                            ->setCredentialColumn('password')
                            ->setIdentity($params['login'])
                            ->setCredential($params['password']);
                        
                // hier login gaan uitvoeren
                $result = $auth->authenticate($authAdapter);
                //var_dump($result);
                
                if ($result->isValid()) {
                    
                    echo 'U bent ingelogd';
                } else {
                    foreach ($result->getMessages() as $message) {
                        echo $message;
                    }
                }
                
                
            }
            
        }
    }


}



