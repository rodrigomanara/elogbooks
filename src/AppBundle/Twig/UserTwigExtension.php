<?php

namespace AppBundle\Twig;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

/**
 * Description of UserTwigExtension
 *
 * @author Rodrigo
 */
class UserTwigExtension extends \Twig_Extension {
    //put your code here
    /**
     *
     * @var type 
     */
    private $token;
    public function __construct(TokenStorage $token) {
        $this->token = $token;
    }
    
    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('is_admin', array(
                $this , 'is_admin'
            ))
        );
    }
    
    /**
     * 
     * @return boolean
     */
    public function is_admin(){ 
        $token = $this->token->getToken()->getUser();
        if($token->getRole() == 'ROLE_ADMIN'){
         return true;   
        }
        return false; 
    }
    
    public function getName() {
        return 'app.twig.is_admin';
    }
    
}
