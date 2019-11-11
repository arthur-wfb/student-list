<?php

class Linker
{
    function __construct($domen){
        $this->domen = $domen;
    }

    function createLink($valueName, $value){
        $query = $_GET;
        $query[$valueName] = $value;
        echo $this->domen . '?' .  http_build_query($query);      // Подумать насчет $domen
    }

}
