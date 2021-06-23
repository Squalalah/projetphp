<?php

abstract class BDD extends PDO {

    private static $user = 'root';
    private static $mdp = 'root';
    private static $serveur = 'localhost';
    private static $bd = 'projetphp';

    public static function getBdd() : PDO {
        $dns = "mysql:host=".self::$serveur.";dbname=".self::$bd.";charset=utf8";
        return new PDO($dns, self::$user, self::$mdp);
    }
}
        
