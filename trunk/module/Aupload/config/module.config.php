<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Aupload\Controller\Aupload' => 'Aupload\Controller\AuploadController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'aupload' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/aupload[/:action][/:id][/page/:page][/order_by/:order_by][/:order]',
                    'constraints' => array(
                        'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                        'page' => '[0-9]+',
                        'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'order' => 'ASC|DESC',
                    ),
                    'defaults' => array(
                        'controller' => 'Aupload\Controller\Aupload',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'aupload' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            'paginator-slide' => __DIR__ . '/../view/layout/slidePaginator.phtml',
        ),
    ),
);