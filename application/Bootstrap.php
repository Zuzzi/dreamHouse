<?php

// ATTENZIONE: self-documenting code!

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected $_logger;
	protected $_view;

	protected function _initLogging()
    {
        $logger = new Zend_Log();
        $writer = new Zend_Log_Writer_Firebug();
        $logger->addWriter($writer);

        Zend_Registry::set('log', $logger);
        
        $this->_logger = $logger;
    	$this->_logger->info('Bootstrap ' . __METHOD__);
    }

    protected function _initRequest()
	// Aggiunge un'istanza di Zend_Controller_Request_Http nel Front_Controller
	// che permette di utilizzare l'helper baseUrl() nel Bootstrap.php
    {
        $this->bootstrap('FrontController');
        $front = $this->getResource('FrontController');
        $request = new Zend_Controller_Request_Http();
        $front->setRequest($request);
    }

    protected function _initViewSettings()
    {
        $this->bootstrap('view');
        $this->_view = $this->getResource('view');
        $this->_view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8');
        $this->_view->headMeta()->appendHttpEquiv('Content-Language', 'it-IT');
        
        $this->_view->headLink()->appendStylesheet($this->_view->baseUrl('css/bootstrap.css'));
        $this->_view->headLink()->appendStylesheet($this->_view->baseUrl('css/bootstrap.min.css'));
        $this->_view->headLink()->appendStylesheet($this->_view->baseUrl('css/business-casual.css'));
        $this->_view->headLink()->appendStylesheet($this->_view->baseUrl('css/style.css'));
        
        $this->_view->headScript()->appendFile($this->_view->baseUrl('js/jquery.js'));
        $this->_view->headScript()->appendFile($this->_view->baseUrl('js/scriptLibrary.js'));
        $this->_view->headScript()->appendFile($this->_view->baseUrl('js/bootstrap.min.js'));
        $this->_view->headScript()->appendFile($this->_view->baseUrl('js/bootstrap.js'));
        $this->_view->headTitle('Dream House Ltd.');
    }
    
  
  
  
  
   protected function _initDefaultModuleAutoloader()
    {
    	$loader = Zend_Loader_Autoloader::getInstance();
		$loader->registerNamespace('App_');
        $this->getResourceLoader()
             ->addResourceType('modelResource','models/resources','Resource');  
    }


    protected function _initFrontControllerPlugin()
    {
    	$front = Zend_Controller_Front::getInstance();
    	$front->registerPlugin(new App_Controller_Plugin_Acl());
    }
    

   

    
    
    
}
