<?php

namespace Mzimage\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;

class MzimageTable extends AbstractTableGateway {
	protected $table = 'mzimg';
	public function __construct(Adapter $adapter) {
		$this->adapter = $adapter;
		$this->resultSetPrototype = new ResultSet ();
		$this->resultSetPrototype->setArrayObjectPrototype ( new Mzimage () );
		
		$this->initialize ();
	}
	public function fetchAll(Select $select = null) {
		if (null === $select)
			$select = new Select ();
		$select->from ( $this->table );
		$resultSet = $this->selectWith ( $select );
		$resultSet->buffer ();
		return $resultSet;
	}
	public function getMzimage($id) {
		$id = ( int ) $id;
		$rowset = $this->select ( array (
				'id' => $id 
		) );
		
		$row = $rowset->current ();
		if (! $row) {
			throw new \Exception ( "Could not find row $id" );
		}
		return $row;
	}
	public function getrestMzimage($id) {
		$id = ( int ) $id;
		// $rowset = $this->select(array('id' => $id));
		
		// $row = $rowset->current();
		// if (!$row) {
		// throw new \Exception("Could not find row $id");
		// }
		// return $row;
		$sql = new Sql ( $this->adapter );
		$select = $sql->select ();
		// $select->columns(array('id'=>'id','title'=>'title','descriptionkey'=>'descriptionkey','imgkey'=>'imgkey'));
		$select->columns ( array () );
		$select->from ( 'magazinepublish' )->join ( 'mzimage', 'mzimg.id=magazinepublish.id', array (
				'id' => 'id',
				'img' => 'imgkey',
				'description' => 'descriptionkey' 
		) );
		$select->where ( array (
				'magazinepublish.id' => $id 
		) );
		
		$selectString = $sql->prepareStatementForSqlObject ( $select );
		$results = $selectString->execute ();
		
		// swap
		$array = array ();
		foreach ( $results as $result ) {
			$tmp = array ();
			$tmp = $result;
			$array [] = $tmp;
		}
		
		return $array;
	}
	public function saveMzimage(Mzimage $mzimage) {
		$data = array (
				'img' => $mzimage->img,
				'description' => $mzimage->description 
		);
		
		$id = ( int ) $mzimage->idmzimg;
		if ($id == 0) {
			$this->insert ( $data );
		} else {
			if ($this->getMzimage ( $id )) {
				$this->update ( $data, array (
						'idmzimg' => $id 
				) );
			} else {
				throw new \Exception ( 'Form id does not exist' );
			}
		}
	}
	public function deleteMzimage($id) {
		$this->delete ( array (
				'id' => $id 
		) );
	}
}

