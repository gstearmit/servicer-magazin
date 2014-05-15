<?php
namespace MagazineUpload\Controller;
use MagazineUpload\Form;
use MagazineUpload\InputFilter;
use Zend\Debug\Debug;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

class UploadFile extends AbstractActionControlle
{
	public function indexAction()
	{
		// action body
		$form = new FileUpload();
		$request = $this->getRequest();
		$this->view->form = $form;
		if ($request->isPost())
		{
			//normal submit..
			if ($form->isValid($_POST))
			{
				//determine filename and extension
				$info = pathinfo($form->file1->getFileName(null,false));
				$filename = $info['filename'];
				$ext = $info['extension']?".".$info['extension']:"";
				//filter for renaming.. prepend with current time
				$form->file1->addFilter(new Zend_Filter_File_Rename(array(
						"target"=>time().$filename.$ext,
						"overwrite"=>true)));
				$form->getValue('file1');
			}
		}
	}
	public function addAction()
	{
		$form = new FileUpload();
		$request = $this->getRequest();
		if ($request->isPost()) {
			 
			$profile = new Profile();
			$form->setInputFilter($profile->getInputFilter());
			 
			$nonFile = $request->getPost()->toArray();
			$File    = $this->params()->fromFiles('fileupload');
			$data = array_merge(
					$nonFile,
					array('fileupload'=> $File['name'])
			);
			//set data post and file ...
			$form->setData($data);
	
			if ($form->isValid()) {
				 
				$size = new Size(array('min'=>2000000)); //minimum bytes filesize
				 
				$adapter = new \Zend\File\Transfer\Adapter\Http();
				$adapter->setValidators(array($size), $File['name']);
				if (!$adapter->isValid()){
					$dataError = $adapter->getMessages();
					$error = array();
					foreach($dataError as $key=>$row)
					{
						$error[] = $row;
					}
					$form->setMessages(array('fileupload'=>$error ));
				} else {
					$adapter->setDestination(dirname(__DIR__).'/assets');
					if ($adapter->receive($File['name'])) {
						$profile->exchangeArray($form->getData());
						echo 'Profile Name '.$profile->profilename.' upload '.$profile->fileupload;
					}
				}
			}
		}
	
		return array('form' => $form);
	}
}