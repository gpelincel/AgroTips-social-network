<?php

require __DIR__ . "/vendor/autoload.php";

$route = new \CoffeeCode\Router\Router(ROOT);

/**
 * APP
 */
$route->namespace("Source\App");

/**
 * web
 */
$route->group(null);
$route->get("/", "Web:login");
$route->get("/timeline", "Web:timeline");
$route->get("/cadastro", "Web:cadastro");

$route->group("meu-perfil");
$route->get("/{id}", "Web:my_user");
$route->get("/{id}/delete-post/{id_post}", "Web:delete_post");
$route->post("/{id}/update-post/{id_post}", "Web:update_post");


$route->group("functions");
$route->post("/login", "Web:func_login");
$route->get("/logout", "Web:logout");
$route->post("/create-user", "Web:create_user");
$route->post("/create-post", "Web:create_post");

/**
 * ERROR
 */
$route->group("error");
$route->get("/{errcode}", "Web:error");

/**
 * PROCESS
 */
$route->dispatch();

if ($route->error()) {
    $route->redirect("/error/{$route->error()}");
}