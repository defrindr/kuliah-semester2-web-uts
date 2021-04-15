<?php

class View {
    public $base_root = "";
    public $title = "Main";
    public $layout = "layouts/main.php";

    public function __construct()
    {
        $this->base_root = $this->getRootDir();
    }
    
    private function getRootDir() {
        $root_dir = $_SERVER['DOCUMENT_ROOT'];
        $script_filename = $_SERVER['SCRIPT_FILENAME'];
        $script_filename = str_replace($root_dir, "", $script_filename);
        $script_filename = str_replace("/index.php", "", "$script_filename");
        return $root_dir.$script_filename."/views";
    }

    public function init(){
        $file = file_get_contents("{$this->base_root}/{$this->layout}");
        return $file;
    }

    public function render($view, $vars){
    }
}