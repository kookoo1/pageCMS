<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    
    protected function _initRegisterControllerPlugins() {
        $this->bootstrap('frontcontroller');
        $front = $this->getResource('frontcontroller');
        $front->registerPlugin(new Syntra_Controller_Plugin_Translate());
        $front->registerPlugin(new Syntra_Controller_Plugin_Navigation());
//        $front->registerPlugin(new Syntra_Auth_Acl());
//        $front->registerPlugin(new Syntra_Auth_Auth());
     }

    



    public function _initDbAdapter() {
        
        $this->bootstrap('db');
        $db = $this->getResource('db');
        // maak een soort van globale variable 
        Zend_Registry::set('db', $db);
    }
    
    
    //route aanpassen van zendframe work
    /**
     * put after _initView !!!
     * Create all customs routes
     * @param array $options
     * @return Zend_Controller_Router_Route
     */
    public function _initRouter (array $options = null) {
        
        $router = $this->getResource('frontcontroller')->getRouter();
        
        // add custom router
        // : before param = get variable
        // altijd een unique naam gebruiken
        // de URL opbouwen zoals we zelf willen!!
        $router->addRoute('lang',
                new Zend_Controller_Router_Route (':lang', array(
                    'controller' => 'index',
                    'action'     => 'index'
                )));// unique naam
        $router->addRoute('login',
                new Zend_Controller_Router_Route (':lang/login', array(
                    'controller' => 'users',
                    'action'     => 'login'
                )));// unique naam
        $router->addRoute('logout',
                new Zend_Controller_Router_Route (':lang/logout', array(
                    'controller' => 'users',
                    'action'     => 'logout'
                )));// unique naam
       $router->addRoute('page',
                new Zend_Controller_Router_Route (':lang/pagina/:slug', array(
                    'controller' => 'page',
                    'action'     => 'index'
                )));// unique naam
         
        
    }
    
    
}

