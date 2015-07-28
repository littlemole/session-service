<?php
namespace SessionService\Service;

/**
 * @SWG\Definition()
 */
class User {

    /**
     * @SWG\Property(example="42")
     * @var string
     */
     
    public $uid;

    /**
     * @SWG\Property(example="loginname")
     * @var string
     */
    public $login;
    
    /**
     * @SWG\Property(example="John Doe")
     * @var string
     */
    public $name;
    

    
}

