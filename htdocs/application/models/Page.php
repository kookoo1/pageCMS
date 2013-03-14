<?php

class Application_Model_Page extends Zend_Db_Table_Abstract
{


    protected $_name = "page";
    protected $_primary = "id";
    
    const MENU_VISIBLE = 1;
    const MENU_INVISIBLE = 0;
    
    const STATUS_ONLINE = 1;
    const STATUS_OFFLINE = 0;
    
    
    public function getMenu($locale){
        
        $select = $this->select()
                ->where('menu = ?',self::MENU_VISIBLE)
                ->where('status =?',  self::STATUS_ONLINE)
                ->where('locale =?',$locale);
        $result = $this->fetchAll($select);
        return $result;
    }
    
    
     public function getTitle($locale){
        
        $select = $this->select()
                ->where('menu = ?',self::MENU_VISIBLE)
                ->where('status =?',  self::STATUS_ONLINE)
                ->where('locale =?',$locale);
        $result = $this->fetchAll($select);
        return $result;
    }
   
    
    
}

