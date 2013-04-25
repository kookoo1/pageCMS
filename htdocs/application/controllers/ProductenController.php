<?php

class ProductenController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function clientAction() {
        // action body
    }

    public function serverAction() {
        // uitschakelen layout en de view niet renderen
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        // create a wsdl based on the Application_Model_Producten

        $wsdl = $this->_getParam('wsdl');
        if (isset($wsdl)) {

            $server = new Zend_Soap_AutoDiscover(); // maakt hiermee een perfecte soap wsdl omgeving
            $server->setClass('Application_Model_Producten');
            $server->handle();
        } else {
            $server = new Zend_Soap_Server();
            $server->setClass('Application_Model_Producten');
            $server->setObject(new Application_Model_Producten());
            $server->handle();
        }
    }

}

