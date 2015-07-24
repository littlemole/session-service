<?php
namespace SessionService\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Cache\Storage\Adapter\RedisOptions;
use Zend\Cache\Storage\Adapter\Redis;
use SessionService\Service\SessionService;

class SessionServiceFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {

        $config = $serviceLocator->get('Config');
        $config = $config['session'];
        
        $redis = $serviceLocator->get('SessionService\Cache\Redis');
        $session = new SessionService($redis);

        return $session;
    }
}

