<?php 

return array(
		'controllers' => array(
				'invokables' => array(
						'MagazineUpload\Controller\MagazineUpload' => 'MagazineUpload\Controller\UploadFileController',
				),
		),

		'router' => array(
				'routes' => array(
						'aupload' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/upload-pages[/:action][/:id][/page/:page][/order_by/:order_by][/:order]',
										'constraints' => array(
												'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
												'id'     => '[0-9]+',
												'page' => '[0-9]+',
												'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'order' => 'ASC|DESC',
										),
										'defaults' => array(
												'controller' => 'MagazineUpload\Controller\MagazineUpload',
												'action'     => 'index',
										),
								),
						),
				),
		),

		'view_manager' => array(
				'template_path_stack' => array(
						'MagazineUpload' => __DIR__ . '/../view',
				),
				'template_map' => array(
						'paginator-mzup' => __DIR__ . '/../view/layout/slidePaginator.phtml',
				),
		),
);
?>
