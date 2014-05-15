<?php

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
?>
