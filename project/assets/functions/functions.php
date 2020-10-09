<?php
namespace Project\Assets;

class Functions
{
    public static function isLogin()
    {
        if(isset($_SESSION['username'])) {
            return true;
        }
        return false;
    }

    public static function getUser()
    {
        if(self::isLogin()) {
            return $_SESSION['username'];
        }
        return null;
    }

}