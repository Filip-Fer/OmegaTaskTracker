<?php
if (!function_exists('getDB')) {
    /**
     * Funkce pro import databáze
     */
    function getDB(){
        include "database/dbcon.php";
    }
}

if (!function_exists('getCustomSQL')) {
    /**
     * Funkce pro import custom SQL příkazů
     */
    function getCustomSQL() {
        include "database/customSQL.php";
    }
}

if (!function_exists('getFormatDate')) {
    /**
     * Funkce pro import skriptu formatDate.php
     */
    function getFormatDate() {
        include "tools/formatDate.php";
    }
}

if (!function_exists('getToString')) {
    /**
     * Funkce pro import skriptu toString.php
     */
    function getToString() {
        include "tools/toString.php";
    }
}

if (!function_exists('getCompareStrings')) {
    /**
     * Funkce pro import skriptu compareStrings.php 
     */
    function getCompareStrings() {
        include "tools/compareStrings.php";
    }
}
