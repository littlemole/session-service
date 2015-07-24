<?php
namespace SessionService\Service;

/**
 * @SWG\Definition(required={"name", "session"},@SWG\Xml(name="session",wrapped="true"))
 */
class Session {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
     
    public $sessionId;

    /**
     * @SWG\Property()
     * @var User
     */
    public $user;

    public function __construct( $data, $i) {
    
        $this->user = $data;
        $this->sessionId = $i;
    }
    
}

