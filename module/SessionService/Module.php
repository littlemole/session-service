<?php
    namespace SessionService;
     
    class Module
    {
        public function getAutoloaderConfig()
        {
            return array(
                'Zend\Loader\ClassMapAutoloader' => array(
                    __DIR__ . '/autoload_classmap.php',
                ),
                'Zend\Loader\StandardAutoloader' => array(
                    'namespaces' => array(
                        __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                    ),
                ),
            );
        }
     
        public function getConfig()
        {
            return include __DIR__ . '/config/module.config.php';
        }

    public function getServiceConfig() {
        return array(
       
            'factories' => array(
                'SessionService\Cache\Redis' => 'SessionService\Service\Factory\RedisFactory',
                'SessionService\SessionService' => 'SessionService\Service\Factory\SessionServiceFactory',
                'SessionService\AuthenticationService' => 'SessionService\Service\Factory\AuthenticationServiceFactory',
            )
        );
    }




    }


?>
