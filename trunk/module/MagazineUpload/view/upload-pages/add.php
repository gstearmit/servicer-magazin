<?php
$form = $this->form;
$form->setAttribute('action',
		$this->url('MagazineUpload/upload-pages', //your route name ...
				array('controller'=>'upload', 'action' => 'add')));
$form->prepare();

echo $this->form()->openTag($form);
echo $this->formRow($form->get('accountname'));

echo $this->formRow($form->get('fileupload'));

echo $this->formSubmit($form->get('submit'));
echo $this->form()->closeTag();
