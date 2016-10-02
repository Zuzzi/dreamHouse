<?php

// ATTENZIONE: self-documenting code!

class Application_Resource_Houses extends Zend_Db_Table_Abstract
{
	protected $_name    = 'houses';     									
    protected $_primary  = 'id';    
    protected $_rowClass = 'Application_Resource_Houses_Item';    

        				
   
   
    public function getHousesList()   
    {
		$select = $this->select()
                       ->order('id desc');
        return $this->fetchAll($select); 
    }
    
    
    
    
     public function insertHouse($values)
    {
        $this->insert($values);
    	return $this->getAdapter()->lastInsertId();
    }
    
    
    
    
    public function updateHouse($values, $id)
    {
	
	    $where = $this->getAdapter()->quoteInto('id = ?', $id);
	    $this->update($values, $where);

    }
	
	
	
     public function deleteHouse($id)
    {
	
	    $where = $this->getAdapter()->quoteInto('id = ?', $id);
	    $this->delete($where);

    }
    
    
    
    
    
    public function getHouse($houseId)   
    {
		
		$select = $this->select()
		               ->where ("id  = '" .$houseId. "'");
        return $this->fetchAll($select); 
      
       
    }
    
    
     public function getMyHousesList($username)   
    {
		
		$select = $this->select()
		               ->where ("username  = '" .$username. "'")
		               ->order('id desc');
        return $this->fetchAll($select); 
      
       
    }
    
    
    
    
    
      public function searchHouses($maxPrice, $size, $citySelected)   
    {
		$select = null;
		
		if (is_null($maxPrice) || $maxPrice == "") {
			
			$priceCondition = "";
		
		}
		
		
		
		else if ($size == "any") {
			

			
			$priceCondition = "price <= " . $maxPrice; 
			
		}
		
		
		else {
			
			$priceCondition = "price <= " . $maxPrice . " and "; 
			
		}
		
		 
		
		
		
		
		if ($citySelected == "any") {
			
			$cityCondition = "";
		}
		
		
		else if ($maxPrice == "" && $size == "any") {
			
			$cityCondition = "location = '".$citySelected . "'";
		}
		
		else {
			
			$cityCondition = " and  location = '".$citySelected . "'";
			
		}
		
		
		
		
		if ($size == "any") {
			
			

		
		    $select = $this->select()
		                   ->where ($priceCondition . $cityCondition  )
                           ->order("id desc");
			
			
		}
		
		
		else if ($size == "small") {
			
			
			$select = $this->select()
		                   ->where ($priceCondition. " sq_ft < 1500 " . $cityCondition)
                           ->order("id desc");
			
			
		}
		
		
		else if ($size == "medium") {
			
			$select = $this->select()
		                   ->where ($priceCondition." sq_ft > 1500 and sq_ft < 4000 " . $cityCondition )
                           ->order("id desc");
			
		}
		
		
		else if ($size == "large") {
			
			$select = $this->select()
		                   ->where ($priceCondition." sq_ft > 4000 " . $cityCondition )
                           ->order("id desc");
			
		}
		
	
		
		
		
        return $this->fetchAll($select); 
    }
    
   
   
   
   
}
