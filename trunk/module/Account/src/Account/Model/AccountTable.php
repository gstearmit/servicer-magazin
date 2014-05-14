<?php

namespace Account\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;

class AccountTable extends AbstractTableGateway
{
    protected $table = 'account';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Account());

        $this->initialize();
    }

    /*
    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
    */
    public function fetchAll(Select $select = null) {
    	if (null === $select)
    		$select = new Select();
    	$select->from($this->table);
    	$resultSet = $this->selectWith($select);
    	$resultSet->buffer();
    	return $resultSet;
    }

    public function getAccount($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveAccount(Account $account)
    {
        $data = array(
            'accountname' => $account->accountname,
            'accpass'  => $account->accpass,
        	'sexual'  => $account->sexual,
        	'address'  => $account->address,
        	'email'  => $account->email,

        );

        $id = (int)$account->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getAccount($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
        
    }

    public function deleteAccount($id)
    {
        $this->delete(array('id' => $id));
    }

}
