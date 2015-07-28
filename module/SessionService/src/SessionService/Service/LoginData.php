<?php
namespace SessionService\Service;

/**
 * @SWG\Definition(required={"login", "pwd"},@SWG\Xml(name="logindata"))
 */
class LoginData {

    /**
     * @SWG\Property(example="mike")
     * @var string
     */
     
    public $login;

    /**
     * @SWG\Property(example="12345")
     * @var string
     */
    public $pwd;

}

