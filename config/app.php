<?php
include_once 'connection.php';

class App {
    public $db;
    public $base_root = "";
    public $base_url = "/uts_web";
    public $title = "Main";
    public $layout = "layouts/main.php";

    public function __construct()
    {
        $this->base_root = $this->getRootDir();
        $this->db = new Connection([
            "host" => "localhost:33067",
            "username" => "root",
            "password" => "defrindr",
            "dbname" => "semester2_web_uts",
        ]);
    }
    
    private function getRootDir() {
        $root_dir = $_SERVER['DOCUMENT_ROOT'];
        $script_filename = $_SERVER['SCRIPT_FILENAME'];
        $script_filename = str_replace($root_dir, "", $script_filename);
        $script_filename = str_replace("/index.php", "", "$script_filename");
        return $root_dir.$script_filename."/views";
    }

    public function init(){
        include "{$this->base_root}/{$this->layout}";
    }

    // public function render($view, $vars){
    // }
}