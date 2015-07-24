<?php
namespace SessionService\Service;

/**
 * @SWG\Definition()
 */
class User {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
     
    public $uid;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $login;
    
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $name;
    

    
}

