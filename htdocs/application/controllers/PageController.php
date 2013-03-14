<?php

class PageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $lang = Zend_Registry::get('Zend_Locale');
//        $lang = $this->getParam('lang'); // andere manier om var op te halen
        $slug =$this->getParam('slug');
        
        var_dump($this->getAllParams());
    }


}

