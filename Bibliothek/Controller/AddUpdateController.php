<?php

namespace Bibliothek\Controller;

class AddUpdateController extends DefaultController{

    public function indexAdd() {
        $this->render("addData.html.twig", [
        ]);
    }

    public function indexUpdate() {
        $this->render("updateData.html.twig", [
        ]);
    }

    public function indexAuthor() {
        $this->render("author-form.html.twig", [
        ]);
    }

    public function indexBook() {
        $this->render("book-form.html.twig", [
        ]);
    }

    public function indexGenre() {
        $this->render("genre-form.html.twig", [
        ]);
    }

}