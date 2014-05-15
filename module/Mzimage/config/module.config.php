<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Mzimage\Controller\Mzimage' => 'Mzimage\Controller\MzimageController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'mzimage' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/mzimage[/:action][/:id][/page/:page][/order_by/:order_by][/:order]',
                    'constraints' => array(
                        'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                        'page' => '[0-9]+',
                        'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'order' => 'ASC|DESC',
                    ),
                    'defaults' => array(
                        'controller' => 'Mzimage\Controller\Mzimage',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'mzimage' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            'page-imzimg' => __DIR__ . '/../view/layout/slidePaginator.phtml',
        ),
    ),
);
