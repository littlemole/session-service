<?php
    namespace SessionService\Controller;
     
    use Zend\Mvc\Controller\AbstractRestfulController;
    use SessionService\Service\JsonModel;
    use Zend\Json\Json;    
    
    /**
     * @SWG\Info(
     *   title="A SessionService API", 
     *   version="0.1",
     *   description="example users: james,yarek,sascha,mike example password: 12345"
     *  )
     */
    
     
    class SessionRestController extends AbstractRestfulController
    {
    
    /**
     * @SWG\Get(
     *     path="/session-service/session/{sid}",
     *     tags={"API"},
     *     description="Lookup an existing session by session id (sid).",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *       description="session identifier (sid)",
     *       in="path",
     *       name="sid",
     *       required=true,
     *       type="string"      
     *     ),     
     *     @SWG\Response(
     *       response="200", 
     *       description="The session information for the given session id (sid).",
     *       @SWG\Schema(ref="#/definitions/Session"),     
     *       @SWG\Xml(name="session",wrapped="true"),
     *     ),
     *     @SWG\Response(
     *       response="404", 
     *       description="session not found"
     *     )
     * )
     */    
        public function get($id)
        {
        
          $sessionService = $this->getServiceLocator()->get('SessionService\SessionService');
          $session = $sessionService->get($id);
          if ( $session === null ) {
          
            $this->response->setStatusCode(404);
            return new JsonModel(array("error" => "unknown sid" ));
          }
            
            return new JsonModel($session);
        }
     
    /**
     * @SWG\Post(
     *     path="/session-service/session",
     *     tags={"API"},
     *     description="Create a new session by specifying login-name and password.",
     *     produces={"application/json"},
     *     consumes={"application/json"},
     *     @SWG\Parameter(
     *       description="The login-name and password identifying the user.",
     *       in="body",
     *       name="logindata",
     *       required=true,
     *       @SWG\Schema(ref="#/definitions/LoginData")
     *     ),     
     *     @SWG\Response(
     *       response="200", 
     *       description="The session information for the given session id (sid).",
     *       @SWG\Schema(ref="#/definitions/Session"),     
     *       @SWG\Xml(name="session",wrapped="true"),
     *     ),
     *     @SWG\Response(
     *       response="401", 
     *       description="login failed"
     *     )
     * )
     */    
        public function create($data)
        {
          $login = $data['login'];          
          $pwd   = $data['pwd'];
          
          $authenticationService = $this->getServiceLocator()->get('SessionService\AuthenticationService');
          $user = $authenticationService->login($login,$pwd);
          
          if ( $user == null ) {
            $this->response->setStatusCode(401);
            return new JsonModel( ["error" => "login failed"  ] );         
          }
          
          $sessionService = $this->getServiceLocator()->get('SessionService\SessionService');
          $session = $sessionService->create($user);          
          
          return new JsonModel($session);
        }


    /**
     * @SWG\Delete(
     *     path="/session-service/session/{sid}",
     *     tags={"API"},
     *     description="Delete an existing session identified by the given session id (sid).",
     *     @SWG\Parameter(
     *       description="The session id for the session to be deleted.",
     *       in="path",
     *       name="sid",
     *       required=true,
     *	     type="string"
     *     ),     
     *     @SWG\Response(
     *       response="200", 
     *       description="Always returns 200 OK."
     *     )
     * )
     */    
     
        public function delete($id)
        {
          $sessionService = $this->getServiceLocator()->get('SessionService\SessionService');
          $session = $sessionService->remove($id);          
          return new JsonModel(null);          
        }
        
    }

?>
