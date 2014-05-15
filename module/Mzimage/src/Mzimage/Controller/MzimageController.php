<?php

namespace Mzimage\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Mzimage\Model\Mzimage;
use Mzimage\Form\MzimageForm;
use Zend\Db\Sql\Select;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;

class MzimageController extends AbstractActionController {

    protected $mzimageTable;

    public function indexAction() {
        // check login
//         if (!$this->zfcUserAuthentication()->hasIdentity()) {
//                 return $this->redirect()->toRoute('zfcuser/login');
//         }
       
       
        $select = new Select();

        $order_by = $this->params()->fromRoute('order_by') ?
                $this->params()->fromRoute('order_by') : 'id';
        $order = $this->params()->fromRoute('order') ?
                $this->params()->fromRoute('order') : Select::ORDER_ASCENDING;
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;

        $mzimages = $this->getMzimageTable()->fetchAll($select->order($order_by . ' ' . $order));
        $itemsPerPage = 5;        // is Number record/page

        $mzimages->current();
        $paginator = new Paginator(new paginatorIterator($mzimages));
        $paginator->setCurrentPageNumber($page)
                ->setItemCountPerPage($itemsPerPage)
                ->setPageRange(4);  // is number page want view

        return new ViewModel(array(
                    'order_by' => $order_by,
                    'order' => $order,
                    'page' => $page,
                    'paginatorimg' => $paginator,
                ));
    }

    public function addAction() {
       
        $form = new MzimageForm(); // include Form Class
        $form->get('submit')->setAttribute('value', 'Add');
       
        $request = $this->getRequest();
       
        if ($request->isPost()) {
               
            $mzimage = new Mzimage();

            $form->setInputFilter($mzimage->getInputFilter());  // check validate
           
            $form->setData($request->getPost());  // get all post
           
            $data = array_merge_recursive(
                        $this->getRequest()->getPost()->toArray(),
                        $this->getRequest()->getFiles()->toArray()
            );
           
           // var_dump($data);die;
           
            if ($form->isValid()) {
                $mzimage->exchangeArray($form->getData());
                $this->getMzimageTable()->saveMzimage($mzimage);
                // Redirect to list of Mzimages
                return $this->redirect()->toRoute('mzimage');
            }
        }

        return array('form' => $form);
    }

    public function editAction() {
        $id = (int) $this->params('mzimg.id');
//         var_dump($id);
//         die;
        if (!$id) {
            return $this->redirect()->toRoute('mzimage', array('action' => 'add'));
        }
        $mzimage = $this->getMzimageTable()->getMzimage($id);

        $form = new MzimageForm();
        $form->bind($mzimage);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getMzimageTable()->saveMzimage($mzimage);

                // Redirect to list of Mzimages
                return $this->redirect()->toRoute('mzimage');
            }
        }

        return array(
            'mzimg.id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction() {
        $id = (int) $this->params('idmzimg');
        if (!$id) {
            return $this->redirect()->toRoute('mzimage');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost()->get('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost()->get('id');
                $this->getMzimageTable()->deleteMzimage($id);
            }

            // Redirect to list of Mzimages
            return $this->redirect()->toRoute('mzimage');
        }

        return array(
            'idmzimg' => $id,
            'mzimage' => $this->getMzimageTable()->getMzimage($id)
        );
    }

    public function getMzimageTable() {
        if (!$this->mzimageTable) {
            $sm = $this->getServiceLocator();
            $this->mzimageTable = $sm->get('Mzimage\Model\MzimageTable');
        }
        return $this->mzimageTable;
    }

}
