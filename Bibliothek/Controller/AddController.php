<?php

namespace Bibliothek\Controller;

use Bibliothek\Model\Author;

class AddController extends DefaultController{

    public function index() {
        $this->render("addData.html.twig", [
        ]);
    }

    public function addAuthor() {
        $this->render("author-form.html.twig", [
        ]);
    }

    public function addBook() {
        $this->render("book-form.html.twig", [
        ]);
    }

    public function addGenre() {
        $this->render("genre-form.html.twig", [
        ]);
    }

    public function addType() {
        $this->render("type-form.html.twig", [
        ]);
    }

    public function storeauthor( array $data) {
        $author = new Author();
        $author->setName($data["name"]);
        $author->setPrename($data["prename"]);
        $author->save();

        $this->redirect("/");
    }

}