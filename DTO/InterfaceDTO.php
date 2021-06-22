<?php

interface CRUD {

    public static function insert($data);
    public static function update($data);
    public static function delete($data);
    public static function selectAll();
    public static function selectbyId();
}

interface CRD {
    public static function insert($data);
    public static function selectAll();
    public static function delete($data);
    public static function selectbyId();
}

interface CUD {

    public static function insert($data);
    public static function update($data);
    public static function delete($data);
}

interface SELECT {
    public static function selectAll();
    public static function selectById($refProd);
}

interface INSERT {
    public static function insert($data);
}

