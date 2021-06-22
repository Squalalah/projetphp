<?php

interface CRUD {

    public static function insert();
    public static function update();
    public static function delete();
    public static function selectAll();
    public static function selectbyId();
}

interface CRD {
    public static function insert();
    public static function selectAll();
    public static function delete();
    public static function selectbyId();
}

interface CUD {

    public static function insert($data);
    public static function update();
    public static function delete();
}

interface SELECT {
    public static function selectAll();
    public static function selectById($refProd);
}

interface INSERT {
    public static function insert($data);
}

