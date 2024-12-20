<?php

namespace Bibliothek\Controller;

use Bibliothek\Model\Book;
use Bibliothek\Model\Author;

class AuthorController extends DefaultController{
    public function index() {
        $authors = Author::all();
        $books = Book::all();

        $this->render("author-overview.html.twig", [
            "books" => $books,
            "authors" => $authors
        ]);
    }

}