<?php

interface CRUD {

    public function insert();
    public function update();
    public function delete();
    public function selectAll();
    public function selectbyId();
}

interface CUD {

    public static function insert($data);
    public function update();
    public function delete();
}

interface SELECT {
    public static function selectAll();
    public static function selectById($refProd);
}

interface INSERT {
    public static function insert($data);
}

