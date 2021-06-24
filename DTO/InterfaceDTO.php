<?php

//Ces interfaces permettent de forcer l'utilisation de fonction avec un nom identique dans les DTO, afin de réduire le risque d'erreur.
interface CRUD {

    public static function insert($Objet);
    public static function update($Objet);
    public static function delete($Objet);
    public static function selectAll();
    public static function selectbyId($id);
}

interface CRD {
    public static function insert($Objet);
    public static function selectAll();
    public static function delete($Objet, $id);
}

interface CUD {

    public static function insert($Objet);
    public static function update($Objet);
    public static function delete($Objet);
}

interface SELECT {
    public static function selectAll();
    public static function selectById($Objet);
}

interface INSERT {
    public static function insert($Objet);
}

