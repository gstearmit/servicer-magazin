<?php
namespace Aupload\Form;

use Zend\Form\Form;

class AuploadForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('aupload');

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'auploadname',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'File Name',
            ),
        ));

        $this->add(array(
            'name' => 'fileupload',
            'attributes' => array(
                'type'  => 'file',
            ),
            'options' => array(
                'label' => 'File Upload',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                 'id' => 'submitbutton',
            ),
        ));

    }
}
