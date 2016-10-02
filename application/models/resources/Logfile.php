<?php

// ATTENZIONE: self-documenting code!

class Application_Resource_Logfile extends Zend_Db_Table_Abstract
{
	protected $_name    = 'logfile';     									
    protected $_primary  = 'id';    
    protected $_rowClass = 'Application_Resource_Users_Item';    

        				

    
   public function writeLog($values)
    {
    	$this->insert($values);
    }
    
    
    
      
    public function getLogs()   
    {
		$select = $this->select()
                       ->order('id desc');
        return $this->fetchAll($select); 
    }
    
    
    
    public function clearlogs() {
		
		$this->getAdapter()->delete("logfile");
		
	}
    
    
    
    
   
}
