<?php

namespace Magazinepublish\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;

class MagazinepublishTable extends AbstractTableGateway {

    protected $table = 'magazinepublish';

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Magazinepublish());

        $this->initialize();
    }

    public function fetchAll(Select $select = null) {
        if (null === $select)
            $select = new Select();
        $select->from($this->table);
        $resultSet = $this->selectWith($select);
        $resultSet->buffer();
        return $resultSet;
    }

    public function getMagazinepublish($id) {
        $id = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveMagazinepublish(Magazinepublish $magazinepublish) {
        $data = array(
        	'title' => $magazinepublish->title,
            'descriptionkey' => $magazinepublish->descriptionkey,
        	'imgkey' => 'magazineimage/'.$magazinepublish->imgkey,
        	'idmzalbum' => $magazinepublish->idmzalbum,
        	'password'=>$magazinepublish->password,
        );

        $id = (int) $magazinepublish->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getMagazinepublish($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteMagazinepublish($id) {
        $this->delete(array('id' => $id));
    }

}
