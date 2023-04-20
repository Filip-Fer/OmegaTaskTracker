<?php

if (!class_exists('Config')) {
    /**
     * Třída pro konfiguraci, řešení funkčnosti na localhostu a serveru
     * 
     * @author Filip Ferencei
     */
    class Config
    {
        private static $document_root = "";
        private static $document_root_url = "";
        private static $instance = null;

        /**
         * Získá pole s informaceni v konfiguraci
         * Singleton Pattern
         * 
         * @return self::$instance Pole konfigurace
         */

        static function getInstance()
        {
            if (is_null(self::$instance)) {
                /* Pokud na localhost */
                if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
                    self::$document_root = $_SERVER['DOCUMENT_ROOT'] . "/todotracker/";
                    self::$document_root_url = "/todotracker/";
                } else {
                    self::$document_root = $_SERVER['DOCUMENT_ROOT'] . "/todotracker/";
                    self::$document_root_url = "/data/www/26042/ferencei_cz/todotracker/";
                }
                /* Vrací pole údajů */
                self::$instance = array(
                    'project_name' => 'todotracker', //Jméno projektu
                    'root_path_require_once' => self::$document_root, //Root adresář
                    'root_path_url' => self::$document_root_url, //Protože nemůžeme přistupovat k souborům absolutní cestou na disku
                );
            }
            return self::$instance;
        }
        /**
         * Konstruktor na vytvoření a nastavení proměnných 
         * 
         *  Singleton Pattern
         */
        private function __construct()
        {
        }
    }
}