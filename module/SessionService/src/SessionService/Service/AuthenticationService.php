<?php
namespace SessionService\Service;

class AuthenticationService {

    private $users;

    public function __construct() {

      $this->users = [
        "james"  => [ uid => 1, pwd => "12345", name => "James"  ],
        "sascha" => [ uid => 2, pwd => "12345", name => "Sascha" ],
        "yarek"  => [ uid => 3, pwd => "12345", name => "Yarek"  ],
        "mike"   => [ uid => 4, pwd => "12345", name => "Michael"]
      ];
    }
    
    public function login( $login, $pwd ) {

        if ( !array_key_exists($login, $this->users)) {
           return null;
        }
        
        $user = $this->users[$login];
        if ( $user['pwd'] != $pwd ) {
            return null;
        }
        $user['login'] = $login;
        return $user;
    }
    
}

