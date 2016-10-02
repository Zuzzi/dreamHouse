<?php


// ATTENZIONE: self-documenting code!

class IndexController extends Zend_Controller_Action
{
   protected $_model;
   protected $_loginForm;
   protected $_registrationForm;
   protected $_authService; 


    public function init()
    {
		 $this->_model = new Application_Model_Model();
		 $this->_authService = new Application_Service_Auth();
		 
		 $this->view->loginForm = $this->createLoginForm();
		 $this->view->registrationForm = $this->createRegistrationForm();
         
         $layout =  $this->_authService->getIdentity() == false? 'main' : $this->_authService->getIdentity()->role;
         $this->_helper->layout->setLayout($layout);
    }



    public function indexAction()   
    {
		

    }
    
    
     public function catalogAction()   
    {
		$maxPrice = $this->_getParam('maxPrice');
		$catalogHouseSize = $this->_getParam('size');
		$citySelected = $this->_getParam('city');

		
		$housesListForSelect = $this->_model->getHousesList();
		
		if ((is_null($maxPrice) || $maxPrice == "") && $catalogHouseSize == "any" && $citySelected == "any") {
			
			$housesList = $this->_model->getHousesList();
		}
			
			
		
		
		
		else {
			$housesList = $this->_model->searchHouses($maxPrice, $catalogHouseSize, $citySelected);
		}
			

		
		
		$this->view->housesList = $housesList;
		$this->view->housesListForSelect = $housesListForSelect;

    }
    
    
     public function infohouseAction()   
    {
		$houseId = $this->_getParam('houseId');
		$house = $this->_model->getHouse($houseId);

		$this->view->house = $house[0];
		

    }
    
    
    
    
    
    
     public function faqAction()   
    {
		
		$faqList = $this->_model->getFaqList();
		$this->view->faqList = $faqList;

    }
    
    
     public function loginAction()   
    {
		$registration = $this->_getParam('registration');
		$this->view->registration = $registration;

    }
    
    
    
    
     public function authenticateloginAction()
	{        
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->_helper->redirector('login');
        }
        $form = $this->_loginForm;
        if (!$form->isValid($request->getPost())) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
        	return $this->render('login');
        }
        if (false === $this->_authService->authenticate($form->getValues())) {
            $form->setDescription('Autenticazione fallita. Riprova');
            return $this->render('login');
        }
        
        $username = $this->_authService->getIdentity()->username;
        $action = "Log-in";
        $object = $this->_authService->getIdentity()->role;
        $date = new Zend_Date();
        
        $values = array ("user" => $username, "action" => $action, "object" => $object, "date" => $date);
        
        $this->_model->writeLog($values);
        
        
        return $this->_helper->redirector('index', $this->_authService->getIdentity()->role);
	}
	
	
	 public function authenticateregistrationAction()
	{        
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->_helper->redirector('login');
        }
        $form = $this->_registrationForm;
        if (!$form->isValid($request->getPost())) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
        	return $this->render('login');
        }
       
        
         $values = $form->getValues();
        
        
        $values ['role'] = "owner";
       	$userId = $this->_model->insertUser($values);
        

       	
       	
       	$username = "Anonymous";
        $action = "Registration user #" . $userId;
        $object = "public";
        $date = new Zend_Date();
        
        $values = array ("user" => $username, "action" => $action, "object" => $object, "date" => $date);
        
        $this->_model->writeLog($values);
        
        
        
        
         
       
        return $this->_helper->redirector('login');
	}
    
    
	

	
	
	
	
    
    
    
     private function createRegistrationForm()
    {
    	$urlHelper = $this->_helper->getHelper('url'); 
	    $this->_registrationForm = new Application_Form_Index_Registration();
    	$this->_registrationForm->setAction($urlHelper->url(array(          
			'controller' => 'index',
			'action' => 'authenticateRegistration'),
			'default'
		)); 
		return $this->_registrationForm;
    }   

    
    
    
    
    
    
    
    
    private function createLoginForm()
    {
    	$urlHelper = $this->_helper->getHelper('url'); 
	    $this->_loginForm = new Application_Form_Index_Login();
    	$this->_loginForm->setAction($urlHelper->url(array(          
			'controller' => 'index',
			'action' => 'authenticatelogin'),
			'default'
		)); 
		return $this->_loginForm;
    }   




   




}

