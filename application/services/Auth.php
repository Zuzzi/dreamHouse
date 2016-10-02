<?php

// ATTENZIONE: self-documenting code!

class Application_Service_Auth
{
    protected $_databaseModel;
    protected $_auth;

    public function __construct()
    {
        $this->_databaseModel = new Application_Model_Model();
    }
    
    public function authenticate($credentials)
    {
        $adapter = $this->getAuthAdapter($credentials);
        $auth    = $this->getAuth();
        $result  = $auth->authenticate($adapter);

        if (!$result->isValid()) {
            return false;
        }
        $user = $this->_databaseModel->getUserByName($credentials['username']);
        $auth->getStorage()->write($user);
        return true;
    }
    
    public function getAuth()
    {
        if (null === $this->_auth) {
            $this->_auth = Zend_Auth::getInstance();
        }
        return $this->_auth;
    }
   
    public function getIdentity()
    {
        $auth = $this->getAuth();
        if ($auth->hasIdentity()) {
            return $auth->getIdentity();
        }
        return false;
    }
    
    public function clear()
    {
        $this->getAuth()->clearIdentity();
    }
    
    public function getAuthAdapter($values)
    {
		$authAdapter = new Zend_Auth_Adapter_DbTable(
			Zend_Db_Table_Abstract::getDefaultAdapter(),
			'users',
			'username',
			'password'
		);
		$authAdapter->setIdentity($values['username']);
		$authAdapter->setCredential($values['password']);
        return $authAdapter;
    }
}
