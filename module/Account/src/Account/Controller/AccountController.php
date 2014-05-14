<?php

namespace Account\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Account\Model\Account;
use Account\Form\AccountForm;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;
use Zend\Db\Sql\Select;

class AccountController extends AbstractActionController
{
    protected $accountTable;
	
    /*
    public function indexAction()
    {
        return new ViewModel(array(
            'accounts' => $this->getAccountTable()->fetchAll(),
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

        $account = $this->getAccountTable()->fetchAll($select->order($order_by . ' ' . $order));
        $itemsPerPage = 350;        // is Number record/page

        $account->current();
        $paginator = new Paginator(new paginatorIterator($account));
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
        $form = new AccountForm();
        $form->get('submit')->setValue('Go');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $account = new Account();
            $form->setInputFilter($account->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $account->exchangeArray($form->getData());
                $this->getAccountTable()->saveAccount($account);

                // Redirect to list of albums
                return $this->redirect()->toRoute('account');
            }
        }

        return array('form' => $form);
    }

public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('account', array('action'=>'add'));
        }
        $account = $this->getAccountTable()->getAccount($id);

        $form = new AccountForm();
        $form->bind($account);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getAccountTable()->saveAccount($account);

                // Redirect to list of albums
                return $this->redirect()->toRoute('account');
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
            return $this->redirect()->toRoute('account');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost()->get('del', 'No');
            if ($del == 'Yes') {
                $id = (int)$request->getPost()->get('id');
                $this->getAccountTable()->deleteAccount($id);
            }

            // Redirect to list of accounts
            return $this->redirect()->toRoute('account');
        }

        return array(
            'id' => $id,
            'account' => $this->getAccountTable()->getAccount($id)
        );
    }

    public function getAccountTable()
    {
        if (!$this->accountTable) {
            $sm = $this->getServiceLocator();
            $this->accountTable = $sm->get('Account\Model\AccountTable');
        }
        return $this->accountTable;
    }    
}
