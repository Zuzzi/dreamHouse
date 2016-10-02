<?php

// ATTENZIONE: self-documenting code!

class Application_Resource_Users extends Zend_Db_Table_Abstract
{
	protected $_name    = 'users';     									
    protected $_primary  = 'id';    
    protected $_rowClass = 'Application_Resource_Users_Item';    

        				
   
    public function getUserByName($usrName)
    {
        return $this->fetchRow($this->select()->where('username = ?', $usrName));
    }
   
    public function getUsersList()   
    {
		$select = $this->select()
                       ->order('id desc');
        return $this->fetchAll($select); 
    }
    
    
    
     public function deleteUser($id)
    {
	
	    $where = $this->getAdapter()->quoteInto('id = ?', $id);
	    $this->delete($where);

    }
    
   public function insertUser($values)
    {
    	$this->insert($values);
    	return $this->getAdapter()->lastInsertId();
    }
    
   
}
