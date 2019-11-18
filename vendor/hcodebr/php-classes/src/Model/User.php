<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class User extends Model {

    public static function login($Login, $password)
    {

      $sql = new Sql();

      $results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
        ":LOGIN"=>'$login'
      ));
       
      if (count($results) === 0)
      {
          throw new \Exception("Usuario inexistente ou senha invalida.");
      } 
    
      $data = $results[0];

     if (password_verify($password, $data["despassword"]) === true)
      {

        $user = new User();

        $user->setiduser($data["iduser"]);

      } else {
        throw new \Exception("Usuario inexistente ou senha invalida.");          
      }

    
}

}

?>