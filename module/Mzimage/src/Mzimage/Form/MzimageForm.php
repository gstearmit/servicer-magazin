<?php
namespace Mzimage\Form;

use Zend\Form\Form;

class MzimageForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('mzimage');

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

       $this->add(array(
           'name' => 'idmzimg',
           'attributes' => array(
               'type'  => 'hidden',
           ),
       ));

        $this->add(array(
            'name' => 'img',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Thumbnail',
            ),
        ));
       
        $this->add(array(
                        'name' => 'description',
                        'attributes' => array(
                                        'type'  => 'text',
                        ),
                        'options' => array(
                                        'label' => 'Description',
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