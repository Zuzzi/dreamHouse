<?php


// ATTENZIONE: self-documenting code!

class AdminController extends Zend_Controller_Action
{
	 protected $_authService;
	 protected $_model;
	 protected $_newAdminForm;
	 protected $_updateFaqForm;
	 protected $_newFaqForm; 




    public function init()
    {
		$this->_helper->layout->setLayout('admin');
		$this->_authService = new Application_Service_Auth();
		$this->_model = new Application_Model_Model();
		$this->view->newAdminForm = $this->createNewAdminForm();
		$this->view->updateFaqForm = $this->createUpdateFaqForm();
		$this->view->newFaqForm = $this->createNewFaqForm();

    }



    public function indexAction()   
    {
		$logFileList = $this->_model->getLogs();
		
		$this->view->logFileList = $logFileList;

    }
    
    
    public function usersAction()   
    {
		$usersList = $this->_model->getUsersList();
		$this->view->usersList = $usersList;

    }
    
    
    public function newadminAction()   
    {
		

    }
    
    public function deleteuserAction()   
    {
		$userId = $this->_getParam("userId");
		$this->_model->deleteUser($userId);
		
		
		$username = $this->_authService->getIdentity()->username;
        $action = "Delete user #" . $userId;
        $object = $this->_authService->getIdentity()->role;
        $date = new Zend_Date();
        
        $values = array ("user" => $username, "action" => $action, "object" => $object, "date" => $date);
        
        $this->_model->writeLog($values);
		
		
		return $this->_helper->redirector('users');	

    }
    
    
    public function deletefaqAction()   
    {
		$faqId = $this->_getParam("faqId");
		$this->_model->deleteFaq($faqId);
		
		
		$username = $this->_authService->getIdentity()->username;
        $action = "Delete faq #" . $faqId;
        $object = $this->_authService->getIdentity()->role;
        $date = new Zend_Date();
        
        $values = array ("user" => $username, "action" => $action, "object" => $object, "date" => $date);
        
        $this->_model->writeLog($values);
		
		
		
		return $this->_helper->redirector('faq');	

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
    
    
    
    
    
    
	 public function authenticatenewadminAction()
	{        
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->_helper->redirector('newadmin');
        }
        $form = $this->_newAdminForm;
        if (!$form->isValid($request->getPost())) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
        	return $this->render('newadmin');
        }
       
        
        $values = $form->getValues();
        $values ['role'] = "admin";
       	$userId = $this->_model->insertUser($values);
       	
       	
       	$username = $this->_authService->getIdentity()->username;
        $action = "Insert admin #" . $userId;
        $object = $this->_authService->getIdentity()->role;
        $date = new Zend_Date();
        
        $values = array ("user" => $username, "action" => $action, "object" => $object, "date" => $date);
        
        $this->_model->writeLog($values);
       	
       	
  
       
        return $this->_helper->redirector('users');
	}
	
	
	
	
	
	
	    
     public function authenticatenewfaqAction()
	{        
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->_helper->redirector('newfaq');
        }
        $form = $this->_newFaqForm;
        if (!$form->isValid($request->getPost())) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
        	return $this->render('newfaq');
        }
       
        
        $values = $form->getValues();
        
        $faqId = $this->_model->insertFaq($values);

       	
       	
       	$username = $this->_authService->getIdentity()->username;
        $action = "Insert faq #" . $faqId;
        $object = $this->_authService->getIdentity()->role;
        $date = new Zend_Date();
        
        $values = array ("user" => $username, "action" => $action, "object" => $object, "date" => $date);
        
        $this->_model->writeLog($values);
        

        
        return $this->_helper->redirector('faq');
	}
    
    
    public function newfaqAction() {
		
		
		
	}
    
	
	
	
	
	
	
	
    
    
     public function authenticateupdatefaqAction()
	{        
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->_helper->redirector('updatefaq');
        }
        $form = $this->_updateFaqForm;
        if (!$form->isValid($request->getPost())) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
        	return $this->render('updatefaq');
        }
       
        
        $values = $form->getValues();
        
        $this->_model->updateFaq($values, $this->getParam("faqId"));
        
        
        
        $username = $this->_authService->getIdentity()->username;
        $action = "Update faq #" . $this->getParam("faqId");
        $object = $this->_authService->getIdentity()->role;
        $date = new Zend_Date();
        
        $values = array ("user" => $username, "action" => $action, "object" => $object, "date" => $date);
        
        $this->_model->writeLog($values);
        

        
        
        return $this->_helper->redirector('faq');
	}
    
    
    
    
    
    
    
    
     private function createUpdateFaqForm()
    {
		
    	$urlHelper = $this->_helper->getHelper('url'); 
	    $this->_updateFaqForm = new Application_Form_Admin_Updatefaq();
    	$this->_updateFaqForm->setAction($urlHelper->url(array(          
			'controller' => 'admin',
			'action' => 'authenticateupdatefaq'),
			'default'
		)); 
		return $this->_updateFaqForm;
    }   

    
    
    
    
    
    
    
    
    private function createNewFaqForm()
    {
		
    	$urlHelper = $this->_helper->getHelper('url'); 
	    $this->_newFaqForm = new Application_Form_Admin_Newfaq();
    	$this->_newFaqForm->setAction($urlHelper->url(array(          
			'controller' => 'admin',
			'action' => 'authenticatenewfaq'),
			'default'
		)); 
		return $this->_newFaqForm;
    }   

    
    
    
    
    
    
    
    
    
    
    private function createNewAdminForm()
    {
		
    	$urlHelper = $this->_helper->getHelper('url'); 
	    $this->_newAdminForm = new Application_Form_Admin_Registration();
    	$this->_newAdminForm->setAction($urlHelper->url(array(          
			'controller' => 'admin',
			'action' => 'authenticatenewadmin'),
			'default'
		)); 
		return $this->_newAdminForm;
    }   



    public function faqAction() {
		
		$faqList = $this->_model->getFaqList();
		
		$this->view->faqList = $faqList;
		
	}
    
     public function updatefaqAction() {
		
		$faqId = $this->_getParam("faqId");
		$faq = $this->_model->getFaq($faqId)[0];
		
		$this->_updateFaqForm->question->setValue($faq->question);
		$this->_updateFaqForm->answer->setValue($faq->answer);
	

	}
	
	
	public function clearlogsAction() {
		
		$this->_model->clearLogs();
		return $this->_helper->redirector('index');
		
	}
    


}

