<?php 

namespace Vendor;

/**
 * 
 */
class Auth
{
    public static function User()
    {
        $user = new \App\User;
        return $user->find((int)$_SESSION['user_id']);
    }
    public static function id()
    {
        return $_SESSION['user_id'];
    }
}



