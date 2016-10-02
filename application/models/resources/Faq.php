<?php

// ATTENZIONE: self-documenting code!

class Application_Resource_Faq extends Zend_Db_Table_Abstract
{
    protected $_name    = 'faq';
    protected $_primary  = 'id';
    protected $_rowClass = 'Application_Resource_Faq_Item';
    
	

   
    public function getListaFaq()  
    {
		$select = $this->select()
                       ->order('id desc');
                    
        return $this->fetchAll($select); 
           
    }
    
    
      public function deleteFaq($id)
    {
	
	    $where = $this->getAdapter()->quoteInto('id = ?', $id);
	    $this->delete($where);

    }
    
    
      public function updateFaq($values, $id)
    {
	
	    $where = $this->getAdapter()->quoteInto('id = ?', $id);
	    $this->update($values, $where);

    }
    
    
    
    public function getFaq($id)   
    {
		
		$select = $this->select()
		               ->where ("id  = '" .$id. "'");
        return $this->fetchAll($select); 
      
       
    }
    

     public function insertFaq($values)
    {
    	$this->insert($values);
    	return $this->getAdapter()->lastInsertId();
    }
    
   

}
