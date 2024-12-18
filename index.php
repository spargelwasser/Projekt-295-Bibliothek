<?php

use Bibliothek\Controller\AddController;
use Bibliothek\Controller\UpdateController;
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

if($uri === "/update"){
    $controller = new UpdateController();
    $controller->index();
    die();
}

if($uri === "/update/author"){
    $controller = new UpdateController();
    $controller->showAuthors();
    die();
}

if(preg_match("#/update/author/\d+$#", $uri)){ 
    $matches = array();
    preg_match("/\d+/", $uri, $matches); 

    $controller = new updateController();
    if($httpMethod === "GET") {
        $controller->editAuthor($matches[0]);
    } elseif ( $httpMethod === "POST" && isset($_POST["_method"]) && $_POST["_method"] === "PUT"){
        $controller->updateAuthor($matches[0], $_POST);
    }else if($httpMethod === "POST" && isset($_POST["_method"]) && $_POST["_method"] === "DELETE"){
        $controller->deleteAuthor($matches[0]);
    }
    die();
}

if($uri === "/update/type"){
    $controller = new UpdateController();
    $controller->showTypes();
    die();
}

if(preg_match("#/update/type/\d+$#", $uri)){ 
    $matches = array();
    preg_match("/\d+/", $uri, $matches); 

    $controller = new updateController();
    if($httpMethod === "GET") {
        $controller->editType($matches[0]);
    } elseif ( $httpMethod === "POST" && isset($_POST["_method"]) && $_POST["_method"] === "PUT"){
        $controller->updateType($matches[0], $_POST);
    }else if($httpMethod === "POST" && isset($_POST["_method"]) && $_POST["_method"] === "DELETE"){
        $controller->deleteType($matches[0]);
    }
    die();
}

if($uri === "/update/genre"){
    $controller = new UpdateController();
    $controller->showGenres();
    die();
}

if(preg_match("#/update/genre/\d+$#", $uri)){ 
    $matches = array();
    preg_match("/\d+/", $uri, $matches); 

    $controller = new updateController();
    if($httpMethod === "GET") {
        $controller->editGenre($matches[0]);
    } elseif ( $httpMethod === "POST" && isset($_POST["_method"]) && $_POST["_method"] === "PUT"){
        $controller->updateGenre($matches[0], $_POST);
    }else if($httpMethod === "POST" && isset($_POST["_method"]) && $_POST["_method"] === "DELETE"){
        $controller->deleteGenre($matches[0]);
    }
    die();
}

if($uri === "/update/book"){
    $controller = new UpdateController();
    $controller->showBooks();
    die();
}

if(preg_match("#/update/book/\d+$#", $uri)){ 
    $matches = array();
    preg_match("/\d+/", $uri, $matches); 

    $controller = new updateController();
    if($httpMethod === "GET") {
        $controller->editBook($matches[0]);
    } elseif ( $httpMethod === "POST" && isset($_POST["_method"]) && $_POST["_method"] === "PUT"){
        $controller->updateBook($matches[0], $_POST);
    }else if($httpMethod === "POST" && isset($_POST["_method"]) && $_POST["_method"] === "DELETE"){
        $controller->deleteBook($matches[0]);
    }
    die();
}
echo "page not Found";
