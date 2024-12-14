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

    /* public function create() {
        $this->render("book-form.html.twig");
    }

    public function store(array $data) {
        $book = new Book();
        $book->settitle($data["bookTitle"]);
        $book->setauthorid($data["authorId"]);
        $book->settypeid($data["typeId"]);
        $book->setpages($data["bookPages"]);
        $book->save();

        $this-> redirect("/book");
    }

    public function edit(int $id) {
        $book = Book::findByKey($id);

        $this->render("book-form.html.twig", [
            "Book" => $book
        ]);
    }

    public function update(int $id, array $data) {
        $book = Book::findByKey($id);
        $book->settitle($data["bookTitle"]);
        $book->setauthorid($data["authorId"]);
        $book->settypeid($data["typeid"]);
        $book->setpages($data["bookPages"]);
        $book->save();

        $this->redirect("/book");
    }
 */
}