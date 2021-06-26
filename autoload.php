<?php

//spl_autoload_register va s'executer à chaque appel de classe (new Pain, new Glace etc...)
//et tenter d'inclure le fichier de la classe correspondante avant que cela ne provoque un crash
spl_autoload_register(function($className) {
    //j'utilise strpos pour différencier les classes BO et DTO, car elles ne sont pas au même endroit
    //__DIR__ retourne l'adresse où le fichier autoload.php est (racine de projetphp donc)
    if(strpos($className, 'DTO') !== false) {
        $file = __DIR__ . '\\DTO\\'. $className . '.php';
    }
    else $file = __DIR__ . '\\BO\\'. $className . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    if(file_exists($file)) {
        include $file;
    }
});