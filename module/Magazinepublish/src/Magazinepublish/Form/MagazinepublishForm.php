<?php
namespace Magazinepublish\Form;

use Zend\Form\Form;

class MagazinepublishForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('magazinepublish');

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
        		'name' => 'title',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Title',
        		),
        ));
        
        $this->add(array(
            'name' => 'descriptionkey',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Description',
            ),
        ));

        
        $this->add(array(
        		'name' => 'imgkey',
        		'attributes' => array(
        				'type'  => 'file',
        		),
        		'options' => array(
        				'label' => 'Thumbnail',
        		),
        ));
        
        /*$this->add(array(
        		'name' => 'imgkeytest',
        		'attributes' => array(
        				'type'  => 'file',
        		),
        		'options' => array(
        				'label' => 'Avatar',
        		),
        ));*/               
        
        $this->add(array(
        		'name' => 'idmzalbum',
        		'attributes' => array(
        				'type'  => 'hidden',
        		),
        ));
        
        $this->add(array(
        		'name' => 'password',
        		'attributes' => array(
        				'type'  => 'password',
        		),
        		'options' => array(
        				'label' => 'Password',
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
