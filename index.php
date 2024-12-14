<?php

use Bibliothek\Controller\AddUpdateController;
use Bibliothek\Controller\BookController;
use Bibliothek\Controller\AuthorController;
use Bibliothek\Controller\HomeController;

require_once "vendor/autoload.php";

$uri = $_SERVER["REQUEST_URI"];
$httpMethod = $_SERVER["REQUEST_METHOD"];

if($uri === "/") {
    $controller = new HomeController();
    $controller->index();
    die();
}

if($uri === "/books"){
    $controller = new BookController();
    $controller->index();
    die();
}

if($uri === "/authors"){
    $controller = new AuthorController();
    $controller->index();
    die();
}

if($uri === "/add"){
    $controller = new AddUpdateController();
    $controller->indexAdd();
    die();
}

if($uri === "/update"){
    $controller = new AddUpdateController();
    $controller->indexUpdate();
    die();
}

if($uri === "/add/author"){
    $controller = new AddUpdateController();
    $controller->indexAuthor();
    die();
}

if($uri === "/add/book"){
    $controller = new AddUpdateController();
    $controller->indexBook();
    die();
}

if($uri === "/add/genre"){
    $controller = new AddUpdateController();
    $controller->indexGenre();
    die();
}