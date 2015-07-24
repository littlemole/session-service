<?php
    return array(
        'controllers' => array(
            'invokables' => array(
                'SessionService\Controller\SessionRest' => 'SessionService\Controller\SessionRestController',
            ),
        ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'session' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/session[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9a-zA-Z]+',
                    ),
                    'defaults' => array(
                        'controller' => 'SessionService\Controller\SessionRest',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);


?>

