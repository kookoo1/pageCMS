<?php


class Syntra_Auth_Acl extends Zend_Controller_Plugin_Abstract {
    //put your code here
    
    public function preDispatch(\Zend_Controller_Request_Abstract $request) {
        
        // op welke 
        $acl = new Zend_Acl();
        
        
        $roles = array('GUEST','USER','ADMIN');// uitlzen normaal DB!!! case sensitive!!!
        
        $controllers = array('users','index','page','error','admin-index');
        
        
        foreach ($request as $role ) {
            $acl->addRole($role);
        }
        
        foreach ($controllers as $controller) {
//            $acl->addResource($controller);// kan ook
            $acl->add(new Zend_Acl_Resource($controller));
        }
        
        
        $acl->allow('ADMIN');// acces to averything
        $acl->allow('USER');// acces to everything
        $acl->deny('USER','admin-index');// user no acces to admin 
        
        
        
        Zend_Registry::set('Zend_Acl',$acl);
        
    }

}

?>
