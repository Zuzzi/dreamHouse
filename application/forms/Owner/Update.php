<?php

class Application_Form_Owner_Update extends App_Form_Abstract
{
	public function init()
    {               
        $this->setMethod('post');
        $this->setName('update');
        $this->setAction('');
    	
    	
    	
    	
    	$this->addElement('text', 'location', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 25))
            ),
            'required'   => true,
            'label'      => 'Location',
            'decorators' => $this->elementDecorators,
            ));
            
            
            
        $this->addElement('text', 'price', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 30))
            ),
            'required'   => true,
            'label'      => 'Price',
            'decorators' => $this->elementDecorators,
            ));
            
            
       $this->addElement('text', 'sq_ft', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 30))
            ),
            'required'   => true,
            'label'      => 'Sq Ft',
            'decorators' => $this->elementDecorators,
            ));
            
            
            
       $this->addElement('textarea', 'description', array(
            'label' => 'Description',
        	'cols' => '30', 'rows' => '10',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength',true, array(1,1000))),
            'decorators' => $this->elementDecorators,
        ));
        
        
            
       $this->addElement('file', 'picture1', array(
        	'label' => 'Picture 1',
        	'destination' => APPLICATION_PATH . '/../public/img',
            'decorators' => $this->fileDecorators,
        			));   
        			
        			
       $this->addElement('file', 'picture2', array(
        	'label' => 'Picture 2',
        	'destination' => APPLICATION_PATH . '/../public/img',
            'decorators' => $this->fileDecorators,
        			));			
        			
        			  
       $this->addElement('file', 'picture3', array(
        	'label' => 'Picture 3',
        	'destination' => APPLICATION_PATH . '/../public/img',
            'decorators' => $this->fileDecorators,
        			));       
            
            

        $this->addElement('submit', 'updateButton', array(
            'label'    => 'Update',
            'decorators' => $this->buttonDecorators,
        ));

        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table', 'class' => 'zend_form')),
        	array('Description', array('placement' => 'prepend', 'class' => 'formerror')),
            'Form'
        ));
    }
}
