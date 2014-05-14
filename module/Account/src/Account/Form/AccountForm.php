<?php
namespace Account\Form;

use Zend\Form\Form;

class AccountForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('account');

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'accountname',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'User Name',
            ),
        ));

        $this->add(array(
            'name' => 'sexual',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Sexual',
            ),
        ));
        
        $this->add(array(
        		'name' => 'accpass',
        		'attributes' => array(
        				'type'  => 'password',
        		),
        		'options' => array(
        				'label' => 'Password',
        		),
        ));
        $this->add(array(
        		'name' => 'address',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Address',
        		),
        ));
        $this->add(array(
        		'name' => 'email',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Email',
        		),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

    }
}
