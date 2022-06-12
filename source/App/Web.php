<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Post;
use Source\Models\User;

class Web
{
    private $view;
    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . "/../../theme", "php");
        //Indicar diretório das views e extensão dos arquivos
        //Toda vez que engine é estanciado ele renderiza a página
    }

    public function login()
    {
        echo $this->view->render("login", [
            "title" => "Bem-vindo | " . SITE,
        ]);
        //Indicar view, array com parâmetros
    }

    public function cadastro()
    {
        echo $this->view->render("cadastro", [
            "title" => "Inscreva-se | " . SITE,
        ]);
    }

    public function timeline()
    {
        $posts = (new Post())->find()->order("publish_day DESC")->fetch(true);
        echo $this->view->render("timeline", [
            "title" => "Agrotips",
            "posts" => $posts,
        ]);
    }

    public function my_user($data)
    {
        extract($data);

        $posts = (new Post())->find("id_user=:id_user", ":id_user=$id")->order("publish_day DESC")->fetch(true);
        echo $this->view->render("my_user", [
            "title" => "Agrotips",
            "posts" => $posts,
        ]);
    }

    public function func_login()
    {
        require_once __DIR__ . '/../CRUD/login.php';
    }

    public function create_user()
    {
        require_once __DIR__ . '/../CRUD/create_user.php';
    }

    public function create_post()
    {
        require_once __DIR__ . '/../CRUD/create_post.php';
    }

    public function delete_post($data){
        extract($data);
        require_once __DIR__ . '/../CRUD/delete_post.php';
    }

    public function update_post(){
        require_once __DIR__ . '/../CRUD/update_post.php';
    }

    public function logout(){
        require_once __DIR__ . '/../CRUD/logout.php';
    }

    public function error($data)
    {
        echo "<h1>Erro {$data["errcode"]}</h1>";
    }
}
