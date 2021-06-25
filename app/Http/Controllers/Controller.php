<?php

namespace App\Http\Controllers;

use Exception;
use Laravel\Lumen\Routing\Controller as BaseController;
use LdapRecord\Container;

class Controller extends BaseController
{
    
    public static $dominio = "@julio.net";

    public static function autenticarComLDAP($usuario, $senha){
        $connection = Container::getConnection('default');
        try {
            if($connection->auth()->attempt($usuario.self::$dominio, $senha, $stayAuthenticated = true)){
               return true;
            }else{
                throw new Exception("Credenciais invalidas.",401);
            }
        } catch (Exception $e) {
            echo  $e->getMessage().$e->getCode();
        }
    }
}
