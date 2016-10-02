<?php


// ATTENZIONE: self-documenting code!

class Application_Form_Admin_Newfaq extends App_Form_Abstract
{
	
    
    public function init()
    {
    	
        $this->setMethod('post');
        $this->setName('newFaq');
        $this->setAction('');
        $this->setAttrib('enctype', 'multipart/form-data');

        $this->addElement('textarea', 'question', array(
            'label' => 'Question',
	        'cols' => '70', 'rows' => '7',
            'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array(array('StringLength',true)),
            'decorators' => $this->elementDecorators,
        ));

        $this->addElement('textarea', 'answer', array(
            'label' => 'Answer',
	    'cols' => '70', 'rows' => '7',
            'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array(array('StringLength',true)),
            'decorators' => $this->elementDecorators,
        ));


        $this->addElement('submit', 'add', array(
            'label' => 'Insert',
        	'decorators' => $this->buttonDecorators,
        ));
        
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table')),
        	array('Description', array('placement' => 'prepend', 'class' => 'formerror')),
            'Form'
        ));
       
   }
}
