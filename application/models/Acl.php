<?php

// ATTENZIONE: self-documenting code!
 

class Application_Model_Acl extends Zend_Acl
{
	public function __construct()
	{
		// ACL for default role
		$this->addRole(new Zend_Acl_Role('unregistered'))
			 ->add(new Zend_Acl_Resource('error'))
			 ->add(new Zend_Acl_Resource('index'))
			 ->allow('unregistered', array('error','index'));
			 
			 
		// ACL for owner
		$this->addRole(new Zend_Acl_Role('owner'), 'unregistered')
			 ->add(new Zend_Acl_Resource('owner'))
			 ->allow('owner','owner');
			 
			// ACL for admin
		$this->addRole(new Zend_Acl_Role('admin'), 'unregistered')
			 ->add(new Zend_Acl_Resource('admin'))
			 ->allow('admin','admin');	 
			 
		
	}
}
