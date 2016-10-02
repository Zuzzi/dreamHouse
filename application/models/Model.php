<?php

// ATTENZIONE: self-documenting code!


class Application_Model_Model extends App_Model_Abstract
{ 

	public function __construct()
    {

		$this->_logger = Zend_Registry::get('log');  	
	}
	
	
	
	public function getHousesList() {
             
            return $this->getResource('Houses')->getHousesList();    
	}
	
	public function getHouse($houseId) {
             
            return $this->getResource('Houses')->getHouse($houseId);    
	}
	
	
	
	
	
	  public function searchHouses($maxPrice, $catalogHouseSize, $citySelected)
    {
		return $this->getResource('Houses')->searchHouses($maxPrice, $catalogHouseSize, $citySelected); 
    }
	
	
	 public function getUserByName($info)
    {
    	return $this->getResource('Users')->getUserByName($info);
    }
	
	

     public function getFaqList()
    {
		return $this->getResource('Faq')->getListaFaq(); 
    }
    
    
      public function getFaq($id)
    {
		return $this->getResource('Faq')->getFaq($id); 
    }
    
    
    
     public function getMyHousesList($username)
    {
		return $this->getResource('houses')->getMyHousesList($username); 
    }
    
	 public function insertHouse($values)
    {
		return $this->getResource('houses')->insertHouse($values); 
    }
    
	
	 public function updateHouse($values, $id)
    {
		return $this->getResource('houses')->updateHouse($values, $id); 
    }
    
	 public function deleteHouse($id)
    {
		return $this->getResource('houses')->deleteHouse($id); 
    }
    
    
    public function getUsersList() {
		
		return $this->getResource('users')->getUsersList();
	}		
    
    
     public function deleteUser($id)
    {
		return $this->getResource('users')->deleteUser($id); 
    }
    
     public function insertUser($values)
    {
		return $this->getResource('users')->insertUser($values); 
    }
    
    
      public function insertFaq($values)
    {
		return $this->getResource('faq')->insertFaq($values); 
    }
    
    
    
    
     public function deleteFaq($id)
    {
		return $this->getResource('faq')->deleteFaq($id); 
    }
    
     public function updateFaq($values, $id)
    {
		return $this->getResource('faq')->updateFaq($values, $id); 
    }
    
    
    
     public function writeLog($values)
    {
		return $this->getResource('logfile')->writeLog($values); 
    }
    
    
     public function getLogs()
    {
		return $this->getResource('logfile')->getLogs(); 
    }
    
    public function clearLogs() 
    {
		
		return $this->getResource('logfile')->clearLogs(); 
		
	}
    
    
}
