<?php
namespace SessionService\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use SessionService\Service\AuthenticationService;

class AuthenticationServiceFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {

        return new AuthenticationService();
    }
}

