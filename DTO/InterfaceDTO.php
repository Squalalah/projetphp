<?php

interface CRUD {

    public function insert();
    public function update();
    public function delete();
    public function selectAll();
    public function selectbyId();
}

interface SELECT {
    public function selectAll();
    public function selectById();
}

interface INSERT {
    public function insert();
}

