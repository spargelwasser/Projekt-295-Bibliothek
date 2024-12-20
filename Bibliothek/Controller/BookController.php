<?php

namespace Bibliothek\Controller;

use Bibliothek\Model\Book;
use Bibliothek\Model\Author;
use Bibliothek\Model\BookGenre;
use Bibliothek\Model\Genre;
use Bibliothek\Model\Type;

class BookController extends DefaultController{
    public function index() {
        $books = Book::all();
        $authors = Author::all();
        $bookGenre = BookGenre::all();
        $genre = Genre::all();
        $type = Type::all();

        $this->render("book-overview.html.twig", [
            "books" => $books,
            "authors" => $authors,
            "bookGenres" => $bookGenre,
            "genres" => $genre,
            "types" => $type
        ]);
    }
}