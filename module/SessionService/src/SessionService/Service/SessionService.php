<?php
namespace SessionService\Service;

use Zend\Cache\Storage\Adapter\Redis;

class SessionService {

    private $redis;

    public function __construct( $r) {

        $this->redis = $r;
    }
    
    public function create( $user ) {

        $uid = $user['uid'];
        $sid = $this->make_id();
        $session = new Session( 
          [ 
            'login' => $user['login'],
            'name'  => $user['name'],
            'uid'   => $user['uid'],
          ], 
          $sid );    
        
        $this->redis->setItem( $sid, $session);
        return $session;
    }
    
    public function get( $sid ) {
    
      if (! $this->redis->hasItem( $sid )) {
           return null;
      }
      
      return $this->redis->getItem( $sid );
    
    }
    
    public function remove( $sid ) {
    
      $this->redis->removeItem($sid);
    }
    
    private function make_id() {
        return substr( "abcdefghijklmnopqrstuvwxyz" ,mt_rand( 0 ,25 ) ,1 ) .substr( md5( time( ) ) ,1 );
    }
}

