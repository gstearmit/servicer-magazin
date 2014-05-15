<?php

namespace Mzimage\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Mzimage implements InputFilterAwareInterface
{
    public $id;
    public $idmzimg;
    public $img;
    public $description;

    protected $inputFilter;

    /**
     * Used by ResultSet to pass each database row to the entity
     */
    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->idmzimg = (isset($data['idmzimg'])) ? $data['idmzimg'] : null;
        $this->img = (isset($data['img'])) ? $data['img'] : null;
        $this->description  = (isset($data['description'])) ? $data['description'] : null;
     
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
                       
                        $inputFilter->add($factory->createInput(array(
                'name'     => 'idmzimg',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
           

            $inputFilter->add($factory->createInput(array(
                'name'     => 'img',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
           
                        $inputFilter->add($factory->createInput(array(
                        'name'     => 'description',
                        'required' => true,
                        'filters'  => array(
                                        array('name' => 'StripTags'),
                                        array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                                        array(
                                                        'name'    => 'StringLength',
                                                        'options' => array(
                                                                        'encoding' => 'UTF-8',
                                                                        'min'      => 1,
                                                                        'max'      => 100,
                                                        ),
                                        ),
                        ),
            )));
            $this->inputFilter = $inputFilter;        
        }

        return $this->inputFilter;
    }
}