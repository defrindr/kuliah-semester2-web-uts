<?php
class App
{
    public $db;
    private $user;
    private $config;
    public $base_root = "";
    public $base_url = "/uts_web";
    public $title = "Perpustakaan";
    public $layout = "layouts/main.php";

    public function __construct()
    {
        $this->config = [
            "app_name" => "Perpustakaan",
            "author" => "Defri Indra M"
        ];
        $this->base_root = $this->getRootDir();
        $this->user = new User;
        $this->db = new Connection([
            "host" => "localhost:33067",
            "username" => "root",
            "password" => "defrindr",
            "dbname" => "semester2_web_uts",
        ]);

        ob_start();
        $this->render();
        ob_end_clean();

    }

    private function getRootDir()
    {
        $root_dir = $_SERVER['DOCUMENT_ROOT'];
        $script_filename = $_SERVER['SCRIPT_FILENAME'];
        $script_filename = str_replace($root_dir, "", $script_filename);
        $script_filename = str_replace("/index.php", "", "$script_filename");
        return $root_dir . $script_filename . "/views";
    }

    public function init()
    {
        include "{$this->base_root}/{$this->layout}";
    }

    public function render()
    {
        $module = "site";
        $routes = "index";

        $path = "$this->base_root/";

        if (isset($_GET['module'])) {
            $path .= "{$_GET['module']}/";
        } else {
            $path .= "$module/";
        }

        if (isset($_GET['routes'])) {
            $path .= "{$_GET['routes']}.php";
        } else {
            $path .= "$routes.php";
        }

        if (file_exists($path)) {
            include "$path";
        } else {
            echo "404 not found";
        }
    }
}
