<?php

use Bibliothek\Controller\AddController;
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
    $controller = new AddController();
    $controller->index();
    die();
}

if($uri === "/add/author"){
    $controller = new AddController();
    if($httpMethod === "GET") {
        $controller->addAuthor();
    } elseif ($httpMethod === "POST") {
        $controller->storeAuthor($_POST);
    }
    die();
}

if($uri === "/add/book"){
    $controller = new AddController();
    if($httpMethod === "GET") {
        $controller->addBook();
    } elseif ($httpMethod === "POST") {
        $controller->storeBook($_POST);
    }
    die();
}

if($uri === "/add/genre"){
    $controller = new AddController();
    if($httpMethod === "GET") {
        $controller->addGenre();
    } elseif ($httpMethod === "POST") {
        $controller->storeGenre($_POST);
    }
    die();
}

if($uri === "/add/type"){
    $controller = new AddController();
    if($httpMethod === "GET") {
        $controller->addType();
    } elseif ($httpMethod === "POST") {
        $controller->storeType($_POST);
    }
    die();
}

echo "page not Found";
