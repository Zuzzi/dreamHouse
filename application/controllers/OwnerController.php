<?php


// ATTENZIONE: self-documenting code!

class OwnerController extends Zend_Controller_Action
{
	 protected $_authService; 
     protected $_model;
     protected $_updateForm;
     protected $_newForm;



    public function init()
    {
		$this->_model = new Application_Model_Model();
		
		$this->_authService = new Application_Service_Auth();         
		$this->_helper->layout->setLayout('owner');
		$this->view->updateForm = $this->createUpdateForm();
		$this->view->newForm = $this->createNewForm();


    }



    public function indexAction()   
    {
		$username = $this->_authService->getIdentity()->username;
		$myHousesList = $this->_model->getMyHousesList($username);
		
		$this->view->myHousesList = $myHousesList;

    }
    
    
     public function newhouseAction()   
    {
		

    }
    
    
    
    public function updateAction() {
		
		$idHouse = $this->_getParam("idHouse");
		$house = $this->_model->getHouse($idHouse)[0];
		
		$this->_updateForm->location->setValue($house->location);
		$this->_updateForm->price->setValue($house->price);
		$this->_updateForm->sq_ft->setValue($house->sq_ft);
		$this->_updateForm->description->setValue($house->description);
		
		
		$this->view->picture1 = $house->picture1;
		$this->view->picture2 = $house->picture2;
		$this->view->picture3 = $house->picture3;
	
	}
	
	
	
	public function deleteAction() {
		
		$idHouse = $this->_getParam("idHouse");
		$this->_model->deleteHouse($idHouse);
		
		
		$username = $this->_authService->getIdentity()->username;
        $action = "Delete house #" . $idHouse;
        $object = $this->_authService->getIdentity()->role;
        $date = new Zend_Date();
        
        $values = array ("user" => $username, "action" => $action, "object" => $object, "date" => $date);
        
        $this->_model->writeLog($values);
       	
		
		
		
		
		return $this->_helper->redirector('index');	
		
		
	}
    
    


    
    
     public function logoutAction()   
    {
		
		$username = $this->_authService->getIdentity()->username;
        $action = "Log-out";
        $object = $this->_authService->getIdentity()->role;
        $date = new Zend_Date();
        
        $values = array ("user" => $username, "action" => $action, "object" => $object, "date" => $date);
        
        $this->_model->writeLog($values);
		
		
		$this->_authService->clear();
		return $this->_helper->redirector('index','index');	

    }
    
    
    
    
	 public function authenticateupdateAction()
	{        
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->_helper->redirector('index');
        }
        $form = $this->_updateForm;
        if (!$form->isValid($request->getPost())) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
        	return $this->render('index');
        }
       
        
        
        $values = $form->getValues();
        $username = $this->_authService->getIdentity()->username;
        $email = $this->_authService->getIdentity()->email;
        $phone = $this->_authService->getIdentity()->cell;
        
       
        if ($values['picture1'] == "") {
			unset($values['picture1']);
		}
        
       if ($values['picture2'] == "") {
			unset($values['picture2']);
		}
        
       if ($values['picture3'] == "") {
			unset($values['picture3']);
		}
        
        $houseId = $this->_getParam("idHouse");
        
       	$this->_model->updateHouse($values, $houseId);     
       	
       	
       	
        $username = $this->_authService->getIdentity()->username;
        $action = "Update house #" . $houseId;
        $object = $this->_authService->getIdentity()->role;
        $date = new Zend_Date();
        
        $values = array ("user" => $username, "action" => $action, "object" => $object, "date" => $date);
        
        $this->_model->writeLog($values);
       	
       	  
        
       
        return $this->_helper->redirector('index', 'owner');
	}
    
    
    
    
    
	 public function authenticatenewAction()
	{        
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->_helper->redirector('newhouse');
        }
        $form = $this->_newForm;
        if (!$form->isValid($request->getPost())) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
        	return $this->render('newhouse');
        }
       
        
        $values = $form->getValues();
        $username = $this->_authService->getIdentity()->username;
        $email = $this->_authService->getIdentity()->email;
        $phone = $this->_authService->getIdentity()->cell;
        
        $values ['username'] = $username;
        $values ['email'] = $email;
        $values ['phone'] = $phone;
        
       	$houseId = $this->_model->insertHouse($values);
       	
       	
       	$username = $this->_authService->getIdentity()->username;
        $action = "Insert house #" . $houseId;
        $object = $this->_authService->getIdentity()->role;
        $date = new Zend_Date();
        
        $values = array ("user" => $username, "action" => $action, "object" => $object, "date" => $date);
        
        $this->_model->writeLog($values);
       	
  
       
        return $this->_helper->redirector('index');
	}
    
    
    
    
    
    
    
    
	
    
    
    
    
    
    private function createNewForm()
    {
		
    	$urlHelper = $this->_helper->getHelper('url'); 
	    $this->_newForm = new Application_Form_Owner_New();
    	$this->_newForm->setAction($urlHelper->url(array(          
			'controller' => 'owner',
			'action' => 'authenticatenew'),
			'default'
		)); 
		return $this->_newForm;
    }   



    
    
    
    
    
    
    private function createUpdateForm()
    {
		
    	$urlHelper = $this->_helper->getHelper('url'); 
	    $this->_updateForm = new Application_Form_Owner_Update();
    	$this->_updateForm->setAction($urlHelper->url(array(          
			'controller' => 'owner',
			'action' => 'authenticateupdate'),
			'default'
		)); 
		return $this->_updateForm;
    }   



    
    
   


}

