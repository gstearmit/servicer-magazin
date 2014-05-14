<?php
// namespace Aupload\Controller;

// use Zend\Mvc\Controller\AbstractActionController;
// use Zend\View\Model\ViewModel;
// use Zend\Db\Sql\Select;
// use Zend\Paginator\Paginator;
// use Zend\Paginator\Adapter\Iterator as paginatorIterator;
// use Aupload\Model\Aupload;
// use Aupload\Form\AuploadForm;
// use Zend\Validator\File\Size;

// class AuploadController extends AbstractActionController
// {
// 	public function indexAction() {
	 
	 
	 
// 	        $select = new Select();
	
// 	        $order_by = $this->params()->fromRoute('order_by') ?
// 	                $this->params()->fromRoute('order_by') : 'id';
// 	        $order = $this->params()->fromRoute('order') ?
// 	                $this->params()->fromRoute('order') : Select::ORDER_ASCENDING;
// 	        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;
	
// 	        $aupload = $this->getAuploadTable()->fetchAll($select->order($order_by . ' ' . $order));
// 	        $itemsPerPage = 350;        // is Number record/page
	
// 	        $aupload->current();
// 	        $paginator = new Paginator(new paginatorIterator($aupload));
// 	        $paginator->setCurrentPageNumber($page)
// 	                ->setItemCountPerPage($itemsPerPage)
// 	                ->setPageRange(4);  // is number page want view
	
// 	        return new ViewModel(array(
// 	                    'order_by' => $order_by,
// 	                    'order' => $order,
// 	                    'page' => $page,
// 	                    'paginator' => $paginator,
// 	                ));
// 	    }
// // 	    public function addAction() {
	    	 
// // 	    	$form = new AuploadForm(); // include Form Class
// // 	    	$form->get('submit')->setValue('Add');	    
// // 	    	$request = $this->getRequest();
// // 	       	if ($request->isPost()) {	    		 
// // 	    		$aupload = new Aupload();
// // 	    		/*
// // 	    		 echo '<pre>';
// // 	    		print_r($request->getPost());
// // 	    		echo '</pre>';
// // 	    		die();
	    		 
// // 	    		echo '<pre>';
// // 	    		print_r($form->getData());
// // 	    		echo '</pre>';
// // 	    		die();
// // 	    		*/
// //     		$form->setInputFilter($aupload->getInputFilter());  // ?
// // 	    		$form->setData($request->getPost());  // get all post
// // 	    		if ($form->isValid()) {
// // 	    			$aupload->exchangeArray($form->getData());
// // 	    			$this->getaAuploadTable()->saveAupload($aupload);
// // 	    			// Redirect to list of Aupload
// // 	    			return $this->redirect()->toRoute('aupload');
// // 	    		}
// // 	    	}
	    
// // 	    	return array('form' => $form);
// // 	    }
	     
// 	public function addAction()
// 	{
// 		$form = new AuploadForm();
// 		$request = $this->getRequest();
// 		if ($request->isPost()) {
			 
// 			$aupload = new Aupload();
// 			$form->setInputFilter($aupload->getInputFilter());
			 
// 			$nonFile = $request->getPost()->toArray();
// 			$File    = $this->params()->fromFiles('fileupload');
// 			$data = array_merge(
// 					$nonFile,
// 					array('fileupload'=> $File['name'])
// 			);
// 			//set data post and file ...
// 			$form->setData($data);

// 			if ($form->isValid()) {
				 
// 				$size = new Size(array('min'=>20000)); //minimum bytes filesize
				 
// 				$adapter = new \Zend\File\Transfer\Adapter\Http();
// 				$adapter->setValidators(array($size), $File['name']);
// 				if (!$adapter->isValid()){
// 					$dataError = $adapter->getMessages();
// 					$error = array();
// 					foreach($dataError as $key=>$row)
// 					{
// 						$error[] = $row;
// 					}
// 					$form->setMessages(array('fileupload'=>$error ));
// 				} else {
// 					$adapter->setDestination(dirname(__DIR__).'/assets');
// 					if ($adapter->receive($File['name'])) {
// 						$arr=$aupload->exchangeArray($form->getData());
// 						echo 'File Name '.$aupload->auploadname.'magazineimage'.$aupload->fileupload;
// 					}
// 				}
// 			}
// 		}

// 		return array('form' => $form);
// 	}
// 	    public function deleteAction()
// 	    {
// 	        $id = (int)$this->params('id');
// 	        if (!$id) {
// 	            return $this->redirect()->toRoute('aupload');
// 	        }
	
// 	        $request = $this->getRequest();
// 	        if ($request->isPost()) {
// 	            $del = $request->getPost()->get('del', 'No');
// 	            if ($del == 'Yes') {
// 	                $id = (int)$request->getPost()->get('id');
// 	                $this->getAuploadTable()->deleteAupload($id);
// 	            }
	
// 	            // Redirect to list of auploads
// 	            return $this->redirect()->toRoute('aupload');
// 	        }
	
// 	        return array(
// 	            'id' => $id,
// 	            'aupload' => $this->getAuploadTable()->getAupload($id)
// 	        );
// 	    }
// 	    public function getAuploadTable()
// 	    {
// 	        if (!$this->auploadTable) {
// 	            $sm = $this->getServiceLocator();
// 	            $this->auploadTable = $sm->get('Aupload\Model\AuploadTable');
// 	        }
// 	        return $this->auploadTable;
// 	    }
// }














namespace Aupload\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Aupload\Model\Aupload;
use Aupload\Form\AuploadForm;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;
use Zend\Db\Sql\Select;

class AuploadController extends AbstractActionController
{
    protected $auploadTable;
	
    /*
    public function indexAction()
    {
        return new ViewModel(array(
            'auploads' => $this->getAuploadTable()->fetchAll(),
        ));
    }
    */
    
public function indexAction() {
    	
    	
    	
        $select = new Select();

        $order_by = $this->params()->fromRoute('order_by') ?
                $this->params()->fromRoute('order_by') : 'id';
        $order = $this->params()->fromRoute('order') ?
                $this->params()->fromRoute('order') : Select::ORDER_ASCENDING;
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;

        $aupload = $this->getAuploadTable()->fetchAll($select->order($order_by . ' ' . $order));
        $itemsPerPage = 350;        // is Number record/page

        $aupload->current();
        $paginator = new Paginator(new paginatorIterator($aupload));
        $paginator->setCurrentPageNumber($page)
                ->setItemCountPerPage($itemsPerPage)
                ->setPageRange(4);  // is number page want view

        return new ViewModel(array(
                    'order_by' => $order_by,
                    'order' => $order,
                    'page' => $page,
                    'paginator' => $paginator,
                ));
    }

public function addAction()
    {
        $form = new AuploadForm();
        $form->get('submit')->setValue('Go');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $aupload = new Aupload();
            $form->setInputFilter($aupload->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $aupload->exchangeArray($form->getData());
                $this->getAuploadTable()->saveAupload($aupload);

                // Redirect to list of albums
                return $this->redirect()->toRoute('aupload');
            }
        }

        return array('form' => $form);
    }

	public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('aupload', array('action'=>'add'));
        }
        $aupload = $this->getAuploadTable()->getAupload($id);

        $form = new AuploadForm();
        $form->bind($aupload);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getAuploadTable()->saveAupload($aupload);

                // Redirect to list of albums
                return $this->redirect()->toRoute('aupload');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('aupload');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost()->get('del', 'No');
            if ($del == 'Yes') {
                $id = (int)$request->getPost()->get('id');
                $this->getAuploadTable()->deleteAupload($id);
            }

            // Redirect to list of auploads
            return $this->redirect()->toRoute('aupload');
        }

        return array(
            'id' => $id,
            'aupload' => $this->getAuploadTable()->getAupload($id)
        );
    }

    public function getAuploadTable()
    {
        if (!$this->auploadTable) {
            $sm = $this->getServiceLocator();
            $this->auploadTable = $sm->get('Aupload\Model\AuploadTable');
        }
        return $this->auploadTable;
    }    
}
