<?php
namespace SessionService\Service;

/**
 * @SWG\Definition(required={"login", "pwd"})
 */
class LoginData {

    /**
     * @SWG\Property(format="string",example="mike")
     * @var string
     */
     
    public $login;

    /**
     * @SWG\Property(format="string",example="12345")
     * @var string
     */
    public $pwd;

}

