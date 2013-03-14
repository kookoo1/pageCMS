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
    }


}



